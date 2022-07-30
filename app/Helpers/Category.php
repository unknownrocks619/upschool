<?php

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

if (!function_exists("categories")) {

    function categories()
    {
        static $category = null;

        if ($category) return $category;

        if (settings()->where('name', 'cache')->first()->value && Cache::has('categories')) {
            $category = Cache::get("categories");
        } elseif (settings()->where('name', 'cache')->first()->value && !Cache::has("categories")) {
            Cache::put("categories", Category::get());
            $category = Cache::get("categories");
        } else {
            $category = Category::with(["descendants"])->get();
        }

        return $category;
    }
}
