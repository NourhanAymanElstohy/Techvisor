<?php

use Illuminate\Support\Facades\Auth;
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
    return view('home');
})->middleware('auth');



Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['role:super-admin'])->group(function () {
    Route::resource('/users', 'UsersController');
    Route::resource('/professional', 'ProfessionalController');
    Route::resource('/user', 'UserController');
});


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('/categories', 'CategoryController@store')->name('categories.store');
    Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
    Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::put('/categories/{category}', 'CategoryController@update')->name('categories.update');
    Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');
    Route::get('/questions','QuestionController@index')->name('questions.index');
    Route::get('/questions/create','QuestionController@create')->name('questions.create');
    Route::post('/questions','QuestionController@store')->name('questions.store');
    Route::delete('/questions/{question}/destroy','QuestionController@destroy')->name('questions.destroy');
    Route::get('/questions/{question}/edit','QuestionController@edit')->name('questions.edit');
    Route::post('/questions/{question}/update','QuestionController@update')->name('questions.update');
    Route::get('/questions/{question}','QuestionController@show')->name('questions.show');
    Route::get('/users/edit','UserController@edit')->name('users.edit');
    Route::post('/users/update','UserController@update')->name('users.update');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::get('/style', function () {
    return view('style.home');
});
Route::get('/style/profile', function () {
    return view('style.profile');
});
Route::get('/style/about', function () {
    return view('style.about');
});
Route::get('/style/questions', function () {
    return view('style.questions');
});