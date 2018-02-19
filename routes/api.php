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

/*
 *  Album endpoints
 */

Route::get('albums', 'AlbumController@index')->name('index-albums');
Route::get('albums/{album}', 'AlbumController@show')->name('show-album');
Route::post('albums', 'AlbumController@store')->name('store-album');
Route::put('albums/{album}', 'AlbumController@update')->name('update-album');
Route::delete('albums/{album}', 'AlbumController@delete')->name('delete-album');

Route::get('album/{album}/photos', 'PhotoController@index')->name('index-photos');
// Route::get('/', 'PhotoController@index')->name('index-photos');
Route::get('album/{photo}', 'PhotoController@show')->name('show-photo');
Route::post('album/{album}/photo', 'PhotoController@store')->name('store-photo');
Route::put('album/update/{photo}', 'PhotoController@update')->name('update-photo');
Route::delete('album/{photo}', 'PhotoController@delete')->name('delete-photo');
Route::delete('album/wipe', 'PhotoController@deleteAll')->name('delete-photos');
