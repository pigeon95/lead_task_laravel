<?php
Route::model('product', 'Products\Models\Product');

Route::group([
    'middleware' => ['web'],
    'namespace' => 'Products\Controllers'
], function () {
    Route::group(['prefix' => '/'], function () {
        Route::get('/', 'ProductsController@listAction')
            ->name('products.list');

        Route::get('/create', 'ProductsController@createAction')
            ->name('products.create');

        Route::post('/create', 'ProductsController@storeAction')
            ->name('products.store');

        Route::get('/edit/{product}', 'ProductsController@editAction')
            ->name('products.edit');

        Route::put('/edit/{product}', 'ProductsController@updateAction')
            ->name('products.update');

        Route::delete('/delete/{product}', 'ProductsController@deleteAction')
            ->name('products.delete');
    });
});