<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Products'], function() {

    Route::group(['middleware' => ['admin','auth']], function () {
        Route::post('/products',                            'ProductsController@store');
        Route::delete('/products/{id}',                     'ProductsController@destroy');

        Route::put('/products/{id}/cover-image',            'CoverImageController@update');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::post('/products/{id}/reviews',               'ReviewsController@store');

        Route::post('/liked-reviews',                       'LikedReviewsController@store');
        Route::delete('/liked-reviews/{id}',                'LikedReviewsController@destroy');
    });

    Route::post('/products/{id}/orders',                    'OrdersController@store');

    Route::get('/products/{id}/reviews',                    'ReviewsController@index');

    Route::post('/desired-products',                        'DesiredProductsController@store');
});

