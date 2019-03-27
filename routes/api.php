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


Route::post('register','Api\UserController@create');

Route::get('question/{question}/answers','Api\ContestController@getQuestionAnswers');

Route::post('contest/questions/{token}','Api\ContestController@get');
Route::post('contest/questions/{token}/createAnswer','Api\ContestController@createAnswer');
Route::post('contest/questions/{token}/getAnswer','Api\ContestController@getAnswer');
