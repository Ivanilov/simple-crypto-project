<?php
use Vsch\TranslationManager\Translator;

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::group([
    'prefix'     => 'translations',
    'as'         => 'translations'
], function () {
    Route::group([
        'middleware' => 'role:administrator',
    ], function () {
        Translator::routes();
    });
});
