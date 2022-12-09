<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Frontend\Course\CourseController;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\Management\ManagementController;
use App\Http\Controllers\Frontend\User\BookController;
use App\Http\Controllers\Frontend\User\BookUploadController;
use App\Http\Controllers\Frontend\User\UserController;
use Illuminate\Support\Facades\Route;
// Route::get('/register/verification/', [UserController::class, "verfiyEmail"])->name('user.registration.verification');

/**
 * Auth Group
 */
Route::name('frontend.')->group(function () {
    Route::middleware('auth')->get("dashboard", function () {
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
            /**
             * Upload Book
             */
            Route::prefix("book")
                ->name('books.')
                ->group(function () {
                    Route::post("upload/store", [BookUploadController::class, "StoreUpload"])->name("store-book-upload");
                    Route::get("/books", [BookUploadController::class, "index"])->name("book.list");
                    Route::get("/books/meta/{book}", [BookUploadController::class, "createUploadMetaInformation"])->name("book.meta");
                    Route::post("/books/meta/{book}", [BookUploadController::class, "storeUploadMetaInformation"])->name("book.meta.store");
                    Route::get("/books/category/{book}", [BookUploadController::class, "createBookCategory"])->name("book.category");
                    Route::post("/books/category/{book}", [BookUploadController::class, "storeBookCategory"])->name("book.category.store");
                    Route::post("/books/project/{book}", [BookUploadController::class, "storeBookProject"])->name("book.project.store");
                    Route::post("/books/upload/{book}", [BookUploadController::class, "updateBookStatus"])->name("book.upload.store");
                    Route::delete("/destroy/books/{book}", [BookUploadController::class, "destroy"])->name("book.destroy");
                });
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
            Route::post('/course/enroll/{course?}', "enroll")->name('enroll');
            Route::post("/watch/lession/{course}/{lession}", "lession")->name('lession');
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
            Route::get('/register/success/social', 'checkSocialLoginMessage')->name('registration.verification.message.facebook');
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

/**
 * Public Group
 */
Route::name('frontend.')->group(function () {
    // Route::get("/", [RegisteredUserController::class, 'create'])->name("home");
    // Route::get("/", [RegisteredUserController::class, 'create'])->name("view");
    Route::get("/", [HomeController::class, "index"])->name("home");
    Route::get("/book/{slug}", [BookController::class, "show"])->name("book.show");
    Route::get("/book/upload/book/{tab?}", [BookUploadController::class, "uploadCreate"])->name("book.upload");
    Route::get("/book/upload/{book}/{tab?}", [BookUploadController::class, "uploadEdit"])->name("book.edit.upload");
    Route::get("/{slug}/{model?}", [HomeController::class, "detail"])->name('view');
});
