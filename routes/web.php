<?php

use App\Http\Controllers\Frontend\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sms;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sms', [Sms::class, "volunteer_sms"]);

// Route::name('frontend.')->group(function () {
//     Route::get("/", fn () => view("welcome"));
// });


require __DIR__ . "/frontend/web.php";
require __DIR__ . "/admin/web.php";
require __DIR__ . '/auth.php';
