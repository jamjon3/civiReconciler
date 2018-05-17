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
/**
 * Temporarily taking out the auth:api Middleware
 * Route::middleware('auth:api')->
 */
// Removing this as closure is not suitable for optization and breaks that step
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//  return $request->user();
//});
Route::prefix('civicrm')->group(function () {
  Route::prefix('contact')->group(function() {
    Route::prefix('type')->group(function() {
      Route::get('fields','CiviCRM\ContactTypeController@getFields');
      Route::get('','CiviCRM\ContactTypeController@findAll');
      Route::get('{id}','CiviCRM\ContactTypeController@findById');
      Route::get('label/{label}','CiviCRM\ContactTypeController@findByLabel');
      Route::post('create','CiviCRM\ContactTypeController@create');
    });
    Route::get('fields','CiviCRM\ContactController@getFields');
    Route::get('{id}','CiviCRM\ContactController@findById');
    Route::post('find','CiviCRM\ContactController@findByConditions');
    Route::post('create','CiviCRM\ContactController@create');
  });
  Route::prefix('custom')->group(function() {
    Route::prefix('field')->group(function() {
      Route::prefix('{group}')->group(function() {
        Route::get('','CiviCRM\CustomFieldController@findAllByGroup');  
        Route::get('{label}','CiviCRM\CustomFieldController@findByGroupAndLabel');
      });
      Route::get('','CiviCRM\CustomFieldController@findAll');  
      Route::get('fields','CiviCRM\CustomFieldController@getFields');
    });
    Route::prefix('group')->group(function() {
      Route::get('','CiviCRM\CustomGroupController@findAll');
      Route::get('fields','CiviCRM\CustomGroupController@getFields');
      Route::get('{id}','CiviCRM\CustomGroupController@findById');
      Route::get('title/{title}','CiviCRM\CustomGroupController@findByTitle');
    });
  });
});
Route::prefix('vlr')->group(function () {
  Route::prefix('identifier')->group(function() {
    Route::prefix('type')->group(function() {
      Route::get('','VoterListRegistry\IdentifierTypeController@findAll');
    });
  });
});
