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
//========= Home ==============================
/* Route::get('/', function () {
    return view('home');
})->middleware('auth'); */

Auth::routes();
Route::get('/', 'HomeController@home')->name('home');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/about', function () {
    return view('/about');
})->name('about');
//============== Admin =========================
Route::get('/admins', 'UserController@adminIndex')->name('users.adminIndex')->middleware(['role:super-admin']);
Route::get('/adminHome', 'HomeController@adminHome')->name('adminHome');

//================== Users ======================
Route::group(['middleware' => 'auth'], function () {
    Route::get('/users', 'UserController@index')->name('users.index')->middleware(['role:super-admin']);
    Route::get('/allusers', 'UserController@allUsers')->name('allUsers.index')->middleware(['role:super-admin']);
    Route::get('/users/create', 'UserController@create')->name('users.create')->middleware(['role:super-admin']);
    Route::post('/users', 'UserController@store')->name('users.store')->middleware(['role:super-admin']);
    Route::get('/users/{user}', 'UserController@show')->name('user.show');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('/users/{user}', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::get('/users/{user}/ban', 'UserController@banned')->name('users.banned')->middleware(['role:super-admin']);
});

//================= Professional ===============
Route::group(['middleware' => 'auth'], function () {
    Route::get('/professionals', 'ProfessionalController@index')->name('professionals.index')->middleware(['role:super-admin']);
    Route::get('/professionals/{professional}', 'ProfessionalController@show')->name('professional.show');
    Route::get('/professionals/{professional}/edit', 'ProfessionalController@edit')->name('professionals.edit');
    Route::put('/professionals/{professional}', 'ProfessionalController@update')->name('professionals.update');
    Route::delete('/professionals/{professional}/destroy', 'ProfessionalController@destroy')->name('professionals.destroy');
    Route::get('/professionals/{professional}/changestatus', 'ProfessionalController@changeStatus')->name('professionals.changestatus');
    Route::get('/professionals/{professional}/ban', 'ProfessionalController@banned')->name('profs.banned')->middleware(['role:super-admin']);
});


//================= Categories =================
Route::group(['middleware' => 'is-ban'], function () {
    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::get('/categories/create', 'CategoryController@create')->name('categories.create')->middleware(['role:super-admin']);
    Route::post('/categories', 'CategoryController@store')->name('categories.store')->middleware(['role:super-admin']);
    Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
    Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit')->middleware(['role:super-admin']);
    Route::put('/categories/{category}', 'CategoryController@update')->name('categories.update')->middleware(['role:super-admin']);
    Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy')->middleware(['role:super-admin']);
});


//================ Questions ====================
Route::group(['middleware' => ['auth', 'is-ban']], function () {
    Route::get('/questions', 'QuestionController@index')->name('questions.index');
    Route::get('/questions/create', 'QuestionController@create')->name('questions.create');
    Route::get('/questions/create/{prof}', 'QuestionController@create')->name('questions.createprof');
    Route::post('/questions', 'QuestionController@store')->name('questions.store');
    Route::delete('/questions/{question}/destroy', 'QuestionController@destroy')->name('questions.destroy');
    Route::get('/questions/{question}/edit', 'QuestionController@edit')->name('questions.edit');
    Route::post('/questions/{question}/update', 'QuestionController@update')->name('questions.update');
    Route::get('/questions/{question}', 'QuestionController@show')->name('questions.show');
    Route::get('/zoom/{zoom}', 'QuestionController@zoom');
});
//Route::get('rate/{id}',function () {
//return view('rate');
//});
Route::get('rate/{id}', 'RateController@createRate')->name('rate.create');
Route::post('rate', 'RateController@postRate')->name('rate.post');
//======================Answers===================
Route::group(['middleware' => ['auth', 'is-ban']], function (){
    Route::get('/answers/create/{question}', 'AnswerController@create')->name('answers.create');
    Route::post('/answers', 'AnswerController@store')->name('answers.store');
    Route::get('/answers/{answer}', 'AnswerController@show')->name('answers.show');


});