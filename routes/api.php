<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('FavoriteMovies', 'FavoriteMovieController@index');
    Route::get('FavoriteMovies/{FavoriteMovie}', 'FavoriteMovieController@show');
    Route::post('FavoriteMovies', 'FavoriteMovieController@store');
    Route::put('FavoriteMovies/{FavoriteMovie}', 'FavoriteMovieController@update');
    Route::delete('FavoriteMovies/{FavoriteMovie}', 'FavoriteMovieController@delete');
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
