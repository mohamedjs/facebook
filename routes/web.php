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

Route::get('/', 'home@home');
Route::post('/', 'home@home');
Route::get('/crgroup',function(){
  return view('home.crgroup');
});
Route::get('/creategro','home@addgroup');
Route::post('/creategro','home@addgroup');
Route::post('addpost','home@store');
Route::get('addpost','home@store');
Route::post('/addcoment','home@addcoment');
Route::get('/addcoment','home@addcoment');
Route::post('/addlike','home@addlike');
Route::get('/addlike','home@addlike');
Route::post('/deleteComment','home@deleteComment');
Route::get('/deleteComment','home@deleteComment');
Route::post('/updataComment','home@updataComment');
Route::get('/updataComment','home@updataComment');
Route::get('/gro/{id}','home@group');
Route::post('/follow','home@followpage');
Route::get('profile/{id}','home@profile');
Route::get('managegro/{id}','home@managegro');
