<?php

namespace App\Http\Controllers\Admin\Organisation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Organisation\OrganisationProjectStoreRequest;
use App\Http\Requests\Admin\Organisation\OrganisationProjectUpdateRequest;
use App\Http\Requests\Admin\Organisation\OrganisationStoreRequest;
use App\Models\Organisation;
use App\Models\OrganisationProject;
use App\Models\OrganisationStudent;
use App\Models\User;
use App\Traits\VideoHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Upload\Media\Traits\FileUpload;
use Illuminate\Support\Facades\DB;

class OrganisationController extends Controller
{
    use FileUpload, VideoHandler;
    //
    public function index()
    {
        $organisations = Organisation::withCount(["users", "projects"])->get();
        return view("admin.organisation.index", compact("organisations"));
    }

    public function create()
    {
        return view('admin.organisation.create');
    }

    public function store(OrganisationStoreRequest $request)
    {
        // dd($request->all());
        $organisation = new Organisation;
        $organisation->name = $request->organisation_name;
        $organisation->slug = Str::slug($request->organisation_name);
        $organisation->website = $request->website;
        $organisation->contact_number = $request->contact_number;
        $organisation->contact_person = $request->contact_person;
        $organisation->type = $request->type;
        $organisation->remarks = $request->remarks;
        $organisation->active = ($request->active == "active") ? true : false;

        /**
         * Social Link
         */
        $social_links = [
            "website" => $request->website,
            "instagram" => $request->instagram,
            "linkedin" => $request->linkedin,
            "facebook" => $request->facebook,
            "twitter" => $request->twitter
        ];
        $organisation->website = $social_links;
        $this->set_access("file");
        $this->set_upload_path("website/project");
        $images = [];
        if ($request->hasFile("logo")) {
            // $images["logo"] = $this->upload("logo");
            $organisation->logo = $this->upload("logo");
        }

        if ($request->hasFile("banner_image")) {
            $images["banner_image"] = $this->upload("banner_image");
        }

        $video = [];
        if ($request->video_banner) {
            $source = (Str::contains($request->video_banner, "youtube", true)) ? "youtube" : "vimeo";
            $this->set_source($source);
            $video["video_banner"] = $this->video_parts($request->video_banner);
        }
        $organisation->featured_videos = $video;
        $organisation->featured_image = $images;
        try {
            $organisation->save();
        } catch (\Throwable $th) {
            session()->flash('error', "Error: " . $th->getMessage());
            return back();
        }
        session()->flash('success', "New Organisation Record Created.");
        return back();
    }

    public function edit(Organisation $org)
    {
        return view('admin.organisation.edit', compact('org'));
    }

    public function update(Request $request, Organisation $org)
    {
        $org->name = $request->organisation_name;
        $org->slug = Str::slug($request->organisation_name);
        $org->website = $request->website;
        $org->contact_number = $request->contact_number;
        $org->contact_person = $request->contact_person;
        $org->type = $request->type;
        $org->remarks = $request->remarks;
        $org->active = ($request->active == "active") ? true : false;

        /**
         * Social Link
         */
        $social_links = [
            "website" => $request->website,
            "instagram" => $request->instagram,
            "linkedin" => $request->linkedin,
            "facebook" => $request->facebook,
            "twitter" => $request->twitter
        ];
        $org->website = $social_links;
        $this->set_access("file");
        $this->set_upload_path("website/project");
        $images = (array) $org->featured_image;
        if ($request->hasFile("logo")) {
            // $images["logo"] = $this->upload("logo");

            $org->logo = $this->upload("logo");
        }

        if ($request->hasFile("banner_image")) {
            $images["banner_image"] = $this->upload("banner_image");
        }

        $video = (array) $org->featured_videos;
        if ($request->video_banner) {
            $source = (Str::contains($request->video_banner, "youtube", true)) ? "youtube" : "vimeo";
            $this->set_source($source);
            $video["video_banner"] = $this->video_parts($request->video_banner);
        }
        $org->featured_videos = $video;
        $org->featured_image = $images;
        try {
            $org->save();
        } catch (\Throwable $th) {
            session()->flash('error', "Error: " . $th->getMessage());
            return back();
        }
        session()->flash('success', "New Organisation Record Created.");
        return back();
    }


