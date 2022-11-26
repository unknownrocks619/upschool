<?php

use App\Models\API\AuthRecord;
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

Route::prefix('/user/login')->group(function () {

    Route::post('auth/session', function () {

        $check_auth_record = AuthRecord::where('token', request()->_ref_id)->firstOrFail();
        $user = $check_auth_record->users;

        $wp_user = WpUser::where('user_email', $user->email)
            ->latest()
            ->first();

        if (!$wp_user) {
            response(["success" => false, "data" => [], "message" => "Record doesn't exists."], 403);
        }
        $check_auth_record->delete();
        return response(["success" => true, "data" => ["uuid" => $wp_user->ID, "username" => $user->username]]);
    });
});

Route::post("/user/login/detail", function () {
    // return response(["success" => true]);
    session()->regenerate(true);
    session()->regenerateToken();
    $wp_user = WpUser::where('id', request()->_ref_id)->first();
    if (!$wp_user) {
        response(["success" => false, "data" => [], "message" => "Record doesn't exists."], 403);
    }
    return response(["success" => true, "data" => ["uuid" => $wp_user->ID, "username" => "something"]]);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
