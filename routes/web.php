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

Route::get('/', 'MainController@main')->name('LandingPage');
Route::get('/search', 'SearchController@Search');

Auth::routes();
Route::redirect('/home', '/account');

Route::get('/account', 'AccountController@index')->name('account');
Route::get('login', 'Auth\LoginController@discordLogin')->name('login');
Route::get('login/discord', 'Auth\LoginController@discordLogin')->name('DiscordLogin');
Route::get('login/discord/callback', 'Auth\LoginController@handlediscordCallback');

Route::prefix('admin', ['middleware' => 'CheckAdmin'])->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.main');
    Route::view('upload', 'admin/admin_upload')->middleware('CheckAdmin');
    Route::post('/upload', 'AdminController@uploadQuote');
    Route::get('edit/{id}', 'AdminController@showEditPage');
    Route::post('edit/{id}', 'AdminController@submitQuoteUpdate');

    //Delete Quotes
    Route::get('delete/{id}', 'AdminController@confirmDeletion');
    Route::post('delete/{id}', 'AdminController@deleteQuote');


});
