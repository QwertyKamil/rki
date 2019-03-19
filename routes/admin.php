<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

Route::get('/konkursy', 'AdminAuth\ContestController@index')->name('admin-contests');
Route::get('/konkursy/dodaj', 'AdminAuth\ContestController@create')->name('admin-contests-add');
Route::post('/konkursy/dodaj', 'AdminAuth\ContestController@store')->name('admin-contests-store');
Route::get('/konkursy/edytuj/{contest}', 'AdminAuth\ContestController@edit')->name('admin-contests-edit');
Route::post('/konkursy/edytuj/{contest}', 'AdminAuth\ContestController@update')->name('admin-contests-update');
Route::delete('/konkursy/usuń/{contest}', 'AdminAuth\ContestController@destroy')->name('admin-contests-delete');

Route::get('/konkurs/{contest}/czesci', 'AdminAuth\ContestPartsController@index')->name('admin-parts');
Route::get('/konkurs/{contest}/czesci/dodaj', 'AdminAuth\ContestPartsController@create')->name('admin-parts-add');
Route::post('/konkurs/{contest}/czesci/dodaj', 'AdminAuth\ContestPartsController@store')->name('admin-parts-store');
Route::get('/konkurs/{contest}/czesci/edytuj/{part}', 'AdminAuth\ContestPartsController@edit')->name('admin-parts-edit');
Route::post('/konkurs/{contest}/czesci/edytuj/{part}', 'AdminAuth\ContestPartsController@update')->name('admin-parts-update');
Route::delete('/konkurs/{contest}/czesci/usuń/{part}', 'AdminAuth\ContestPartsController@destroy')->name('admin-parts-delete');

Route::get('/konkurs/{contest}/czesc/{part}/pytania', 'AdminAuth\QuestionsController@index')->name('admin-questions');
Route::get('/konkurs/{contest}/czesc/{part}/pytania/dodaj', 'AdminAuth\QuestionsController@create')->name('admin-questions-add');
Route::post('/konkurs/{contest}/czesc/{part}/pytania/dodaj', 'AdminAuth\QuestionsController@store')->name('admin-questions-store');
Route::get('/konkurs/{contest}/czesc/{part}/pytania/edytuj/{question}', 'AdminAuth\QuestionsController@edit')->name('admin-questions-edit');
Route::post('/konkurs/{contest}/czesc/{part}/pytania/edytuj/{question}', 'AdminAuth\QuestionsController@update')->name('admin-questions-update');
Route::delete('/konkurs/{contest}/czesc/{part}/pytania/usuń/{question}', 'AdminAuth\QuestionsController@destroy')->name('admin-questions-delete');
