<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNewsController;
use Illuminate\Support\Facades\DB;


Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'index')->name('home');
    Route::get('/contact','contact')->name('contact');
    Route::post('/contact/add-subcribe','addSubcribe');
    Route::post('/contact/add-contact-requesst','addContactRequest');
});

Route::controller(NewsController::class)->group(function(){
    Route::get('detail','detail')->name('detail');
    Route::get('search','search')->name('search');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin','index')->name('admin.index');
    Route::get('/admin/subcribe','showSubcribe')->name('admin.subcribe');
    Route::get('/admin/subcribe/edit/{id}','showEditSubcribe');
    Route::post('/admin/subcribe','addSubcribe');
    Route::post('/admin/subcribe/edit','editSubcribe');
    Route::get('/admin/subcribe/search','searchSubcribe');
    Route::get('/admin/advertisement','showAdvertisement')->name('admin.advertisement');
    Route::post('/admin/advertisement','addAdvertisement');
    Route::post('/admin/advertisement','addAdvertisement');
    Route::post('/admin/advertisement/edit/{id}','showEditAdvertisement');
    Route::post('/admin/advertisement/edit','editAdvertisement');
    Route::get('/admin/advertisement/search','searchAdvertisement');
    Route::get('/admin/contact','showContact')->name('admin.contact');
    Route::post('/admin/contact/edit','editContact');
    Route::get('/admin/contact-request','showContactRequest')->name('admin.contact_request');
    Route::post('/admin/contact-request/edit/{id}','editContactRequest');

});

Route::controller(AdminNewsController::class)->group(function(){

    Route::get('/admin/category','category')->name('admin.category');
    Route::post('/admin/category','addCategory');
    Route::post('/admin/category/edit/{id}','showEditCategory');
    Route::post('/admin/category/edit','editCategory');
    Route::get('/admin/category/search','searchCategory');
    Route::get('/admin/article','showArticle')->name('admin.article');
    Route::post('/admin/article/','addArticle');
    Route::post('/admin/article/edit/{id}','showEditArticle');
    Route::post('/admin/article/edit','editArticle');
    Route::get('/admin/article/search','searchArticle');
    Route::get('/admin/news-video','showNewsVideo')->name('admin.news_video');
    Route::post('/admin/news-video/edit/{id}','showEditNewsVideo');
    Route::post('/admin/news-video/edit','editNewsVideo');
    Route::post('/admin/news-video','addNewsVideo');
});


 
 
