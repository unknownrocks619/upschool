<?php

namespace App\Http\Controllers\Frontend\User;

use Illuminate\FileSystem\Filesystem;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\BookUploadAddProjectRequest;
use App\Http\Requests\Frontend\User\BookUploadCompleteRequest;
use App\Http\Requests\Frontend\User\BookUploadCreateStepThreeRequest;
use App\Http\Requests\Frontend\User\BookUploadCreateStepTwoRequest;
use App\Http\Requests\Frontend\User\BookUploadDestroyRequest;
use App\Http\Requests\Frontend\User\BookUploadStatusRequest;
use App\Http\Requests\Frontend\User\BookUploadStoreRequest;
use App\Http\Requests\Frontend\User\BookUploadStoreStepThreeRequest;
use App\Http\Requests\Frontend\User\BookUploadStoreStepTwoRequest;
use App\Models\Category;
use App\Models\Corcel\BookDonationData;
use App\Models\Corcel\Meta\WPMeta;
use App\Models\Corcel\Post;
use App\Models\Corcel\WPCategory;
use App\Models\Corcel\WpUser;
use App\Models\Organisation;
use App\Models\OrganisationProject;
use App\Models\UserBookUpload;
use Illuminate\Http\Request;
use Upload\Media\Traits\FileUpload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Cache\Store;
use App\Traits\PdfToText;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class BookUploadController extends Controller
{
    //
    use FileUpload;

    public function guestUpload($book = null)
    {
        if (!auth()->check()) {
            return view("frontend.user.upload.auth");
        }
        return $this->uploadCreate($book);
    }

    public function uploadCreate($tab = "book-upload", int $book = null, $instances = [])
    {
        if ($book) {
            $book = UserBookUpload::find($book);
        }
        $tab = $tab ?? "book-upload";
        $instances['percentage'] = "100%";
        $instances['step'] = 1;
        $instances['progressBar'] = "5%";
        $instances['active'] = true;
        return view("frontend.user.upload.ui.upload", compact('book', 'tab', 'instances'));
    }

    public function uploadEdit(UserBookUpload $book, $tab = 'upload-progress-bar')
    {
        $instances = [];
        $tab = $tab ?? "upload-progress-bar";

        $pdfData = Storage::get($book->book->path);

        if ($tab == "upload-progress-bar") {
            $pdfParser = new \Smalot\PdfParser\Parser();
            $pdf = $pdfParser->parseFile($book->book->path);
            $instances['book']['totalPage'] = $pdf->getDetails()['Pages'];
            $instances['book']['secondPageEmpty'] = false;
            if ($instances['book']['totalPage'] > 2) {
                $instances['book']['secondPageEmpty'] = empty(trim(preg_replace('~[\r\n\t]+~', '', $pdf->getPages()[1]->getText()))) ?? false;
            }
            $instances['book']['paperCutMargin'] = true;
            $instances['book']['paperA4'] = true;
            $instances['percentage'] = "100%";
            $instances['step'] = 1;
            $instances['progressBar'] = "5%";
            $instances['active'] = true;
        }

        if ($tab == "about-book") {
            $instances['percentage'] = "80%";
            $instances['step'] = 2;
            $instances['progressBar'] = "20%";
            $instances['active'] = true;
        }

        if ($tab == "category") {
            $instances['percentage'] = "60%";
            $instances['step'] = 3;
            $instances['progressBar'] = "40%";
            $instances['active'] = true;
        }

        if ($tab == "project") {
            $instances['percentage'] = "40%";
            $instances['step'] = 4;
            $instances['progressBar'] = "60%";
            $instances['active'] = true;
        }

        if ($tab == "overview") {
            $instances['percentage'] = "80%";
            $instances['step'] = 5;
            $instances['progressBar'] = "80%";
            $instances['active'] = true;
        }

        if ($tab == "thank-you") {
            $instances['percentage'] = "0%";
            $instances['step'] = 6;
            $instances['progressBar'] = "100%";
            $instances['active'] = true;
        }

        $projects = OrganisationProject::with(["organisation"])->latest()->get();
        $categories = Category::where('category_type', "book_upload_category")->get();
        if (request()->get('partial')) {
            return view('frontend.user.upload.ui.' . $tab, compact('book', 'tab', 'instances', 'projects', 'categories'));
        }

        return view("frontend.user.upload.ui.upload", compact('book', 'categories', 'projects', 'tab', 'book', 'instances'));
    }


    public function StoreUpload(BookUploadStoreRequest $request)
    {
        $upload = new UserBookUpload;
        $this->set_access("file");
        $this->set_upload_path("books");

        $upload->user_id = auth()->id();
        $upload->book = $this->upload("file");
        $bookInformation = [];

        try {
            $upload->save();
        } catch (\Throwable $th) {
            //throw $th;

            return response(["status", "error"], 422);
        }
        return response(["status" => "success", "url" => route('frontend.book.edit.upload', [$upload->id, 'upload-progress-bar'])], 200);
    }

    public function createUploadMetaInformation(BookUploadCreateStepTwoRequest $request, UserBookUpload $book)
    {
        return view('frontend.user.upload.Test.projects');
        return view('frontend.user.upload.meta', compact('book'));
    }

    public function storeUploadMetaInformation(BookUploadStoreStepTwoRequest $request, UserBookUpload $book)
    {
        // now let's update other information
        $book->project_id = $request->project;
        if ($request->post('project')) {
            $book->project_id;
        }

        $book->full_description = $request->book_description;
        $book->canva_link = $request->canva_book;
        $book->parent_email = $request->post('parent_email');
        $book->school = $request->college;
        $book->book_title = $request->book_title;

        $user = auth()->user();
        if ($request->date_of_birth) {
            $user->date_of_birth = $request->date_of_birth;
        }

        if ($request->email) {
            $user->email = $request->email;
        }

        if ($request->country) {
            $user->country = $request->country;
        }

        try {
            DB::transaction(function () use ($user, $book) {
                $book->save();

                if ($user->isDirty()) {
                    $user->save();
                }
            });
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "Oops ! Unable to complete your form.");
            info($th->getMessage(), "Book upload second step.");
            // return back();
        }

        session()->flash("success", "Information Saved.");
        return redirect()->route("frontend.auth_user.books.book.category", $book->id);
    }

    public function createBookCategory(BookUploadCreateStepThreeRequest $request, UserBookUpload $book)
    {
        if ($book->status != "draft") {
            return view('frontend.user.upload.category-not-allowed', compact("book"));
        }
        $wpCategory = WPCategory::where('taxonomy', 'book_category')->get();
        $categoryName = [];

        foreach ($wpCategory as $category) {
            $categoryName[] = $category->name;
        }

        $categories = Category::where('category_type', "book_upload_category")->get();
        return view('frontend.user.upload.category', compact("book", "categories"));
    }

    public function storeBookCategory(BookUploadStoreStepThreeRequest $request, UserBookUpload $book)
    {
        if ($book->status != "draft") {
            return view('frontend.user.upload.category-not-allowed', compact("book"));
        }
        $book->categories = $request->cat_id;
        $book->status = "draft";
        try {
            $book->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Oops ! Something went wrong.");
            info($th->getMessage(), "Add  Category on Book Upload");
            // return back();
        }
        return view('frontend.user.upload.preview', compact("book"));

        // session()->flash("success","Thank-you ! Your book was successfully uploaded.")
    }

    public function storeBookProject(BookUploadAddProjectRequest $request, UserBookUpload $book)
    {
        // check if project exists in local env.
        $project = OrganisationProject::find($request->post('project'));

        // save project in db.
        $book->wp_project_id = $project->wp_post_id;
        $book->project_id = $project->getKey();
        $book->save();
    }

    public function updateBookStatus(BookUploadStatusRequest $request, UserBookUpload $book)
    {
        $book->status = 'pending';
        $book->save();

        // get wp user detail.
        $wp_user = WpUser::where('user_email', auth()->user()->email)->first();
        if ($wp_user) {
            $wp_post = [
                'post_author' => $wp_user->getKey(),
                'post_date' => $book->updated_at,
                'post_content' => $book->full_description,
                'post_title' => $book->book_title,
                'post_status' => 'pending',
                'comment_status' => 'closed',
                'ping_status' => 'closed',
                'post_modified' => $book->updated_at,
                'post_parent' => false,
                'menu_order' => false,
                'post_type' => 'pus_books',
                'comment_count' => false,
            ];


            $userPost = new Post();
            foreach ($wp_post as $key => $value) {
                $userPost->$key = $value;
            }
            $book_object_array  = (array) $book->book;
            $userPost->save();

            $metaPost = [
                [
                    'post_id' => $userPost->getKey(),
                    'meta_key' => 'school_name',
                    'meta_value' => $book->school,
                ],
                [
                    'post_id' => $userPost->getKey(),
                    'meta_key' => 'canva_book_link',
                    'meta_value' => $book->canva_link,
                ],
                [
                    'post_id' => $userPost->getKey(),
                    'meta_key' => 'pdf_id',
                    'meta_value' => asset($book->book->path),
                ],
                [
                    'post_id' => $userPost->getKey(),
                    'meta_key' => '_wp_attached_file',
                    'meta_value' => date("Y/m/") . '/' . $book->book->path,
                ],
                [
                    'post_id' => $userPost->getKey(),
                    'meta_key' => '_wp_attachment_metadata',
                    'meta_value' => "{a:1:{s:8:'filesize';i:" . $book_object_array[0]->size . "}",
                ],
                [
                    'post_id' => $userPost->getKey(),
                    'meta_key' => 'book_description',
                    'meta_value' => $book->full_description,
                ],
                [
                    'post_id' => $userPost->getKey(),
                    'meta_key' => 'pus_post_author',
                    'meta_value' => $wp_user->getKey(),
                ],
            ];

            $postMeta = WPMeta::insert($metaPost);
        }
        // also save this in wordpress.
    }

    public function index()
    {
        $books = UserBookUpload::where("user_id", auth()->id())->latest()->get();
        $draft_book = $books->where('status', 'draft')->count();
        return view('frontend.user.books.list', compact("books", "draft_book"));
    }


    public function destroy(BookUploadDestroyRequest $request, UserBookUpload $book)
    {
        try {
            $book->delete();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Unable to remove book information.");
            return back();
        }

        if ($request->get('source') && $request->get('source') == 'upload') {
            return redirect()->route('frontend.book.upload');
        }

        session()->flash("success", "Book information has been removed");
        return back();
    }


    function deleteAll($dir, $remove = false)
    {
        $userdir = $dir;
        $structure = glob(rtrim($dir, "/") . '/*');
        if (is_array($structure)) {
            foreach ($structure as $file) {
                if (is_dir($file))
                    $this->deleteAll($file, true);
                else if (is_file($file))
                    unlink($file);
            }
        }
        if ($remove && is_dir($userdir))
            return rmdir($userdir);
    }
}
