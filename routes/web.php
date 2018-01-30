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
Auth::routes();
Route::get('/', 'home@home')->middleware('auth');
Route::post('/', 'home@home');
Route::get('/crgroup','groups@create')->middleware('auth');
Route::get('allfreind','home@myfreind')->middleware('auth');
Route::get('about','home@about')->middleware('auth');
Route::get('setting','setting@show')->middleware('auth');
Route::get('profile/{id}','home@profile')->middleware('auth');
Route::get('/creategro','groups@addgroup')->middleware('auth');
Route::post('/creategro','groups@addgroup')->middleware('auth');
Route::post('addpost','post@store')->middleware('auth');
Route::get('addpost','post@store')->middleware('auth');
Route::post('/addcoment','comment@addcoment')->middleware('auth');
Route::get('/addcoment','comment@addcoment')->middleware('auth');
Route::post('/addlike','like@addlike')->middleware('auth');
Route::post('/unlike','like@unlike')->middleware('auth');
Route::get('/addlike','like@addlike')->middleware('auth');
Route::post('/deleteComment','comment@deleteComment')->middleware('auth');
Route::get('/deleteComment','comment@deleteComment')->middleware('auth');
Route::post('/updataComment','comment@updataComment')->middleware('auth');
Route::get('/updataComment','comment@updataComment')->middleware('auth');
Route::get('/gro/{id}','groups@group')->middleware('auth');
Route::post('/follow','groups@followpage')->middleware('auth');
Route::get('managegro/{id}','groups@managegro')->middleware('auth');
Route::get('mygroup','groups@mygroup')->middleware('auth');
Route::get('memmbers/{id}','groups@member')->middleware('auth');
Route::get('allgro','groups@allgroup')->middleware('auth');
Route::get('allu/{name}','home@alluser')->middleware('auth');
Route::post('addfreind','freind@addfreind')->middleware('auth');
Route::post('upfreind','freind@updatafreind')->middleware('auth');
Route::post('defreind','freind@deletfreind')->middleware('auth');
Route::post('removefreind','freind@deletfreind')->middleware('auth');
Route::get('chat/{id}','socketController@show')->middleware('auth');
Route::post('sendmessage', 'socketController@sendMessage');
Route::post('editprofile','setting@edit')->middleware('auth');
Route::post('changeprofileimage','setting@changeprofileimage');
Route::post('changecoverimage','setting@changecoverimage');
Route::post('insertmessage','chat@insert')->middleware('auth');
