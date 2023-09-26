<?php

Route::group(['prefix' => 'supporter', 'as' => 'supporter.', 'namespace' => 'Supporter', 'middleware'=>['auth','supporter']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('payment', 'PaymentController@index')->name('payment');
    Route::post('payment/store', 'PaymentController@store')->name('payments.store');
});

?>