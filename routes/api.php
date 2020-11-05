<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group( function () {

    Route::post('activities', 'App\Http\Controllers\ActivitiesController@store');
    Route::post('activities/{activity_id}/items', 'App\Http\Controllers\ActivitiesController@storeLists');
    
    Route::get('activities', 'App\Http\Controllers\ActivitiesController@show');
    Route::get('activities/{activity_id}', 'App\Http\Controllers\ActivitiesController@getActivityById');
    
    Route::patch('activities/{activity_id}', 'App\Http\Controllers\ActivitiesController@activityUpdate');
    Route::patch('activities/{activity_id}/items/{item_id}', 'App\Http\Controllers\ActivitiesController@itemUpdate');
    
    Route::delete('activities/{activity_id}', 'App\Http\Controllers\ActivitiesController@activityDestroy');
    Route::delete('activities/{activity_id}/items/{item_id}', 'App\Http\Controllers\ActivitiesController@activityItemDestroy');
    
});
    
