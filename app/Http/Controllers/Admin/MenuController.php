<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menu\MenuStoreRequest;
use App\Http\Requests\Admin\Menu\MenuUpdateRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Upload\Media\Traits\FileUpload;

class MenuController extends Controller
{
    //
    use FileUpload;
    public function index()
    {
        $menus = Menu::orderBy("sort_by")->get();
        // dd($menus);
        return view('admin.menu.index', compact("menus"));
    }

    public function create()
    {
        $menus = Menu::where('active', true)->tree()->depthFirst()->get()->toTree();
        return view('admin.menu.create', compact('menus'));
    }

    public function edit(Menu $menu)
    {
        $menus = menus();
        return view("admin.menu.edit", compact("menu", "menus"));
    }

    public function store(MenuStoreRequest $request)
    {
        $menu = new Menu;

        $menu->menu_name = $request->menu_name;
        $menu->slug = ($request->slug) ? Str::slug($request->slug, "-") : Str::slug($request->menu_name, "-");
        $menu->description = $request->menu_description;
        $menu->menu_type = $request->menu_type;
        $menu->parent_id = (!$request->parent_menu) ? null : $request->parent_menu;
        $menu->sort_by = 1;
        $menu->menu_position = $request->menu_position;

        $menu->active = $request->active_status;
        $menu->display_type = $request->display;
        $menu->meta_title = $request->meta_title;
        $menu->meta_keyword = $request->meta_keyword;
        $menu->meta_description = $request->meta_description;

        if ($request->hasFile("featured_image")) {
            $this->set_access("file");
            $this->set_upload_path("website/menu");
            $menu->menu_featured_image = $this->upload("featured_image");
        }

        try {
            $menu->save();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            session()->flash('error', "Unable to create menu. Error: " . $th->getMessage());
            return back()->withInput();
        }

        session()->flash("success", "New Menu Record Created.");
        return back();
    }

    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        $menu->menu_name = $request->menu_name;
        $menu->slug = ($request->slug) ? Str::slug($request->slug, "-") : Str::slug($request->menu_name, "-");
        // if ($menu->isDirty("menu_name")) {
        // }

        $menu->description = $request->menu_description;
        $menu->parent_id = (!$request->parent_menu) ? null : $request->parent_menu;
        $menu->menu_position = $request->menu_position;
        $menu->active = $request->active_status;
        $menu->display_type = $request->display_type;
        $menu->meta_title = $request->meta_title;
        $menu->meta_keyword = $request->meta_keyword;
        $menu->meta_description = $request->meta_description;

        if ($request->hasFile("featured_image")) {
            $this->set_access("file");
            $this->set_upload_path("website/menu");
            $menu->menu_featured_image = $this->upload("featured_image");
        }

        try {
            $menu->save();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "Unable to update menu detail.");
            return back()->withInput();
        }

        session()->flash("success", "Menu Updated");
        return back();
    }

    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Unable to remove menu items.");
            return back();
        }

        session()->flash('success', "Menu Item removed.");
        return back();
    }

    public function reOrder(Request $request)
    {
        $request->validate([
            "ids" => "required|array",
            "ids.*" => "integer",
            "menu_id" => "required|integer"
        ]);


        foreach ($request->ids as $index => $id) {
            $menu = Menu::where('id', $id)->first();
            $menu->sort_by = $index + 1;
            $menu->update();
        }
    }

    public function reOrderSingle(Request $request, Menu $menu)
    {
        $menu->sort_by = $request->sort_by;
        $menu->saveQuietly();
        return back();
    }

    public function modulesOptions(Menu $menu)
    {
        return view('admin.menu.modules.' . $menu->menu_type . '.list', compact('menu'));
    }


    public function moduleAttach(Request $request, Menu $menu)
    {
        $relationship = $request->type;
        $menu->$relationship()->attach($request->link);

        session()->flash('success', "Module Attached to menu");
        return redirect()->route('admin.menu.menu.index');
    }

    public function manageModule(Menu $menu)
    {
        // load by type.
        $category = ($menu->menu_type == "category") ? $menu->load('categories') : null;
        $courses = ($menu->menu_type == "course") ? $menu->load('courses') : null;
        $pages = ($menu->menu_type == "page") ? $menu->load("pages") : null;
        $posts = ($menu->menu_type == "post") ? $menu->load("posts") : null;

        return view("admin.menu.manage", compact("menu", "category", "courses", "pages", 'posts'));
    }

    public function moduleDeatch(Request $request, Menu $menu, $deatch_id)
    {
        $relationship = $request->type;
        try {
            $menu->$relationship()->detach($deatch_id);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash("error", "Unable to unlink module.");
            return back();
        }

        session()->flash("success", "Module Removed from menu.");
        return back();
    }
}
