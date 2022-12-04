<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\BookUploadCompleteRequest;
use App\Http\Requests\Frontend\User\BookUploadCreateStepThreeRequest;
use App\Http\Requests\Frontend\User\BookUploadCreateStepTwoRequest;
use App\Http\Requests\Frontend\User\BookUploadDestroyRequest;
use App\Http\Requests\Frontend\User\BookUploadStoreRequest;
use App\Http\Requests\Frontend\User\BookUploadStoreStepThreeRequest;
use App\Http\Requests\Frontend\User\BookUploadStoreStepTwoRequest;
use App\Models\Category;
use App\Models\OrganisationProject;
use App\Models\UserBookUpload;
use Illuminate\Http\Request;
use Upload\Media\Traits\FileUpload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Cache\Store;
use App\Traits\PdfToText;

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
        return view("frontend.user.upload.ui.upload", compact('book', 'tab'));
    }

    public function uploadEdit(UserBookUpload $book, $tab = 'upload-progress-bar')
    {
        $instances = [];
        $tab = $tab ?? "upload-progress-bar";

        if ($tab == "upload-progress-bar") {

            $pdfParser = new \Smalot\PdfParser\Parser();
            $pdf = $pdfParser->parseFile($book->book->path);
            $instances['book']['totalPage'] = $pdf->getDetails()['Pages'];
            if ($instances['book']['totalPage'] > 2) {
                $instances['book']['secondPageEmpty'] = trim(preg_replace('~[\r\n\t]+~', '', $pdf->getPages()[1]->getText()));
            }
            $instances['book']['paperCutMargin'] = true;
            $instances['book']['paperA4'] = true;
        }

        $projects = OrganisationProject::with(["organisation"])->latest()->get();
        $categories = Category::where('category_type', "book_upload_category")->get();
        return view("frontend.user.upload.ui.upload", compact('book', 'categories', 'projects', 'tab', 'book'));
    }


    public function StoreUpload(BookUploadStoreRequest $request)
    {
        $upload = new UserBookUpload;
        $this->set_access("file");
        $this->set_upload_path("website/books");

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

        return view('frontend.user.upload.meta', compact('book'));
    }

    public function storeUploadMetaInformation(BookUploadStoreStepTwoRequest $request, UserBookUpload $book)
    {
        // now let's update other information
        $book->project_id = $request->project;
        $book->full_description = $request->book_description;
        $book->canva_link = $request->canva_link;
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
            session()->flash('error', "Oops ! Unable to complete your form.");
            info($th->getMessage(), "Book upload second step.");
            return back();
        }

        session()->flash("success", "Information Saved.");
        return redirect()->route("frontend.auth_user.books.book.category", $book->id);
    }

    public function createBookCategory(BookUploadCreateStepThreeRequest $request, UserBookUpload $book)
    {
        if ($book->status != "draft") {
            return view('frontend.user.upload.category-not-allowed', compact("book"));
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
        $book->status = "pending";
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

        session()->flash("success", "Book information has been removed");
        return back();
    }


    public function countPageInBookUpload($pdfFile)
    {
        $pdftext = Storage::get($pdfFile);
        $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
        return $num;
    }

    protected function  IsPageHeaderOrFooter($stream_data)
    {
        if (preg_match('#/Type \s* /Pagination \s* /Subtype \s*/((Header)|(Footer))#ix', $stream_data))
            return (true);
        else if (preg_match('#/Attached \s* \[ .*? /((Top)|(Bottom)) [^]]#ix', $stream_data))
            return (true);
        else
            return (false);
    }
}
