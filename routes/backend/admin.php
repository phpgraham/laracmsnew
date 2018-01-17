<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

/*
* Page Management
 */
Route::view('pages/create', 'backend.pages.create')->name('pages.create');
Route::get('pages', 'PagesController@index')->name('pages.index');
Route::get('pages/{page}', 'PagesController@show')->name('pages.show');

Route::get('pages/edit/{page}', 'PagesController@edit')->name('pages.edit');
Route::get('pages/delete/{page}', 'PagesController@destroy')->name('pages.delete');
Route::get('pages/status/{page}', 'PagesController@status')->name('pages.status');
Route::post('pages/store', 'PagesController@store')->name('pages.store');
Route::post('pages/update/{page}', 'PagesController@update')->name('pages.update');
/*
* Menu Management
*/
Route::group(['namespace' => 'Menu'], function() {
    Route::get('menu/{parent_id}', 'MenuController@index')->name('menu');
    Route::get('menu/create/{parent_id}', 'MenuController@create')->name('menu.create');
    Route::get('menu/show/{menu}', 'MenuController@show')->name('menu.show');
    Route::get('menu/edit/{parent_id},{position},{direction}', 'MenuController@edit')->name('menu.edit');
    Route::get('menu/delete/{menu}/{parent_id}', 'MenuController@destroy')->name('menu.delete');
    Route::get('menu/status/{menu}', 'MenuController@status')->name('menu.status');
    Route::post('menu/update/{menu}/{parent_id}', 'MenuController@update')->name('menu.update');
    Route::post('menu/store', 'MenuController@store')->name('menu.store');
});
