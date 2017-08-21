<?php
use App\User;
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

Route::get('/', 'home@home')->middleware('auth');
Route::post('/', 'home@home');
Route::get('/crgroup',function(){
  $user=User::find(1);
  return view('home.crgroup',compact('user'));
})->middleware('auth');
Route::get('/creategro','home@addgroup')->middleware('auth');
Route::post('/creategro','home@addgroup')->middleware('auth');
Route::post('addpost','home@store')->middleware('auth');
Route::get('addpost','home@store')->middleware('auth');
Route::post('/addcoment','home@addcoment')->middleware('auth');
Route::get('/addcoment','home@addcoment')->middleware('auth');
Route::post('/addlike','home@addlike')->middleware('auth');
Route::get('/addlike','home@addlike')->middleware('auth');
Route::post('/deleteComment','home@deleteComment')->middleware('auth');
Route::get('/deleteComment','home@deleteComment')->middleware('auth');
Route::post('/updataComment','home@updataComment')->middleware('auth');
Route::get('/updataComment','home@updataComment')->middleware('auth');
Route::get('/gro/{id}','home@group')->middleware('auth');
Route::post('/follow','home@followpage')->middleware('auth');
Route::get('profile/{id}','home@profile')->middleware('auth');
Route::get('managegro/{id}','home@managegro')->middleware('auth');
Route::get('memmbers/{id}','home@member')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
