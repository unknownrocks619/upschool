<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\User\BookController;
use App\Http\Controllers\Frontend\User\BookUploadController;
use App\Models\Menu;
use App\Models\Organisation;
use App\Models\OrganisationProject;
use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $page = Page::with(["widget"])->where('page_type', 'home')->first();
        return view('frontend.index', compact("page"));
    }

    public function list()
    {
    }

    public function detail($slug, $type = null)
    {
        $menu = Menu::where('slug', $slug)->first();
        if ($menu->menu_type == "book-upload-form") {
            $user = new BookUploadController;
            return $user->guestUpload($type);
        }

        if ($menu->menu_type == "project") {
            $orgs = Organisation::latest()->get();
            $projects = OrganisationProject::with(["organisation"])->latest()->get();
            return view("frontend.pages.projects.index", compact("menu", "orgs", "projects"));
        }

        if ($menu->menu_type == "charity"){
            
        }


        if ($menu->menu_type == "book-list") {
            $book = new BookController;
            return $book->index($menu);
        }

        $category = ($menu->menu_type == "category") ? $menu->load('categories') : null;
        $courses = ($menu->menu_type == "course") ? $menu->load('courses') : null;
        $pages = ($menu->menu_type == "page") ? $menu->load("pages") : null;
        $posts = ($menu->menu_type == "post") ? $menu->load("posts") : null;
        return view('frontend.detail', compact("menu", "category", "courses", "pages", "posts"));
    }
}
