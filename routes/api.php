<?php

use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BusinessSettingController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', [AuthController::class,'user']);
Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'postList');
    Route::get('/posts/{slug}', 'postDetails');
    Route::post('/posts-get-point/{postId}', 'getPointByPost')->middleware('auth:sanctum');
});
Route::get('/sliders', [SliderController::class, 'getSlider']);
Route::get('/tags', [TagController::class, 'getTagList']);
Route::get('/tags/{slug}', [TagController::class, 'tagDetails']);
Route::get('/videos', [VideoController::class,'getVideos']);
Route::get('/videos/{id}', [VideoController::class,'getVideoDetails']);
Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'getCategoryList');
    Route::get('/categories/recursive', 'recursiveCategory');
    Route::get('/categories/{slug}', 'categoryDetails');
});
Route::get('/business-settings', [BusinessSettingController::class, 'getSetting']);
Route::get('/ads', [AdController::class, 'getAdList']);