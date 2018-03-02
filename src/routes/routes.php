<?php

Route::group(['prefix' => 'rujukan-pasien-miskin'], function() {
    Route::get('demo', 'Bantenprov\RujukanPasienMiskin\Http\Controllers\RujukanPasienMiskinController@demo');
});
