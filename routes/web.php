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
    return view('app');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('books', 'BookController');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('users', 'UserController');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('borrows', 'BorrowController');
});
Route::get('userpeminjam', 'AdminController@user_peminjam');
Route::get('pinjambuku', 'AdminController@pinjam_buku');
Route::get('kembalikan/{id}', 'AdminController@kembalikan');
Route::post('simpankembalikan/{id}', 'AdminController@simpan_kembalikan');

// Templates
Route::group(array('prefix'=>'/templates/'),function(){
    Route::get('{template}', array( function($template)
    {
        $template = str_replace(".html","",$template);
        View::addExtension('html','php');
        return View::make('templates.'.$template);
    }));
});
