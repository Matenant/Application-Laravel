<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('choses', 'App\Http\Controllers\ChosesController');

Route::resource('categories', 'App\Http\Controllers\CategoriesController');

Route::resource('tags', 'App\Http\Controllers\TagsController');

Route::resource('lieux', 'App\Http\Controllers\LieuxController', [
    'parameters' => [
        'lieux' => 'lieu'
    ]
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
