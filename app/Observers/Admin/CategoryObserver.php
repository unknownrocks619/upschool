<?php

namespace App\Observers\Admin;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        $category->slug = Str::slug($category->category_name, "-");
        // check if slug exists.
        if (Category::where('slug', $category->slug)->exists()) {
            $category->forceDelete();
            return throw new Exception("Category Already exists. ", 500);
        }
        try {
            $category->saveQuietly();
        } catch (\Throwable $th) {
            $category->forceDelete();
            return throw new Exception("Unable to create new record. " . $th->getMessage(), 500);
        }

        if (settings('cache')) {
            Cache::put("categories", Category::with(["descendants"])->get());
        }
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        //

        if (settings('cache')) {
            Cache::put("categories", Category::with(["descendants"])->get());
        }
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
        if ($category->descendants->count()) {
            foreach ($category->descendants as $child) {
                $child->parent_id = null;
                $child->saveQuietly();
            }
        }
        if (settings('cache')) {
            Cache::put("categories", Category::with(["descendants"])->get());
        }
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
