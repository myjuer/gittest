<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/admin/admin', function () {
    return view('admin.index');
});
Route::any('/admin/user/{action?}', 'userController@index');
Route::any('/admin/user/ajax/{ajax_method?}', 'userController@ajax_method');
Route::any('/admin/user_edit/{user_id}/{action?}', 'userController@user_edit');
Route::get('/admin/loginlog', 'loginlogController@index');
Route::get('/admin/product', 'productController@index');
Route::get('/admin/product_edit', 'productController@product_edit');
Route::get('/admin/news', 'newsController@index');
Route::get('/admin/news_edit', 'newsController@news_edit');
Route::get('/admin/honor', 'honorController@index');
Route::get('/admin/honor_edit', 'honorController@honor_edit');
Route::get('/admin/message', 'messageController@index');
Route::get('/admin/message_edit', 'messageController@message_edit');
Route::get('/admin/section', 'sectionController@index');
Route::get('/admin/section_edit', 'sectionController@section_edit');
Route::get('/admin/component', 'componentController@index');
Route::get('/admin/component_edit', 'componentController@component_edit');
Route::get('/blade', function () {
    return view('child');
});