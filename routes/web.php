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


Auth::routes();
Route::get('/index','MemberController@index')->name('index');
Route::get('/enter','MemberController@showEnterForm')->name('showEnterForm');
Route::post('/enter','MemberController@store');
Route::get('/memberList',"MemberController@showMemberList");
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getList','MemberController@getList')->name('getList')->middleware('auth');