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

Auth::routes();

/* user management start */
Route::get('/user-management', 'AdminController@index')->name('user-management')->middleware('auth');
Route::get('/editUser/{id}', 'AdminController@editUser')->name('editUser')->middleware('auth');
Route::post('/updateUser/{id}', 'AdminController@updateUser')->name('updateUser')->middleware('auth');
Route::get('/viewUser/{id}', 'AdminController@viewUser')->name('viewUser')->middleware('auth');
Route::get('/addUserform', 'AdminController@addUser')->name('addUser')->middleware('auth');
Route::post('/insertUser', 'AdminController@insertUser')->name('insertUser')->middleware('auth');
Route::get('/deleteUser/{id}', 'AdminController@deleteUser')->name('deleteUser')->middleware('auth');
/* user management end */
/* about start */
Route::get('/system-requirement', 'AdminController@systemRequirement')->name('system-requirement')->middleware('auth');
Route::get('/software-management', 'AdminController@softwareManagement')->name('software-management')->middleware('auth');
Route::get('/testCurl', 'AdminController@testCurl')->name('testCurl')->middleware('auth');
Route::get('/testAllowUrlFopen', 'AdminController@testAllowUrlFopen')->name('testAllowUrlFopen')->middleware('auth');
Route::post('/saveSoftwareInfo', 'AdminController@saveSoftwareInfo')->name('saveSoftwareInfo')->middleware('auth');
/* about end */

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/public', 'HomeController@publics')->name('public');

Route::get('/about', 'AdminController@about')->name('about');
Route::get('/help', 'AdminController@help')->name('help');

Route::get('/radioStream', 'RadioController@radioStreamPost')->middleware('auth');
Route::get('/addedStream/{id}', 'RadioController@addedStreamView')->name('addedStream')->middleware('auth');
Route::get('/radioList', 'RadioController@radioStreamList')->name('radioList')->middleware('auth');
Route::get('/editRadio/{id}', 'RadioController@editRadio')->middleware('auth');
Route::post('/updateRadio/{id}', 'RadioController@updateRadio')->middleware('auth');
/*Route::post('/updateRadio/{id}', 'RadioController@updateRadio')->middleware('auth');*/
Route::get('/deleteRadio/{id}', 'RadioController@deleteRadio')->middleware('auth');
Route::get('/playRadio/{id}', 'RadioController@playRadio')->middleware('auth');
//Route::get('/radioStream', ['as' => 'radioStream', 'uses' => 'RadioController@radioStreamPost']);//{{ route('radioStream') }}
/*Route::get('/test',function(){
    $result = File::makeDirectory(base_path().'storage/app/radiostreamfiles/radio');
    dd($result); // return true if folder created
});*/
