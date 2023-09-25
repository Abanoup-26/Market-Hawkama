<?php

use \App\Http\Controllers\Frontend\HomeController;

Route::group([ 'as' => 'frontend.', 'namespace'=>'Frontend' ], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('project/{id}', 'HomeController@show')->name('project.show');
    Route::get('cart', 'CartController@index')->name('cart.index');
    Route::post('add-to-cart/{id}', 'CartController@addToCart')->name('cart.add');
    Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('cart.add');
    Route::get('remove/{id}','CartController@destroy')->name('cart.destroy');
});
?>