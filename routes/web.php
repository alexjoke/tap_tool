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

    Route::get('/', 'HomeController@index')->name('home');
    
    Route::group(['prefix' => 'bad_domain'], function () {
        
        Route::get('/', 'BadDomainController@index')->name('bad');
        Route::post('/', 'BadDomainController@store')->name('bad.create');
        Route::get('/datatable', 'BadDomainController@getDataTable')->name('bad.datatable');
    
    });

    Route::group(['prefix' => 'click'], function () {

        Route::get('/', 'ClickController@performRedirect')->name('redirect');
        Route::get('/datatable', 'ClickController@getDataTable')->name('click.datatable');

    });

    Route::get('/success/{id}', 'ClickController@success')->name('redirect.success');
    Route::get('/error/{id}', 'ClickController@error')->name('redirect.error');

    