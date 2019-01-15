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

// Route::get('/', function () {
//     return view('welcome');
// });
//front page

//endfront Page
Route::match(['get','post'],'/admin','AdminController@login'); 

Auth::routes();
//Category Listen Page
Route::get('/products/{url}','ProductsController@products');
//end
Route::get('/home', 'HomeController@index')->name('home');
//Index Pge
Route::get('/','IndexController@index');

//logout
Route::get('/logout','AdminController@logout');

// Route for Products Detail
Route::get('product/{id}','ProductsController@product');

//Add to cart Route
Route::match(['get','post'],'/add-cart','ProductsController@addtoCart');

//Cart Page
Route::match(['get','post'],'/cart','ProductsController@cart');
//Delete product from cart page
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');

//Update Product Quantity from cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');

// Route for get product arrtibutes prices for product details
Route::get('get-product-price','ProductsController@getProductPrice');

//Route for Apply Coupon
Route::post('/cart/apply-coupon','ProductsController@applyCoupon');

//Route FOR LOGIN 
Route::get('/user-Login','UsersController@userLogin');

//Route FOR LOGIN 
Route::get('/user-registerpage','UsersController@userRegister');

//USER REGISTER FORM SUBMIT
Route::post('/user-register','UsersController@register');

//USER LOGOUT
Route::get('/user-logout','UsersController@logout');

// //USER LOGIN
// Route::post('/user-login','UsersController@login');
//USER LOGIN
Route::post('/user-login','UsersController@login');

//CHECK ID USER ALREADY EXISTS
Route::match(['get','post'],'/check-email','UsersController@checkEmail');

// Route for admin
Route::group(['middleware' => ['auth']],function(){
    Route::get('/admin/dashboard','AdminController@dashboard');
    Route::get('/admin/settings','AdminController@settings');
    Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

    //category route addmin
    Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
    Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
    Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
    Route::get('/admin/view-categories','CategoryController@viewCategories');

    //Product route admin
    Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
    Route::get('/admin/view-products','ProductsController@viewProducts');
    Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
    Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
    Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
    Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteAltImage');

    //Product Attributes Route
    Route::match(['get','post'],'/admin/add-attributes/{id}','ProductsController@addAttributes');
    Route::match(['get','post'],'/admin/add-images/{id}','ProductsController@addImages');
    Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');
    Route::match(['get','post'],'/admin/edit-attributes/{id}','ProductsController@editAttributes');

    //Route for Coupon
    Route::match(['get','post'],'/admin/add-coupon','CouponsController@addCoupon');
    Route::get('/admin/view-coupons','CouponsController@viewCoupons');
    Route::match(['get','post'],'/admin/edit-coupon/{id}','CouponsController@editCoupon');
    Route::get('/admin/delete-coupon/{id}','CouponsController@deleteCoupon');

    //Route for Banners
    Route::match(['get','post'],'/admin/add-banner','BannersController@addBanner');
    Route::get('/admin/view-banners','BannersController@viewBanners');
    Route::match(['get','post'],'/admin/edit-banner/{id}','BannersController@editBanner');
    Route::get('/admin/delete-banner/{id}','BannersController@deleteBanner');
    Route::get('/admin/delete-banner-image/{id}','BannersController@deleteBannerImage');
});
