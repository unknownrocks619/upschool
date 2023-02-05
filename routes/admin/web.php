<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Course\ChapterController;
use App\Http\Controllers\Admin\Course\CourseController;
use App\Http\Controllers\Admin\Course\LessionController;
use App\Http\Controllers\Admin\Ecommerce\ProductController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\Organisation\OrganisationController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\User\BookUploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\User\UserController as Users;
use App\Http\Controllers\Admin\WebSettingController;
use App\Http\Controllers\Admin\WidgetController;
use App\Models\Corcel\BookDonationData;
use Illuminate\Support\Facades\Route;

Route::prefix("upschool/admin")
    ->name('admin.')
    // ->middleware('auth')
    ->group(function () {


        Route::get('/books', function () {
            $books = BookDonationData::limit(10)->get();
        });

        Route::get("dashboard", function () {
            return view("admin.dashboard");
        });

        /**
         * Menus
         */

        Route::prefix("menu")
            ->name('menu.')
            ->controller(MenuController::class)
            ->group(function () {
                Route::post('/reoder', "reOrder")->name('reorder');
                Route::PUT('/reoder-single/{menu}', "reOrderSingle")->name('reorder_position');
                Route::get('module-link/{menu}', "modulesOptions")->name('link_module_options');
                Route::get('module-link/manage/{menu}', "manageModule")->name('manage_module');
                Route::post('module-link/{menu}', 'moduleAttach')->name('attach_module');
                Route::delete('module-unlink/{menu}/{deatch_id}', 'moduleDeatch')->name('deatch_module');
                Route::resource('menu', MenuController::class);
            });

        Route::prefix("page")
            ->name('page.')
            ->controller(PageController::class)
            ->group(function () {
                Route::get("/widget/modal/{page}", "widgetAdd")->name('add_widget');
                Route::get('/widget/{page}', "widgetView")->name('manage_widget');
                Route::delete('/widget/remove/{page}/{widget}', "widgetDestroy")->name('destroy_widget');
                Route::post("/widget/modal/{page}", "widgetStore")->name('store_widget');
                Route::resource('page', PageController::class);
            });
        /**
         * Website Settings
         */

        Route::prefix("website/setting")
            ->name('web.setting.')
            ->controller(WebSettingController::class)
            ->group(function () {
                Route::get("/", "index")->name("list");
                Route::put("/", "update")->name("update");
            });

        /**
         * Category
         */
        Route::prefix("website/category")
            ->name('web.')
            // ->controller(CategoryController::class)
            ->group(function () {
                Route::resource("category", CategoryController::class);
            });

        /**
         * Widgets
         */
        Route::prefix("website/widgets")
            ->name("web.")
            ->controller(WidgetController::class)
            ->group(function () {
                Route::get('filter', "filterIndex")->name('widget_by_type');
                Route::resource('widget', WidgetController::class);
            });

        /**
         * Organisation Setup
         */
        Route::prefix("organisation")
            ->name('org.')
            ->controller(OrganisationController::class)
            ->group(function () {
                Route::post('sync/cat/', 'sync')->name('org_sync');
                Route::get('modal/import-csv/{organisation}', "importUserModal")->name('modal_csv_upload');
                Route::post('modal/import-csv/{organisation}', "importUser")->name('store_csv_upload');
                Route::get('users/{organisation}', "orgUsers")->name('user');
                Route::post('users/reset-password/{organisation}/{user}', [UserController::class, "organisationResetPassword"])->name('user.password.reset');
                Route::post('users/remove-user/{organisation}/{user}', [UserController::class, "organisationRemoveUser"])->name('user.remove');

                /**
                 * Project Setup
                 */
                Route::get("projects/{organisation}/", "projects")->name('org.project.list');
                Route::get('/projects/edit/{project}', "projectEdit")->name('org.project.edit');
                Route::get('/projects/create/{organisation}', "projectsCreate")->name('org.project.create');
                Route::post('/projects/create/{organisation}', "projectStore")->name('org.project.store');
                Route::put('/projects/edit/{project}', "projectUpdate")->name('org.project.update');
                Route::post('project/donation/{project}', 'projectUpdateDonation')->name('org.project.donation.update');
                Route::get('project/donation/{status}/{project}', 'projectBuyBreaks')->name('org.project.donation.status');
                Route::delete('/projects/delete/{project}', "projectDelete")->name('org.project.delete');
                Route::resource("org", OrganisationController::class);
            });

        /**
         * Course Setup
         */
        Route::prefix("course")
            ->name('course.')
            ->controller(CourseController::class)
            ->group(function () {
                Route::get("permission/{course}", "permission")->name('permission');
                Route::patch("permission/{course}", "updatePermission")->name('permission.update');
                Route::delete("permission/{course}", "removePermission")->name('permission.delete');

                /**
                 * Resource
                 */
                Route::get("resource/{course}", "resource")->name('resource');
                Route::patch("resource/{course}", "updateResource")->name("resource.update");
                Route::delete("resource/{course}", "removeResource")->name("resource.delete");

                /**
                 * Chapters
                 */
                Route::get('chapters/{course}', 'chapters')->name('chapters');
                Route::post('chapters/{course}', 'storeChapter')->name('chapters.create');
                Route::delete('chapters/{course}/{chapter}', 'removeChapter')->name('chapters.delete');


                /**
                 * Widget
                 */
                Route::get("widgets/{course}", "widget")->name('widget');
                Route::post("widgets/{course}", "storeWidget")->name('widget.store');
                Route::delete("widgets/{course}/{widget}", "removeWidget")->name('widget.delete');

                Route::resource('course', CourseController::class);
            });
        /**
         * Chapters Setup
         */
        Route::prefix('chapter')
            ->name('chapter.')
            ->controller(ChapterController::class)
            ->group(function () {
                Route::delete('/deattach/{course}/{chapter}', "destroyCourse")->name('remove_course');
                Route::resource("chapter", ChapterController::class);
            });
        /**
         * Lession Setup
         */

        Route::prefix('lession')
            ->name('lession.')
            ->controller(LessionController::class)
            ->group(function () {
                Route::get("add/widget/{lession}", "addWidget")->name('widget');
                Route::post("add/widget/{lession}", "storeWidget")->name('widget.store');
                Route::post('store/resource', "storeResource")->name('resource.store');
                Route::get('store/resource/{lession}', "viewResource")->name('resource.view');
                Route::delete('store/resource/{lession}/{resource}', "removeResource")->name('resource.delete');
                Route::delete("remove/widget/{lession}/{widget}", "removeWidget")->name('widget.delete');
                Route::resource("chapter.lession", LessionController::class);
            });

        /**
         * Users
         */

        Route::prefix("users")
            ->name("users.")
            ->controller(Users::class)
            ->group(function () {

                Route::get('/canva/list', "canvaUser")->name("canva.list");
                Route::get('/canva/status/{canva}', "canvaUserStatus")->name("canva.status");
                Route::patch("/ban/{user}", "banUser")->name("user.ban");
                Route::get("/wp-index", 'wp_index')->name('user.wp');
                Route::resource("user", Users::class);

                Route::prefix('books')
                    ->name("books.")
                    ->controller(BookUploadController::class)
                    ->group(function () {

                        Route::get("list", "index")->name('list');
                        Route::get("show/{book}", "show")->name('show');
                    });
            });

        /**
         * Post
         */
        Route::prefix("posts")
            ->name('posts.')
            ->controller(PostController::class)
            ->group(function () {
                Route::get("/widgets/{post}", "widgetView")->name('widgets');
                Route::get("/widgets/modal/{post}", "widgetAdd")->name('widgets.create');
                Route::post("/widgets/{post}", "widgetStore")->name('widgets.store');
                Route::delete("/widgets/remove/{post}/{widget}", "widgetDestroy")->name('widgets.destroy');
                Route::post("/remove/media/{post}", "removeMedia")->name("destroy_media");
                Route::resource("post", PostController::class);
            });

        /**
         * E-commerce
         */

        Route::prefix("commerce")
            ->name('commerce.')
            ->controller(ProductController::class)
            ->group(function () {
                Route::get("/product/list", "index")->name("product.list");
                Route::get("/product/edit/{product}", "edit")->name("product.edit");
                Route::get("/product/meta/{product}", "createProductMeta")->name("product.meta.create");
                Route::get("/product/media/{product}", "createProductMedia")->name("product.media.create");
                Route::get("/book/transaction/{product}", "productTransaction")->name("book.transaction.index");
                Route::get("/book/transfer/{book}", "createBookProduct")->name("book.convert.create");
                Route::post("/book/transfer/{book}", "storeBookProduct")->name("book.convert.store");
                Route::post("/product/meta/{product}", "storeProductMeta")->name("product.meta.store");
                Route::post("/product/media/{product}", "storeProductMedia")->name("product.media.store");
                Route::delete("/product/media/delete/{product}/{index}", "destroyProductMedia")->name("product.media.delete");
                Route::put("/product/edit/{product}", "updateProduct")->name("product.update");
            });
    });
