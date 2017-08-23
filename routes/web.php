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
//================== Admin routes ================================
Route::get('/admin','Admin\AdminController@Home')->middleware('not.login');
Route::get('/admin/log-in','Admin\AccountController@getLogin');
Route::get('/admin/log-out','Admin\AccountController@Logout');
Route::post('/admin/log-in','Admin\AccountController@postLogin');
//system config
Route::get('/admin/system-config','Admin\AdminController@getSystemConfig')->middleware('not.login');
Route::post('/admin/system-config','Admin\AdminController@updateSystemConfig')->middleware('not.login');

//system language
Route::get('/admin/system-language','Admin\AdminController@getLanguage')->middleware('not.login');
Route::get('/admin/create-language','Admin\AdminController@getCreateNewLanguage')->middleware('not.login');
Route::post('/admin/create-language','Admin\AdminController@postCreateNewLanguage')->middleware('not.login');
Route::get('/admin/edit-language-{id}','Admin\AdminController@getEditLanguage')->middleware('not.login');
Route::post('/admin/edit-language-{id}','Admin\AdminController@postEditLanguage')->middleware('not.login');
Route::get('/admin/delete-language-{id}','Admin\AdminController@getDeleteLanguage')->middleware('not.login');
Route::post('/admin/delete-language-{id}','Admin\AdminController@postDeleteLanguage')->middleware('not.login');
//system permission
Route::get('/admin/system-permission','Admin\PermissionController@Index')->middleware('not.login');
Route::get('/admin/resize-image','Admin\PermissionController@getResize')->middleware('not.login');
Route::post('/admin/resize-image','Admin\PermissionController@postResize')->middleware('not.login');

//menu management
Route::get('/admin/{id}-menu-management','Admin\AdminController@getMenu')->middleware('not.login');
Route::get('/admin/create-new-menu','Admin\AdminController@getCreateNewMenu')->middleware('not.login');
Route::post('/admin/create-new-menu','Admin\AdminController@postCreateNewMenu')->middleware('not.login');
Route::get('/admin/delete-menu-{id}','Admin\AdminController@getDeleteMenu')->middleware('not.login');
Route::post('/admin/delete-menu-{id}','Admin\AdminController@postDeleteMenu')->middleware('not.login');
Route::get('/admin/edit-menu-{id}','Admin\AdminController@getEditMenu')->middleware('not.login');
Route::post('/admin/edit-menu-{id}','Admin\AdminController@postEditMenu')->middleware('not.login');


Route::get('/admin/list-user','Admin\AdminController@Getlistuser')->middleware('not.login');
Route::get('/admin/add-user','Admin\AdminController@Getadduser')->middleware('not.login');
Route::post('/admin/add-user','Admin\AdminController@Postadduser')->middleware('not.login');
Route::get('/admin/edit-user','Admin\AdminController@Getedituser')->middleware('not.login');
Route::post('/admin/edit-user','Admin\AdminController@postedituser')->middleware('not.login');
Route::post('/admin/delete-user','Admin\AdminController@postdeleteuser')->middleware('not.login');