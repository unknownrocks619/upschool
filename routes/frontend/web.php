<?php

use App\Http\Controllers\Frontend\Course\CourseController;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\Management\ManagementController;
use App\Http\Controllers\Frontend\User\UserController;
use Illuminate\Support\Facades\Route;
// Route::get('/register/verification/', [UserController::class, "verfiyEmail"])->name('user.registration.verification');

/**
 * Public Group
 */
Route::name('frontend.')->group(function () {
    Route::get("/", [HomeController::class, "index"])->name("home");
    Route::get("/{slug}", [HomeController::class, "detail"])->name('view');
});
/**
 * Auth Group
 */
Route::name('frontend.')->middleware(["auth"])->group(function () {
    Route::get("dashboard", function () {
        return view('dashboard');
    })->name("dashboard");

    /**
     * Authenticated User
     */

    Route::prefix("user")
        ->middleware('auth')
        ->name('auth_user.')
        ->group(function () {
            Route::get('/profile', [UserController::class, "profile"])->name('profile');
            Route::get("password", [UserController::class, "password"])->name('password');
            Route::post("/profile", [UserController::class, "updateProfile"])->name('profile.update');
            Route::post('password', [UserController::class, "changePassword"])->name('password.update');
        });

    /**
     * Unautheticated user.
     */

    /**
     * Management
     */
    Route::prefix("manage")
        ->name('manage.')
        ->controller(ManagementController::class)
        ->group(function () {
            Route::get("/teacher", 'teachers')->name('teacher');
            Route::get("/users", "students")->name("student");
            Route::get("/resource/{role}/{resource}", "resources")->name("resources");
            Route::delete("/remove/{user}", 'removeUser')->name('delete.user');
            Route::patch("/update/status/{user}", "updateStatus")->name('update.status');
            Route::post("/password/reset/{user}", "resetPassword")->name('reset.password');
        });
    /**
     * Courses
     */
    Route::controller(CourseController::class)
        ->prefix('user/course')
        ->name('course.')
        ->group(function () {
            Route::get("/", "index")->name('index');
            Route::get("/{course?}", "watch")->name('watch');
        });
});


/**
 * Registration Group
 */

Route::name('frontend.')->group(function () {
    Route::prefix('user')
        ->controller(UserController::class)
        ->name('user.')
        ->group(function () {
            /**
             * Auth Group
             */
            Route::get("register/verification", "verifyEmail")->name('registration.verification');
            Route::get("register/resend", "resendVerificationCreate")->name('registration.resend');
            Route::get("register/forgot", "forgot")->name('registration.forgot');
            Route::get('/register/success', 'checkEmailMessage')->name('registration.verification.message');
            Route::post("register/resend", "resendVerificationSend")->name('registration.resend-link');
            Route::post("register/forgot", "forgotSend")->name('registration.forgot.send');
            Route::post("register/forgot", "forgotConfirmationVerify")->name('registration.forgot.verify');
            // Route::post("register/forgot", "forgotConfirmationVerify")->name('registration.forgot.verify');
            /**
             * Password Reset
             */
            Route::post("forgot-password", "resetPassword")->name('reset_link');
            Route::get("reset/verify/{token}", 'verifyResetLink')->name('verify_reset');
            Route::post("reset/verify/{user}", 'updatePassword')->name('reset.confirm');
        });
});
