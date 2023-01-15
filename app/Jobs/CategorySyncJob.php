<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\Corcel\WPCategory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CategorySyncJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $categories = WPCategory::where('taxonomy', 'book_category')->get();
        foreach ($categories as $category) {
            $laravel = Category::where('slug', \Illuminate\Support\Str::slug($category->name))
                ->first();
            if (!$laravel) {
                $localCategory = new Category();
                $localCategory->category_name = $category->name;
                $localCategory->slug = \Illuminate\Support\Str::slug($category->name);
                $localCategory->category_type  = 'book_upload_category';
                $localCategory->saveQuietly();
            }
        }
        echo "Category Sync Success full.";
    }
}
