<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsVideoController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\SubcribeController;
use App\Http\Controllers\ContactController;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'index')->name('home');
    Route::get('/contact','contact')->name('contact');
});

Route::controller(NewsController::class)->group(function(){
    Route::get('/detail/{slug}','detail')->name('detail');
    Route::get('/search','search')->name('search');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin','index')->name('admin.index');
    Route::get('/admin/contact','showContact')->name('admin.contact');
    Route::post('/admin/contact/edit','editContact');
});



Route::post('/upload/image',function(Request $request){ 
            return response()->json(['error' => 'Không có file được upload']);
})->name('ckeditor.upload');


Route::get('/admin/category/search',[CategoryController::class,'searchCategory'])->name('category.search');
Route::get('/admin/news-video/search',[NewsVideoController::class,'search'])->name('news-video.search');
Route::get('/admin/advertisement/search',[AdvertisementController::class,'search'])->name('advertisement.search');
Route::get('/admin/subcribe/search',[SubcribeController::class,'search'])->name('subcribe.search');
Route::get('/admin/post/search',[PostController::class,'search'])->name('post.search');
Route::resources([
    '/admin/post' => PostController::class,
    '/admin/category' => CategoryController::class,
    '/admin/news-video'=>NewsVideoController::class,
    '/admin/advertisement'=>AdvertisementController::class,
    '/admin/contact-request'=>ContactRequestController::class,
    '/admin/subcribe' => SubcribeController::class
]);
Route::get('/api/get-post-trending',[PostController::class,'getPostsTrending']);
Route::get('/api/contact',[ContactController::class,'index']);
Route::get('/api/category',[CategoryController::class,'category']);
Route::get('/api/get-top-three-posts',[PostController::class,'getTopThreePosts']);
Route::get('/api/get-post-last-modify',[PostController::class,'getPostLastModify']);
Route::get('/api/get-post-popular',[PostController::class,'getPopularPost']);
Route::get('/api/get-sum-post-of-category/{id}',[CategoryController::class,'countPostsOfCategory']);
Route::get('/api/get-captcha',[CategoryController::class,'getCaptcha']);


 
