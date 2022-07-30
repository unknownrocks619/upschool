<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        return view('frontend.index');
    }

    public function list()
    {
    }

    public function detail($slug, $type = null)
    {
        $menu = Menu::where('slug', $slug)->first();
        $category = ($menu->menu_type == "category") ? $menu->load('categories') : null;
        $courses = ($menu->menu_type == "course") ? $menu->load('courses') : null;
        $pages = ($menu->menu_type == "pages") ? $menu->load("pages") : null;

        return view('frontend.detail');
    }
}
