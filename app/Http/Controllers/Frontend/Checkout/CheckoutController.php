<?php

namespace App\Http\Controllers\Frontend\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

    public function index($type)
    {
        return view('frontend.pages.checkout.checkout', compact("type"));
    }
}
