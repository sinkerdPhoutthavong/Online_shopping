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


//ສໍາລັບໜ້າ Contact-us
Route::match(['get','post'],'/page/contact','CmsController@contact');

//ສໍາລັບໜ້າ post page for vue
Route::match(['get','post'],'/page/post','CmsController@addPost');

//ສະແດງແຜນອອກທາງ Font End
Route::match(['get','post'],'/page/{url}','CmsController@cmsPage');

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

//Route for forgot password
Route::match(['get','post'],'forgot-password','UsersController@forgotPassword');

//USER REGISTER FORM SUBMIT
Route::post('/user-register','UsersController@register');

//ສໍາລັບການຢືຶນຢັນບັນຊີ
Route::get('/confirm/{code}','UsersController@confirmAccount');

//USER LOGOUT
Route::get('/user-logout','UsersController@logout');

//USER LOGIN
Route::post('/user-login','UsersController@login');

//CHECK ID USER ALREADY EXISTS
Route::match(['get','post'],'/check-email','UsersController@checkEmail');

//ກວດສອບ Pincode
Route::post('/check-pincode','ProductsController@checkPincode');

//ສໍາລັບການຄົ້ນຫາສິນຄ້າ
Route::post('/search-products','ProductsController@searchProducts');

//ALL Route after User Login
Route::group(['middleware'=>['frontlogin']],function(){
    //USERS ACCOUNT PAGES
    Route::match(['get','post'],'/account','UsersController@account');
    //CHECK USER CUURENT PASSWORD
    Route::post('/check-user-pwd','UsersController@chkUserPassword');
    //UPDATE USER PASSWORD
    Route::post('/update-user-pwd','UsersController@updatePassword');
    //CHECK OUT PAGES
    Route::match(['get','post'],'/checkout','ProductsController@checkout');
    //ORDER REVIEW 
    Route::match(['get','post'],'/order-review','ProductsController@orderReview');
    //PLACE ORDER 
    Route::match(['get','post'],'/place-order','ProductsController@placeOrder');
    //THANK PAGES
    Route::get('/thanks','ProductsController@thanks');
    //BANK PAGES
    Route::get('/bank','ProductsController@bank');
    //OFFICES PAGES
    Route::get('/offices','ProductsController@office');
    //THANK PAGES
    Route::get('/cod','ProductsController@COD');
    //USER ORDER PAGES
    Route::get('/orders','ProductsController@userOrders');
    //USER ORDERed PAGES
    Route::get('/orders/{id}','ProductsController@userOrderDetails');
});

// Route for admin
Route::group(['middleware' => ['adminlogin']],function(){
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
    Route::get('/admin/delete-product-video/{id}','ProductsController@deleteProductVideo');
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

    //Route ສໍາລັບສະກຸນເງິນ
    Route::match(['get','post'],'/admin/add-currency','CurrencyController@addCurrency');
    Route::get('/admin/view-currencies','CurrencyController@viewCurrencies');
    Route::match(['get','post'],'/admin/edit-currency/{id}','CurrencyController@editCurrency');
    Route::get('/admin/delete-currency/{id}','CurrencyController@deleteCurrency');

    //Admin order Route
    Route::get('/admin/view-orders','ProductsController@viewOrders');
    Route::get('/admin/delete-user-order/{id}','ProductsController@DelOrders');

    //Admin order Route
    Route::get('/admin/view-orders/{id}','ProductsController@viewOrderDetails');

    //Admin Update Order Status Route
    Route::match(['get','post'],'/admin/update-order-status','ProductsController@updateOrderStatus');

    //ສໍາລັບການສະແດງ User ທີ່ໃຊ້ສະໝັກສະມາຊິກ
    Route::get('/admin/view-users','Userscontroller@viewUsers');

    //ສໍາລັບການສະແດງອອກໃບບິນ
    Route::get('/admin/view-order-invoice/{id}','Productscontroller@viewOrdersInvoice');

    //ສໍາລັບ CMS Pages
    //ສໍາລັບເພີ່ມ CMS Pages
    Route::match(['get','post'],'/admin/add-cms-page','CmsController@addCmsPage');
    Route::get('/admin/view-cms-pages','CmsController@viewCmsPages');
    Route::match(['get','post'],'/admin/edit-cms-page/{id}','CmsController@editCmsPage');
    Route::get('/admin/delete-cms-page/{id}','CmsController@deleteCmsPage');

    //Route ສໍາ່ລັບການສະແດງ ການສອບຖຸາມຂອງລູກຄ້າ
    Route::get('/admin/view-enquiries','CmsController@viewEnquiries');
    //Route ສໍາ່ລັບການເອົາ່ຂໍໍ້ມູນອອກມາສະແດງ ການສອບຖຸາມຂອງລູກຄ້າ
    Route::get('/admin/get-enquiries','CmsController@getEnquiries');
});
