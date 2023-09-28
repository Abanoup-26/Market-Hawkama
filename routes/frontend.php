<?php

use \App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Auth\SupporterLoginController;
use Illuminate\Support\Facades\Route;

// supplier login 
Route::get('/supporterlogin', [SupporterLoginController::class,'showLoginForm'])->name('supporter.login');
Route::post('/supporterlogin', [SupporterLoginController::class,'login']);
Route::post('/logout', [SupporterLoginController::class,'logout'])->name('logout');

Route::group([ 'as' => 'frontend.', 'namespace'=>'Frontend' ], function () { 

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('project/{id}', 'HomeController@show')->name('project.show');

    // Payment
    Route::post('payment', 'PaymentController@payment')->name('payment');

    // Cart
    Route::get('cart', 'CartController@index')->name('cart.index');
    Route::post('add-to-cart/{id}', 'CartController@addToCart')->name('cart.add');
    Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('cart.add');
    Route::get('remove/{id}','CartController@destroy')->name('cart.destroy');
});
?>