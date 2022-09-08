<?php

use Illuminate\Support\Facades\Cache;

if (!function_exists("menus")) {

    function menus()
    {
        static $menus = null;
        if ($menus) return $menus;
        if (!settings("cache")) {
            $menus = \App\Models\Menu::where('active', true)->tree()->depthFirst()->orderBy("sort_by")->get()->toTree();
        } elseif (settings("cache") && Cache::has("menus")) {
            $menus = Cache::get('menus');
        } elseif (settings('cahce') && !Cache::has('menus')) {
            $menus = \App\Models\Menu::where('active', true)->tree()->depthFirst()->get()->toTree();
            Cache::put('menus', $menus);
        }
        return $menus->sortBy("sort_by");
    }
}


if (!function_exists("menu_by_type")) {
    function menu_by_type($menu_type)
    {
    }
}
