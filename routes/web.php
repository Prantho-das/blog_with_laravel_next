<?php

use App\Http\Controllers\BusinessSettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserRolePermissionController;
use App\Http\Controllers\VideoController;
use App\Models\BusinessSetting;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
   $data= Storage::disk('s3')->put('document/test.txt', 'Hello World');
   
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::resource('/category', CategoryController::class);
    Route::resource('/tag', TagController::class);
    Route::get('/approve-post/{post}', [PostController::class, 'approvePost'])->name('post.approve');
    Route::resource('/post', PostController::class);
    Route::resource('/page', PageController::class);
    Route::resource('/video', VideoController::class);

    Route::controller(BusinessSettingController::class)->as('setting.')->group(function () {
        Route::get('/website-setup', 'webSetUpShow')->name('website');
        Route::post('/website-setup-store', 'webSetUpStore')->name('website-store');
        Route::get('/social-setup', 'socialSetupShow')->name('social');
        Route::get('/referer-setup', 'refererSetupShow')->name('referer');


    });
    Route::controller(UserRolePermissionController::class)->group(function () {
        Route::get('/role', 'roleIndex')->name('role.index');
        Route::post('/role', 'roleStore')->name('role.store');
        Route::delete('/role/destroy/{role}', 'roleDestroy')->name('role.destroy');
        Route::get('/permission', 'permissionIndex')->name('permission.index');

        Route::post('/permission', 'permissionStore')->name('permission.store');
        Route::delete('/permission/destroy/{permission}', 'permissionDestroy')->name('permission.destroy');
        Route::get('/assign-permission-to-role/{roleId}', 'assignPermissionToRoleShow')->name('permission.assignPermissionToRoleShow');
        Route::post('/assign-permission-to-role', 'assignPermissionToRoleStore')->name('permission.assignPermissionToRoleStore');
        Route::post('/assign-role-to-user/{userId}', 'assignRole')->name('role.assignRole');

    });

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});