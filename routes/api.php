<?php

use App\Models\Corcel\WpUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/user/login/detail", function () {
    // return response(["success" => true]);
    session()->regenerate();
    $wp_user = WpUser::where('id', request()->_ref_id)->first();
    if (!$wp_user) {
        response(["success" => false, "data" => [], "message" => "Record doesn't exists."], 403);
    }
    return response(["success" => true, "data" => ["uuid" => $wp_user->ID, "username" => "something"]]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
