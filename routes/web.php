<?php

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommunityPostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
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

Auth::routes(['verify' => true]);
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth','verified'])->group(function(){

    Route::resource('communities', CommunityController::class);
    Route::resource('communities.posts', CommunityPostController::class);
    Route::resource('posts.comments',PostCommentController::class);
    Route::resource('profiles',UserProfileController::class);

});

