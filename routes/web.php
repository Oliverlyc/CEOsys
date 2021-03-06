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
Route::prefix('ceo')->group(function(){
    Route::get('/index','MemberController@index')->name('ceoIndex');
    Route::get('/enter','MemberController@showEnterForm')->name('showEnterForm');
    Route::post('/enter','MemberController@store');
    Route::get('/memberList',"MemberController@showMemberList");
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/getList','MemberController@getList')->name('getList')->middleware('auth');

});
Route::prefix('tyds2018')->group(function(){
    Route::get('/index', 'TYDSController@index')->name('tydsIndex');
    Route::get('/enter', 'TYDSController@showTYDSForm')->name('showTYDSForm');
    Route::post('/enter', 'TYDSController@store');
    Route::get('/memberList',"TYDSController@showMemberList");
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/getList','TYDSController@getList')->name('getList')->middleware('auth');
    Route::get('/team', 'TYDSController@showTeamForm')->name('showTeamForm');
    Route::post('/team', 'TYDSController@storeTeamInfo');
    Route::get('/subject', 'TYDSController@showSubjectForm')->name('showSubjectForm');
    Route::post('/subject', 'TYDSController@storeSubjectInfo');
    Route::get('/info','TYDSInfoController@index')->name('infoIndex');
    Route::get('/info/changeSubject', 'TYDSInfoController@showChangeSubjectForm')->name('showChangeSubjectForm');
    Route::post('/info/changeSubject', 'TYDSInfoController@changeSubject');
    Route::get('/info/deleteTeam', 'TYDSInfoController@showDeleteTeamForm')->name('showDeleteTeamForm');
    Route::post('/info/deleteTeam', 'TYDSInfoController@deleteTeam');
    Route::get('/process', 'TYDSController@showProcessForm')->name('showProcessForm');
    Route::Post('/process', 'TYDSController@storeProcessForm');
    Route::get('/finalTest', 'TYDSInfoController@showFinalTestForm')->name('showFinalTestForm');
    Route::post('finalTest', 'TYDSInfoController@storeFinalTestForm');
});
