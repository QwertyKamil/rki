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
