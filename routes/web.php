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
Route::get('/crgroup',function(){
  $user=Auth::user();
  $add = User::Join('user_user', 'users.id', '=', 'user_user.send_id')->select('*','users.id')
              ->where('user_user.recive_id', Auth::id())->where('user_user.check',0)->get();
  return view('home.crgroup',compact('user','add'));
})->middleware('auth');
Route::get('profile/{id}','home@profile')->middleware('auth');
Route::get('/creategro','group@addgroup')->middleware('auth');
Route::post('/creategro','group@addgroup')->middleware('auth');
Route::post('addpost','post@store')->middleware('auth');
Route::get('addpost','post@store')->middleware('auth');
Route::post('/addcoment','comment@addcoment')->middleware('auth');
Route::get('/addcoment','comment@addcoment')->middleware('auth');
Route::post('/addlike','like@addlike')->middleware('auth');
Route::get('/addlike','like@addlike')->middleware('auth');
Route::post('/deleteComment','comment@deleteComment')->middleware('auth');
Route::get('/deleteComment','comment@deleteComment')->middleware('auth');
Route::post('/updataComment','comment@updataComment')->middleware('auth');
Route::get('/updataComment','comment@updataComment')->middleware('auth');
Route::get('/gro/{id}','group@group')->middleware('auth');
Route::post('/follow','group@followpage')->middleware('auth');
Route::get('managegro/{id}','group@managegro')->middleware('auth');
Route::get('mygroup','group@mygroup')->middleware('auth');
Route::get('memmbers/{id}','group@member')->middleware('auth');
Route::get('allgro','group@allgroup')->middleware('auth');
Route::get('allu/{name}','home@alluser')->middleware('auth');
Route::post('addfreind','freind@addfreind')->middleware('auth');
Route::post('upfreind','freind@updatafreind')->middleware('auth');
Route::post('defreind','freind@deletfreind')->middleware('auth');
Route::post('removefreind','freind@deletfreind')->middleware('auth');
Route::get('chat/{id}','socketController@show')->middleware('auth');
Route::post('sendmessage', 'socketController@sendMessage');
