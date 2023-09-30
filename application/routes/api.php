<?php

use App\Http\Controllers\API\V1\ConfigurationController__1;
use App\Http\Controllers\API\V1\ServicesAmoCrmController__1;
use App\Http\Controllers\API\V1\ServicesYandexFormsController__1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('services')->group(function () {
        Route::post('/test', function (Request $request) {
            return 'hallo';
        });

        Route::prefix('amocrm')->group(function () {
            Route::prefix('auth')->group(function () {
                Route::get('signin', [ServicesAmoCrmController__1::class, 'signin']);
                Route::get('signout', [ServicesAmoCrmController__1::class, 'signout']);
            });
        });

        Route::prefix('yandex')->group(function () {
            Route::prefix('forms')->group(function () {
                Route::post('submit', [ServicesYandexFormsController__1::class, 'submit']);
            });
        });
    });

    Route::prefix('admin')->group(function () { //FIXME es muss in der Zukunft verteidigt werden
        Route::prefix('configurations')->group(function () {
            Route::post('/', [ConfigurationController__1::class, 'create']);
            Route::get('/', [ConfigurationController__1::class, 'read']);
            Route::put('/', [ConfigurationController__1::class, 'update']);
            Route::delete('/', [ConfigurationController__1::class, 'delete']);
        });
    });
});
