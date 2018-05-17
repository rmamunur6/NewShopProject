<?php
/* Mastering Routes starts*/

Route::get('/',[
    'uses'=>'NewShopController@index',
    'as'  =>'/'
]);

Route::get('/category/product/{id}',[
    'uses'=>'NewShopController@categoryProduct',
    'as'  =>'category-product'
]);

Route::get('/product-details/{id}/{name}',[
    'uses'=>'NewShopController@productsDetails',
    'as'  =>'product-details'
]);

Route::get('/mail/us',[
    'uses'=>'NewShopController@mailUs',
    'as'  =>'mail-us'
]);
/* Mastering Routes Ends */

Auth::routes(); // special routing

Route::get('/dashboard',[
    'uses'=>'HomeController@index',
    'as'  =>'dashboard'
]);

/*category */

Route::get('/category/add',[
    'uses'=>'CategoryController@index',
    'as'  =>'add-category'
]);

Route::get('/category/manage',[
    'uses'=>'CategoryController@manageCategory',
    'as'  =>'manage-category'
]);

Route::post('/category/save',[
    'uses'=>'CategoryController@saveCategory',
    'as'  =>'save-category'
]);
Route::get('/category/unpublished/{id}',[
    'uses'=>'CategoryController@unpublishedCategory',
    'as'  =>'unpublished-category'
]);
Route::get('/category/published/{id}',[
    'uses'=>'CategoryController@publishedCategory',
    'as'  =>'published-category'
]);
Route::get('/category/edit/{id}',[
    'uses'=>'CategoryController@editCategory',
    'as'  =>'edit-category'
]);

Route::post('/category/update',[
    'uses'=>'CategoryController@updateCategory',
    'as'  =>'update-category'
]);

Route::get('/category/delete/{id}',[
    'uses'=>'CategoryController@deleteCategory',
    'as'  =>'delete-category'
]);

/* brands */
Route::get('/brand/add',[
    'uses'=>'BrandController@index',
    'as'  =>'add-brand'
]);

Route::get('/brand/manage',[
    'uses'=>'BrandController@manageBrand',
    'as'  =>'manage-brand'
]);

Route::post('/brand/save',[
    'uses'=>'BrandController@saveBrand',
    'as'  =>'save-brand'
]);
Route::get('/brand/unpublished/{id}',[
    'uses'=>'BrandController@unpublishedBrand',
    'as'  =>'unpublished-brand'
]);
Route::get('/brand/published/{id}',[
    'uses'=>'BrandController@publishedBrand',
    'as'  =>'published-brand'
]);
Route::get('/brand/edit/{id}',[
    'uses'=>'BrandController@editBrand',
    'as'  =>'edit-brand'
]);

Route::post('/brand/update',[
    'uses'=>'BrandController@updateBrand',
    'as'  =>'update-brand'
]);

Route::get('/brand/delete/{id}',[
    'uses'=>'BrandController@deleteBrand',
    'as'  =>'delete-brand'
]);

/* Products */
Route::get('/product/add',[
    'uses'=>'ProductController@index',
    'as'  =>'add-product'
]);

Route::post('/product/save',[
    'uses'=>'ProductController@saveProduct',
    'as'  =>'save-product'
]);
Route::get('/product/manage',[
    'uses'=>'ProductController@manageProduct',
    'as'  =>'manage-product'
]);

Route::get('/product/edit/{id}',[
    'uses'=>'ProductController@editProduct',
    'as'  =>'edit-product'
]);






Route::post('/product/update',[
    'uses'=>'ProductController@updateProduct',
    'as'  =>'update-product'
]);


Route::group(['middleware' => 'newShopMiddleware'],function (){
    Route::get('/order/manager-order',[
        'uses'=>'OrderController@manageOrderInfo',
        'as'  =>'manage-order'
    ]);

    Route::get('/order/view/order-details/{id}',[
        'uses'=>'OrderController@viewOrderDetails',
        'as'  =>'view-order-details'
    ]);

    Route::get('/order/view-order-invoice/{id}',[
        'uses'=>'OrderController@viewOrderInvoice',
        'as'  =>'view-order-invoice'
    ]);

    Route::get('/order/download-order-invoice/{id}',[
        'uses'=>'OrderController@downloadOrderInvoice',
        'as'  =>'download-order-invoice'
    ]);
});

Route::get('/ajax-email-check/{id}',[
    'uses'=>'CheckoutController@ajaxEmailCheck',
    'as'  =>'ajax-email-check'
]);



Route::post('/cart/add',[
    'uses'=>'CartController@addToCart',
    'as'  =>'add-to-cart'
]);

Route::get('/cart/show',[
    'uses'=>'CartController@showCart',
    'as'  =>'show-cart'
]);

Route::get('/cart/delete/{id}',[
    'uses'=>'CartController@deleteCart',
    'as'  =>'delete-cart-item'
]);

Route::post('/cart/update',[
    'uses'=>'CartController@updateCart',
    'as'  =>'update-cart'
]);

Route::get('/checkout',[
    'uses'=>'CheckOutController@index',
    'as'  =>'checkout'
]);

Route::post('/customer/registration',[
    'uses'=>'CheckOutController@customerSignUp',
    'as'  =>'customer-sign-up'
]);

Route::post('/customer/customer/login',[
    'uses'=>'CheckOutController@customerLoginCheck',
    'as'  =>'customer-login'
]);

Route::post('/checkout/customer/logout',[
    'uses'=>'CheckOutController@customerLogout',
    'as'  =>'customer-logout'
]);

Route::get('/customer/new-customer/login',[
    'uses'=>'CheckOutController@newCustomerLoginCheck',
    'as'  =>'new-customer-login'
]);

Route::get('/checkout/shipping',[
    'uses'=>'CheckOutController@shippingForm',
    'as'  =>'checkout-shipping'
]);

Route::post('/shipping/save',[
    'uses'=>'CheckOutController@saveShippingInfo',
    'as'  =>'new-shipping'
]);

Route::get('/checkout/payment',[
    'uses'=>'CheckOutController@paymentForm',
    'as'  =>'checkout-payment'
]);

Route::post('/checkout/order',[
    'uses'=>'CheckOutController@newOrder',
    'as'  =>'new-order'
]);

Route::get('/complete/order',[
    'uses'=>'CheckOutController@completeOrder',
    'as'  =>'complete-order'
]);






