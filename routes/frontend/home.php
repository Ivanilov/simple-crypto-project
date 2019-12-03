<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('encryption', 'EncryptController@index')->name('encryption');
    Route::post('encryption/encrypt', 'EncryptController@encrypt')->name('encryption.encrypt');
    Route::get('encryption/decryptIndex', 'EncryptController@decryptIndex')->name('encryption.decryptIndex');
    Route::post('encryption/decrypt', 'EncryptController@decrypt')->name('encryption.decrypt');
    Route::post('encryption/download', 'EncryptController@downloadEncrypt')->name('encryption.download');
    Route::post('registry-attend/dropzone-upload', 'RegistryAttendDropzoneController@dropzoneUpload')->name('registry-attend.dropzone-upload');
    Route::post('registry-attend/dropzone-remove', 'RegistryAttendDropzoneController@dropzoneRemove')->name('registry-attend.dropzone-remove');
    Route::post('registry-attend/dropzone-order', 'RegistryAttendDropzoneController@dropzoneOrder')->name('registry-attend.dropzone-order');
    Route::post('registry-attend/file-exists', 'RegistryAttendDropzoneController@fileExists')->name('registry-attend.file-exists');
});

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {

    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});
