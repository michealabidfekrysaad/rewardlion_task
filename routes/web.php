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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//first route by me


Route::group(['middleware'=>['auth']],function (){
Route::get('/','ReportController@index');
Route::post('/uploadRecipe','ReportController@store');
Route::get('/allrecipes','ReportController@showAll')->name('Reports.index');
Route::get('/report/show/{id}','ReportController@show');
Route::get('/report/edit/{id}','ReportController@edit');
Route::put('/report/update/{id}','ReportController@update');
Route::delete('/report/delete/{id}','ReportController@destroy');
});
Route::fallback(function (){
    return redirect("/");
 });