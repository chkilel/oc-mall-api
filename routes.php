<?php

Route::group([
        'middleware' => ['web'],
        'prefix' => 'api/mall',
        'namespace' => 'Voilaah\MallApi\Http\Api'
    ], function () {

    Route::resource('docs', 'Documentation');
    Route::resource('ping', 'Ping');

    // Route::group(['prefix' => 'me', 'middleware' => '\Tymon\JWTAuth\Middleware\GetUserFromToken']  , function() {
    Route::group([
        'middleware' => ['jwt.auth'],
        'prefix' => 'auth/me'
    ], function() {

        Route::get(
            'profile',
            'CustomerController'
        )->name('customer.profile');

        Route::resource('addresses', 'Addresses')
            ->only([
                'index',
                'show'
            ])
            ->names([
                'index' => 'customer.addresses.index',
                'show' => 'customer.addresses.show'
            ]);
        Route::resource('orders', 'Orders')
            ->only([
                'index',
                'show'
            ])
            ->names([
                'index' => 'customer.orders.index',
                'show' => 'customer.orders.show'
            ]);

    });

    Route::pattern('categorySlug', '.*');
    Route::pattern('recordId', '.*');

    // Simple Resources related
    Route::get('settings', 'Settings@show')->name('settings.show');
    Route::resource('brands', 'Brands')
        ->only([
            'index',
            'show'
        ])
        ->names([
            'index' => 'brands.index',
            'show' => 'brands.show'
        ]);
    Route::resource('payments', 'Payments')
        ->only([
            'index',
            'show'
        ])
        ->names([
            'index' => 'payments.index',
            'show' => 'payments.show'
        ]);
    Route::resource('shippings', 'Shippings')
        ->only([
            'index',
            'show'
        ])
        ->names([
            'index' => 'shippings.index',
            'show' => 'shippings.show'
        ]);

    /**
     * Products
     */

    // Route::get('products/{id}', 'Products@show')
    //     ->parameters([
    //         'id' => 'recordId'
    //     ])
    //     ->where('recordId', '[0-9]+')
    //     ->name('products.show');

    Route::get('products/category/{categorySlug}', 'Products@index')
        ->name('products.bycategory');

    Route::resource('products', 'Products')
        ->parameters([
            'products' => 'recordId'
        ])
        ->only([
            "index",
            "show",
        ])
        ->names([
            'index' => 'products.index',
            'show' => 'products.show'
        ]);

    /**
     * Variants
     */
    Route::resource('variants', 'Variants')
        ->parameters([
            'variants' => 'recordId'
        ])
        ->only([
            "index",
            "show",
        ])
        ->names([
            'index' => 'variants.index',
            'show' => 'variants.show'
        ]);


    /**
     * Categories
     */

    Route::get('categories/{recordId}/filters', function($recordId) {
        return redirect()->route('categories.show', [ 'recordId' => $recordId, 'with' => 'property_groups,properties_values' ]);
    })->name('categories.show.filters');

    Route::get('categories/{categorySlug}/products', 'Products@index')
        ->name('categories.show.products');

    Route::resource('categories', 'Categories')
        ->parameters([
            'categories' => 'recordId'
        ])
        ->only([
            "index",
            "show",
        ])
        ->names([
            'index' => 'categories.index',
            'show' => 'categories.show'
        ]);


    /**
     * Cart related
     */

    Route::resource('cart', 'ShoppingCartController')->only([
        "index",
        "store",
        "update",
        "show",
        "destroy",
    ]);

});