    public function destroy(Organisation $org)
    {
        try {
            DB::transaction(function () use ($org) {
                $org->users()->detach();
                $org->delete();
            });
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Error: " . $th->getMessage());
            return back();
        }

        session()->flash('success', "Organisation Information has been removed.");
        return back();
    }

    public function createUser(Organisation $organisation)
    {
    }
    public function storeUser(Organisation $organisation)
    {
    }

    public function importUserModal(Request $request, Organisation $organisation)
    {
        return view('admin.organisation.modal.csv-import', compact('organisation'));
    }

    public function importUser(Request $request, Organisation $organisation)
    {
        $request->validate([
            "csv_file" => "required|mimes:csv"
        ]);

        $this->set_access("file");
        $this->set_upload_path("website/csv/" . $organisation->slug);
        $upload_file = $this->upload("csv_file");
        $handle = fopen(Storage::path($upload_file["path"]), "r");

        if (!$handle) {
            session()->flash("error", "Unable to import CSV file.");
            return redirect()->route('admin.organisation.index');
        }
        $exclude_field = [
            "first_name" => "first_name", "last_name" => "last_name", "address" => "address", "phone" => "phone", 'email' => "email", 'username' => "username", 'gender' => "gender", 'date_of_birth' => "date_of_birth"
        ];
        $roles = [
            2 => "Organisation",
            3 => "Teacher",
            4 => "Student Below 18",
            5 => "Student Above 18",
            6 => "Parent",
            7 => "General"
        ];

        $insertArray = [];
        $duplicate = [];
        $error = [];
        // $org_student_model = new OrganisationStudent;
        $skip = false;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $org_student_model = new OrganisationStudent;

            $user = new User;
            $available_columns = count($data);
            $outer_array = [];
            for ($i = 0; $i < $available_columns; $i++) {

                if (array_search(Str::slug($data[$i], "_"), $exclude_field, false)) {
                    $skip = true;
                    continue;
                }
                // else {
                //     $outer_array["created_at"] = \Carbon\Carbon::now()->format("Y-m-d H:i:s");
                //     $outer_array["updated_at"] = \Carbon\Carbon::now()->format("Y-m-d H:i:s");        
                // }

                if (!isset($data[8])) {
                    $role = 7;
                } else {
                    $role = (array_search($data[8], $roles)) ? array_search($data[8], $roles) : 7;
                }

                $user->first_name = $data[0];
                $user->last_name = $data[1];
                $user->local_address = $data[2];
                $user->username = strtoupper(Str::random(8));
                $user->phone_number = $data[3];
                $user->source = "excel-import";
                $user->email = ($data[4]) ? $data[4] : strtolower($user->first_name) . "_" . time() . "@" . Str::slug($organisation->organisation_name) . "com";
                $user->gender = $data[6];
                $user->date_of_birth = $data[7];
                $user->role = $role;
                $user->status = "active";
                $user->password = Hash::make(Str::random(10));
            }
            $user->source = "excel-import";
            $user->status = "active";
            $user->password = Hash::make(Str::random(10));
            $user->username = strtoupper(Str::random(8));
            // check for duplicate email
            if (!$skip) {
                $org_student_model->organisation_id = $organisation->id;
                $org_student_model->active = true;
                if (!User::where("email", $user->email)->exists()) {
                    try {
                        DB::transaction(function () use ($org_student_model, $user) {
                            $user->save();
                            $org_student_model->user_id = $user->id;
                            $org_student_model->save();
                        });
                    } catch (\Throwable $th) {
                        //throw $th;
                        $error[] = $th->getMessage();
                        continue;
                    }
                } else {
                    $duplicate[] = $user->email;
                }
            }

            $skip = false;
        }

        if (count($error)) {
            return response(["data" => "Import was successfull with errors. Error: " . implode(", ", $error), "success" => true]);
            // session()->flash("info", "Import was successfull with errors. Error: " . implode(", ", $error));
        }

