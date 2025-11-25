<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// @todo: For each route, add comments to explain what it does and how it works

Route::get('/', function () {  return view('index'); });

Route::get('home', function () {return view('index'); });

Route::get('login', function () { return view('login'); });

Route::get('account', function () { return view('account'); });

Route::get('basket', function () { return view('basket'); });

Route::get('checkout', function () { return view('checkout'); });

Route::get('product', function () { return view('product'); });

Route::get('products', function () { return view('products'); });

Route::get('faq', function () { return view('faq'); });

Route::get('contactdetail', function () { return view('contactdetail'); });

Route::get('order', function () { return view('order'); });

Route::get('aboutus', function () { return view('aboutus'); });


// irrelavent;

// Route::get('studentlisting', 'App\Http\Controllers\StudentController@list')->name('list_student');
// Route::get('studentprofile/{}', 'App\Http\Controllers\StudentController@show');
// Route::get('modulelisting', 'App\Http\Controllers\ModuleController@list')->name('list_module');
// Route::get('moduledetails/{id}', 'App\Http\Controllers\ModuleController@show');


// Route::get('/', function () {
//     return view('home');
// });


// Route::get('home', function () {
//     return view('home');
// });




