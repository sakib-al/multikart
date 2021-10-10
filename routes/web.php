<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/clear', 'Admin\DashboardController@clear')->name('cc');
Route::get('/test', 'Admin\DashboardController@test')->name('test');

Auth::routes();


Route::group(['namespace' => 'Auth', ], function () {

    // Forget Password Section
    Route::post('/user/check-email', 'LoginController@CheckDuplicate')->name('check.duplicate');
    Route::get('forget-password', 'ForgotPasswordController@ForgotPass')->name('forgot.password');
    Route::post('reset-password', 'ForgotPasswordController@ResetPass')->name('reset.password');
    Route::get('reset-password/{token}', 'ForgotPasswordController@getResetPass')->name('reset.password.get');
    Route::post('reset-new-password', 'ForgotPasswordController@ResetNewPass')->name('reset.password.new');

    // Register User Section
    Route::get('check-register-token/{token}', 'RegisterController@getVerify')->name('check.token.registration');
    Route::get('send-register-token', 'RegisterController@SendToken')->name('send.token.registration');

});




Route::group(['namespace' => 'Admin', 'middleware' => ['auth']], function () {


    Route::group(['middleware' => ['admin']], function (){
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        // Country
        Route::get('/country', 'CountryController@index')->name('country.index');
        Route::post('/country/create', 'CountryController@create')->name('country.create');
        Route::post('/country/update/{id}', 'CountryController@update')->name('country.update');
        Route::get('/country/delete/{id}', 'CountryController@delete')->name('country.delete');

        // City
        Route::get('/city', 'CityController@index')->name('city.index');
        Route::post('/city/create', 'CityController@create')->name('city.create');
        Route::post('/city/update/{id}', 'CityController@update')->name('city.update');
        Route::get('/city/delete/{id}', 'CityController@delete')->name('city.delete');

        // Area
        Route::get('/area', 'AreaController@index')->name('area.index');
        Route::post('/area/create', 'AreaController@create')->name('area.create');
        Route::post('/area/update/{id}', 'AreaController@update')->name('area.update');
        Route::get('/area/delete/{id}', 'AreaController@delete')->name('area.delete');


        // Category
        Route::get('/category', 'CategoryController@index')->name('category.index');
        Route::post('/category/create', 'CategoryController@create')->name('category.create');
        Route::post('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
        Route::get('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');

        // SubCategory
        Route::get('/subcategory', 'SubCategoryController@index')->name('subcategory.index');
        Route::post('/subcategory/create', 'SubCategoryController@create')->name('subcategory.create');
        Route::post('/subcategory/edit/{id}', 'SubCategoryController@edit')->name('subcategory.edit');
        Route::post('/subcategory/update/{id}', 'SubCategoryController@update')->name('subcategory.update');
        Route::get('/subcategory/delete/{id}', 'SubCategoryController@delete')->name('subcategory.delete');

        // Product Size
        Route::get('/prd_size', 'ProductSizeController@index')->name('size.index');
        Route::post('/prd_size/create', 'ProductSizeController@save')->name('size.create');
        Route::post('/prd_size/edit/{id}', 'ProductSizeController@edit')->name('size.edit');
        Route::post('/prd_size/update/{id}', 'ProductSizeController@update')->name('size.update');
        Route::get('/prd_size/delete/{id}', 'ProductSizeController@delete')->name('size.delete');

         // Product Color
         Route::get('/prd_color', 'ProductColorController@index')->name('color.index');
         Route::post('/prd_color/create', 'ProductColorController@save')->name('color.create');
         Route::post('/prd_color/edit/{id}', 'ProductColorController@edit')->name('color.edit');
         Route::post('/prd_color/update/{id}', 'ProductColorController@update')->name('color.update');
         Route::get('/prd_color/delete/{id}', 'ProductColorController@delete')->name('color.delete');

        // Ajax Route for Subcategory
        Route::get('sub_cat_by_category/{id}', 'SubCategoryController@getSubcategory')->name('subcategory.from.category');

        // Product
        Route::get('/product',        'ProductController@index')->name('product.index');
        Route::get('/product/create', 'ProductController@create')->name('product.create');
        Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('/product/store', 'ProductController@store')->name('product.store');
        Route::post('/product/update/{id}', 'ProductController@update')->name('product.update');
        Route::get('/product/delete/{id}', 'ProductController@delete')->name('product.delete');
        Route::get('/product_image_del/{id?}', 'ProductController@getImageDel');

        // Gallery
        Route::get('/gallery', 'MediaController@index')->name('media.index');
        Route::post('/gallery/create', 'MediaController@create')->name('media.create');
        Route::get('/gallery/delte/{id}', 'MediaController@delete')->name('media.delete');

        // Background Slider

        Route::get('/slide',        'SliderController@slide_index')->name('slider.index');
        Route::get('/slide/create', 'SliderController@slide_create')->name('slider.create');
        Route::get('/slide/edit/{id}', 'SliderController@slide_edit')->name('slider.edit');
        Route::post('/slide/store', 'SliderController@slide_store')->name('slider.store');
        Route::post('/slide/update/{id}', 'SliderController@slide_update')->name('slider.update');
        Route::get('/slide/delete/{id}', 'SliderController@slide_delete')->name('slider.delete');

        //Order
        Route::get('/order', 'SalesController@index')->name('order.index');
        Route::get('/order-view/{id}', 'SalesController@OrderView')->name('order.view');
        Route::get('/order-confirm/{id}', 'SalesController@OrderConfirm')->name('order.confirm');
        Route::get('/order-cancel/{id}', 'SalesController@OrderCancel')->name('order.cancel');

        Route::get('/order-cancel-list', 'OrderCancelController@CancelIndex')->name('cancel.index');

        // Transection
        Route::get('/transection', 'SalesController@getTransection')->name('transection.index');


        // User

        Route::get('/user',        'UserController@index')->name('user.index');
        Route::get('/user/create', 'UserController@create')->name('user.create');
        Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::post('/user/store', 'UserController@store')->name('user.store');
        Route::post('/user/update/{id}', 'UserController@update')->name('user.update');
        Route::get('/user/delete/{id}', 'UserController@delete')->name('user.delete');

        // Customers

        Route::get('/customers', 'CustomersController@getCustomers')->name('customer.index');
        Route::get('/customers_view/{id}', 'CustomersController@ViewCustomers')->name('customer.view');



        // ===== WEB SECTION =====

        Route::get('/contact-us',        'ContactUsController@index')->name('contact.index');
        Route::get('/contact-us/create', 'ContactUsController@create')->name('contact.create');
        Route::get('/contact-us/edit/{id}', 'ContactUsController@edit')->name('contact.edit');
        Route::post('/contact-us/store', 'ContactUsController@store')->name('contact.store');
        Route::post('/contact-us/update/{id}', 'ContactUsController@update')->name('contact.update');
        Route::get('/contact-us/delete/{id}', 'ContactUsController@delete')->name('contact.delete');
    });

});

// ======= Front End Route ============ //

//======== Front End User Dashboard =========== //
Route::group(['namespace' => 'Front', 'middleware' => ['auth']], function () {

    //user  Dashboard
    Route::get('/user_dashboard', 'UserDashboardController@dashboard')->name('user.dashboard');
    Route::get('/user_dashboard/address', 'UserDashboardController@user_address')->name('user.address');
    Route::get('/user_dashboard/address_edit', 'UserDashboardController@user_address_edit')->name('user.address.edit');
    Route::post('/user_dashboard/address_update', 'UserDashboardController@user_address_update')->name('user.address.update');
    Route::get('/user_dashboard/order', 'UserDashboardController@user_order')->name('user.order');
    Route::get('/order-placed/{id}', 'UserDashboardController@CheckoutReturn')->name('checkout.return');
    Route::get('/user_dashboard/order/{id}', 'UserDashboardController@OrderView')->name('user.order.view');
    Route::get('/user_dashboard/change-password', 'UserDashboardController@Password')->name('user.password.change');

    Route::post('/review-store', 'ReviewController@review_store')->name('review.store');
    Route::get('/checkout', 'CartController@checkout')->name('checkout');
    Route::post('/order-place', 'CartController@OrderPlace')->name('order.place');
    Route::post('/order-cancel-request/{id}', 'OrderController@CancelRequest')->name('order.cancel.request');
    Route::get('area_by_city/{id}', 'UserDashboardController@getArea')->name('area.from.city');



});

// Public Route

Route::group(['namespace' => 'Front',], function () {


    Route::get('/index', 'IndexController@index')->name('home.index');
    Route::get('/', 'IndexController@index')->name('index');

    // Shop
    Route::get('/shop', 'ShopController@shop')->name('shop');
    Route::get('/shop/{slug}', 'ShopController@shop_view')->name('shop.view');

    // Cart
    Route::get('/cart', 'CartController@cart')->name('cart');
    Route::post('/add-to-cart', 'CartController@cartStore')->name('cart.store');
    Route::post('/update-cart', 'CartController@cartUpdate')->name('cart.update');

    Route::get('/delete-from-cart', 'CartController@cartDelete')->name('cart.delete');


    //Product Review
    // Route::get('/cart', 'ReviewController@review')->name('review');


    Route::get('/contact', 'IndexController@contact')->name('contact');
    Route::get('/wishlist', 'IndexController@wishlist')->name('wishlist');
    Route::get('/collection', 'CollectionController@collection')->name('collection');
    Route::get('/collection/{slug}', 'CollectionController@collection_view')->name('collection.view');

    // Search
    Route::get('/search', 'IndexController@search')->name('search');

    // Ajax
    Route::get('product_view/{id}', 'IndexController@product_view_modal')->name('product.view');
    Route::get('wishlist_save/{id}', 'WishController@StoreWishlist')->name('wishlist.store');
    Route::get('wishlist_save/{id}', 'WishController@StoreWishlist')->name('wishlist.store');

});
