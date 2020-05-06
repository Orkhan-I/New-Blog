<?php

use Illuminate\Support\Facades\Route;


//Backend

Route::get('/sayt',function(){
    return view('front.offline');
});





Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function(){
    Route::get('login','back\auths@login')->name('login');
    Route::post('login','back\auths@loginPost')->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){
                    //Articles
    Route::get('panel','back\dashboard@index')->name('dashboard');
    Route::get('articles/silinenler','back\articleController@trashed')->name('trashed.article');
    Route::resource('articles','back\articleController');
    Route::get('/switch','back\articleController@switch')->name('switch');
    Route::get('/deletearticle/{id}','back\articleController@delete')->name('delete.article');
    Route::get('/harddeletearticle/{id}','back\articleController@harddelete')->name('hard.delete.article');
    Route::get('/recoverarticle/{id}','back\articleController@recover')->name('recover.article');
   
                   //Categories
   Route::get('categories','back\categoryController@index')->name('show.category');
   Route::post('/categories/create','back\categoryController@createCategory')->name('create.category');
   Route::post('/categories/update','back\categoryController@updateCategory')->name('update.category');
   Route::post('/categories/delete','back\categoryController@deleteCategory')->name('delete.category');
   Route::get('categories/status','back\categoryController@switch')->name('category.switch');
   Route::get('categories/getdata','back\categoryController@getData')->name('category.getdata');
   
                        //PAGES
    Route::get('/pages','back\pageController@index')->name('page.index');
    Route::get('/pageSwitch','back\pageController@pageSwitch')->name('page.switch');
    Route::get('/page/create','back\pageController@createPage')->name('create.page');
    Route::post('/page/create','back\pageController@createPagePost')->name('create.page.post');
    Route::get('/page/update/{id}','back\pageController@updatePage')->name('update.page');
    Route::post('/page/update/{id}','back\pageController@updatePost')->name('update.page.post');
    Route::get('/page/delete/{id}','back\pageController@deletePage')->name('delete.page');
    Route::get('/page/sira','back\pageController@orders')->name('page.orders');


    Route::get('/mesajlar','back\pageController@messages')->name('message');
    Route::get('/mesajlar/delete/{id}','back\pageController@deleteMessages')->name('delete.message');


                // AYARLAR
    Route::get('/ayarlar','back\configController@index')->name('config');
    Route::post('/update','back\configController@update')->name('update.configs');
                

    Route::get('/cixis','back\auths@logout')->name('logout');

    });









/*
|--------------------------------------------------------------------------
| Front
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Front\homepage@index')->name('homepage');
Route::get('/contact','Front\homepage@contact')->name('contact');
Route::post('/contact','Front\homepage@contactpost')->name('contact.post');
Route::get('/kateqoriya/{category}','Front\homepage@category')->name('category');
Route::get('/{category}/{slug}','Front\homepage@single')->name('blog.single');
Route::get('/{sehife}','Front\homepage@page')->name('page');

