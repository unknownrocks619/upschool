<?php

use App\Http\Controllers\Frontend\Course\CourseController;
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

// Route::get('/sms', [Sms::class, "dikshit_form"]);

// Route::name('frontend.')->group(function () {
//     Route::get("/", fn () => view("welcome"));
// });
Route::get("/course/{course:alias_title}", [CourseController::class, "show"])->name("course.show");
// require __DIR__ . "/admin/web.php";
require __DIR__ . '/auth.php';
require __DIR__ . "/frontend/web.php";