        if (!count($error) && count($duplicate)) {
            return response(["data" => "Import completed. Skiped  " . count($duplicate) . " record. error due to duplicate email or username. Duplicate: " . implode(", ", $duplicate), "success" => true]);
            // session()->flash("info", "Import completed. Skiped  " . count($duplicate) . " record. error due to duplicate email or username. Duplicate: " . implode(", ", $duplicate));
        }

        if (count($error) && count($duplicate)) {
            return response(["data" => "Import Completed with erors. Error: " . implode(", ", $error) . ". Skiped " . count($duplicate) . " record. Duplicate" . implode(", ", $duplicate), "succes" => true]);
            // session()->flash("info", "Import Completed  with errors. Error: " . implode(", ", $error) . ". Skiped " . count($duplicate) . " record. Duplicate" . implode(", ", $duplicate));
        }

        if (!count($error) && !count($duplicate)) {
            return response(["data" => "Import Completed.", "success" => true]);
            // session()->flash("success", "Import Completed.");
        }

        // return redirect()->route('admin.organisation.index');
    }

    public function orgUsers(Organisation $organisation)
    {
        $all_students = $organisation->users()->with(["user_role"])->get();
        return view('admin.organisation.list', compact("all_students", "organisation"));
    }

    public function projects(Organisation $organisation)
    {
        $organisation->load("projects");
        return view('admin.organisation.projects.projects', compact("organisation"));
    }

    public function projectsCreate(Organisation $organisation)
    {
        return view('admin.organisation.projects.create', compact("organisation"));
    }

    public function projectStore(OrganisationProjectStoreRequest $request, Organisation $organisation)
    {
        $this->set_access("file");
        $this->set_upload_path("website/project");
        $project = new OrganisationProject;
        $project->title = $request->title;
        $project->slug = Str::slug($request->title);
        $project->description = $request->description;
        $project->genre = $request->genre;
        $project->country = $request->country;
        $project->organisations_id = $organisation->id;

        $images = [];
        if ($request->hasFile("banner_image")) {
            $images["banner"] = $this->upload("banner_image");
        }
        if ($request->hasFile("image_one")) {
            $images["image_one"] = $this->upload("image_one");
        }
        if ($request->hasFile("image_two")) {
            $images["image_two"] = $this->upload("image_two");
        }
        if ($request->hasFile("image_three")) {
            $images["image_three"] = $this->upload("image_three");
        }
        if ($request->hasFile("image_four")) {
            $images["image_four"] = $this->upload("image_four");
        }
        if ($request->hasFile("image_five")) {
            $images["image_five"] = $this->upload("image_five");
        }

        $project->images = $images;
        try {
            //code...
            $project->save();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "Error: " . $th->getMessage());
            return back()->withInput();
        }
        session()->flash('success', "New Project Created.");
        return back();
    }

    public function projectEdit(OrganisationProject $project)
    {
        return view('admin.organisation.projects.edit', compact("project"));
    }

    public function projectUpdate(OrganisationProjectUpdateRequest $request, OrganisationProject $project)
    {
        $this->set_access("file");
        $this->set_upload_path("website/project");
        $project->title = $request->title;
        $project->slug = $request->slug;
        $project->description = $request->description;
        $project->genre = $request->genre;
        $project->country = $request->country;
        $images = (array) $project->images;
        if ($request->hasFile("banner_image")) {
            $images["banner"] = $this->upload("banner_image");
        }
        if ($request->hasFile("image_one")) {
            $images["image_one"] = $this->upload("image_one");
        }
        if ($request->hasFile("image_two")) {
            $images["image_two"] = $this->upload("image_two");
        }
        if ($request->hasFile("image_three")) {
            $images["image_three"] = $this->upload("image_three");
        }
        if ($request->hasFile("image_four")) {
            $images["image_four"] = $this->upload("image_four");
        }
        if ($request->hasFile("image_five")) {
            $images["image_five"] = $this->upload("image_five");
        }

        $project->images = $images;

        try {
            $project->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Error: " . $th->getMessage());
            return back();
        }

        session()->flash('success', "Project Detail Updated.");
        return back();
    }

    public function projectDelete(OrganisationProject $project)
    {
        try {
            $project->delete();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash("error", "Error: " . $th->getMessage());
            return back();
        }

        session()->flash('success', "Project Deleted.");
        return back();
    }
}
