<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::group(['prefix' => 'clubdata'], function () {
        // teams
        Route::group(['prefix' => 'teams'], function () {
            Route::get('/', [Noaber\LunarApi\Controllers\Api\Products\ProductListController::class, 'listProducts'])->name('lunarphp.products.list.api');
        });
    });
});
