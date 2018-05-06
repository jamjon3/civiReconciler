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
Route::middleware('auth:api')->prefix('civicrm')->group(function () {
  Route::prefix('contact')->group(function() {
    Route::get('{id}','CiviCRM\ContactController@findById');
    Route::get('fields','CiviCRM\ContactController@getCreateFields');
    Route::post('find','CiviCRM\ContactController@findByConditions');
    Route::post('create','CiviCRM\ContactController@create');
    Route::prefix('type')->group(function() {
      Route::get('','CiviCRM\ContactTypeController@findAll');
      Route::get('{id}','CiviCRM\ContactTypeController@findById');
      Route::get('name/{name}','CiviCRM\ContactTypeController@findByName');
      Route::get('fields','CiviCRM\ContactTypeController@getCreateTypeFields');
      Route::post('create','CiviCRM\ContactTypeController@create');
    });
  });
});
