<?php

Route::group(['prefix' => 'supporter', 'as' => 'supporter.', 'namespace' => 'Supporter', 'middleware' => ['auth' ,'supporter']], function () {

});

?>