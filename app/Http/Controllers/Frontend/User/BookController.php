<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //

    public function index(Menu $menu)
    {
        $products = Product::where('status', 'active')->with(["categories", "author"])->latest()->get();
        return view("frontend.pages.product.list", compact("menu", 'products'));
    }

    public function show($slug)
    {
        $product = Product::where("slug", $slug)->where('status', 'active')->firstOrFail();
        return view('frontend.pages.product.detail', compact('product'));
    }
}
