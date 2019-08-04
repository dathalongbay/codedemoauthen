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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Homepage route
 */
Route::get('/', 'Frontend\HomepageController@index');
Route::get('/search', 'Frontend\SearchController@index');
Route::post('/newsletter', 'Frontend\NewsletterController@store');
Route::get('/newsletter', 'Frontend\NewsletterController@index');

/**
 * Frontend route shop category
 */
Route::get('shop/category/{id}', 'Frontend\ShopCategoryController@detail');

/**
 * Frontend route shop product
 */
Route::get('shop/product/{id}', 'Frontend\ShopProductController@detail');

/**
 * Frontend route cart giỏ hàng
 */
Route::get('shop/cart', 'Frontend\ShopCartController@index');
Route::post('shop/cart/add', 'Frontend\ShopCartController@add');
Route::post('shop/cart/update', 'Frontend\ShopCartController@update');
Route::post('shop/cart/remove', 'Frontend\ShopCartController@remove');
Route::post('shop/cart/clear', 'Frontend\ShopCartController@clear');

/**
 * Frontend route payment thanh toán
 */
Route::get('shop/payment', 'Frontend\ShopPaymentController@index');
Route::post('shop/payment', 'Frontend\ShopPaymentController@order');
Route::get('shop/payment/after', 'Frontend\ShopPaymentController@afterOrder');

/**
 * Frontend route CMS page
 */
Route::get('page/{id}', 'Frontend\ContentPageController@detail');

/**
 * Frontend route content category
 */
Route::get('content/category/{id}', 'Frontend\ContentCategoryController@detail');

/**
 * Frontend route content tag
 */
Route::get('content/tag/{id}', 'Frontend\ContentTagController@detail');

/**
 * Frontend route shop product
 */
Route::get('content/post/{id}', 'Frontend\ContentPostController@detail');


/**
 * Route cho administrator
 */
Route::prefix('admin')->group(function() {
    // Gom nhóm các route cho phần admin

    /**
     * ----------------- Route admin authentication --------------------
     * ---------------------------------------------------------
     * ---------------------------------------------------------
     */

    /**
     * URL : authen.com/admin/
     * Route mặc định của admin
     */
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    /**
     * URL : authen.com/admin/dashboard
     * Route đăng nhập thành công
     */
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    /**
     * URL : authen.com/admin/register
     * Route trả về view dùng để đăng ký tài khoản admin
     */
    Route::get('register', 'AdminController@create')->name('admin.register');

    /**
     * URL : authen.com/admin/register
     * Phương thức là POST
     * Route dùng để đăng ký 1 admin từ form POST
     */
    Route::post('register', 'AdminController@store')->name('admin.register.store');


    /**
     * URL : authen.com/admin/login
     * METHOD : GET
     * Route trả về view đăng nhập admin
     */
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');

    /**
     * URL : authen.com/admin/login
     * METHOD : POST
     * Route xử lý quá trình đăng nhập admin
     */
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    /**
     * URL : authen.com/admin/logout
     * METHOD : POST
     * Route dùng để đăng xuất
     */
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');

    /**
     * ----------------- Route admin shopping --------------------
     * ---------------------------------------------------------
     * ---------------------------------------------------------
     */
    Route::get('shop/category', 'Admin\ShopCategoryController@index');
    Route::get('shop/category/create', 'Admin\ShopCategoryController@create');
    Route::get('shop/category/{id}/edit', 'Admin\ShopCategoryController@edit');
    Route::get('shop/category/{id}/delete', 'Admin\ShopCategoryController@delete');

    Route::post('shop/category', 'Admin\ShopCategoryController@store');
    Route::post('shop/category/{id}', 'Admin\ShopCategoryController@update');
    Route::post('shop/category/{id}/delete', 'Admin\ShopCategoryController@destroy');

    /**
     * ----------------- Route admin shopping product --------------------
     * ---------------------------------------------------------
     * ---------------------------------------------------------
     */
    Route::get('shop/product', 'Admin\ShopProductController@index');
    Route::get('shop/product/create', 'Admin\ShopProductController@create');
    Route::get('shop/product/{id}/edit', 'Admin\ShopProductController@edit');
    Route::get('shop/product/{id}/delete', 'Admin\ShopProductController@delete');

    Route::post('shop/product', 'Admin\ShopProductController@store');
    Route::post('shop/product/{id}', 'Admin\ShopProductController@update');
    Route::post('shop/product/{id}/delete', 'Admin\ShopProductController@destroy');


    Route::get('shop/order', 'Admin\ShopOrderController@index');
    Route::get('shop/order/{id}/edit', 'Admin\ShopOrderController@edit');
    Route::get('shop/order/{id}/delete', 'Admin\ShopOrderController@delete');

    Route::post('shop/order/{id}', 'Admin\ShopOrderController@update');
    Route::post('shop/order/{id}/delete', 'Admin\ShopOrderController@destroy');

    Route::get('shop/review', function () {
        return view('admin.content.shop.review.index');
    });

    // Khách hàng
    Route::get('shop/customer', 'Admin\CustomerManagerController@index');
    Route::get('shop/customer/create', 'Admin\CustomerManagerController@create');
    Route::get('shop/customer/{id}/edit', 'Admin\CustomerManagerController@edit');
    Route::get('shop/customer/{id}/delete', 'Admin\CustomerManagerController@delete');

    Route::post('shop/customer', 'Admin\CustomerManagerController@store');
    Route::post('shop/customer/{id}', 'Admin\CustomerManagerController@update');
    Route::post('shop/customer/{id}/delete', 'Admin\CustomerManagerController@destroy');

    // Shipper
    Route::get('shop/shipper', 'Admin\ShipperManagerController@index');
    Route::get('shop/shipper/create', 'Admin\ShipperManagerController@create');
    Route::get('shop/shipper/{id}/edit', 'Admin\ShipperManagerController@edit');
    Route::get('shop/shipper/{id}/delete', 'Admin\ShipperManagerController@delete');

    Route::post('shop/shipper', 'Admin\ShipperManagerController@store');
    Route::post('shop/shipper/{id}', 'Admin\ShipperManagerController@update');
    Route::post('shop/shipper/{id}/delete', 'Admin\ShipperManagerController@destroy');

    // Seller
    Route::get('shop/seller', 'Admin\SellerManagerController@index');
    Route::get('shop/seller/create', 'Admin\SellerManagerController@create');
    Route::get('shop/seller/{id}/edit', 'Admin\SellerManagerController@edit');
    Route::get('shop/seller/{id}/delete', 'Admin\SellerManagerController@delete');

    Route::post('shop/seller', 'Admin\SellerManagerController@store');
    Route::post('shop/seller/{id}', 'Admin\SellerManagerController@update');
    Route::post('shop/seller/{id}/delete', 'Admin\SellerManagerController@destroy');

    // Nhãn hiệu
    Route::get('shop/brand', 'Admin\ShopBrandController@index');
    Route::get('shop/brand/create', 'Admin\ShopBrandController@create');
    Route::get('shop/brand/{id}/edit', 'Admin\ShopBrandController@edit');
    Route::get('shop/brand/{id}/delete', 'Admin\ShopBrandController@delete');

    Route::post('shop/brand', 'Admin\ShopBrandController@store');
    Route::post('shop/brand/{id}', 'Admin\ShopBrandController@update');
    Route::post('shop/brand/{id}/delete', 'Admin\ShopBrandController@destroy');

    // Thống kê
    Route::get('shop/statistic', function () {
        return view('admin.content.shop.statistic.index');
    });

    Route::get('shop/product/order', function () {
        return view('admin.content.shop.adminorder.index');
    });

    /**
     * ----------------- Route admin nội dung --------------------
     * ---------------------------------------------------------
     * ---------------------------------------------------------
     */
    Route::get('content/category', 'Admin\ContentCategoryController@index');
    Route::get('content/category/create', 'Admin\ContentCategoryController@create');
    Route::get('content/category/{id}/edit', 'Admin\ContentCategoryController@edit');
    Route::get('content/category/{id}/delete', 'Admin\ContentCategoryController@delete');

    Route::post('content/category', 'Admin\ContentCategoryController@store');
    Route::post('content/category/{id}', 'Admin\ContentCategoryController@update');
    Route::post('content/category/{id}/delete', 'Admin\ContentCategoryController@destroy');

    // Content post
    Route::get('content/post', 'Admin\ContentPostController@index');
    Route::get('content/post/create', 'Admin\ContentPostController@create');
    Route::get('content/post/{id}/edit', 'Admin\ContentPostController@edit');
    Route::get('content/post/{id}/delete', 'Admin\ContentPostController@delete');

    Route::post('content/post', 'Admin\ContentPostController@store');
    Route::post('content/post/{id}', 'Admin\ContentPostController@update');
    Route::post('content/post/{id}/delete', 'Admin\ContentPostController@destroy');

    // Content page
    Route::get('content/page', 'Admin\ContentPageController@index');
    Route::get('content/page/create', 'Admin\ContentPageController@create');
    Route::get('content/page/{id}/edit', 'Admin\ContentPageController@edit');
    Route::get('content/page/{id}/delete', 'Admin\ContentPageController@delete');

    Route::post('content/page', 'Admin\ContentPageController@store');
    Route::post('content/page/{id}', 'Admin\ContentPageController@update');
    Route::post('content/page/{id}/delete', 'Admin\ContentPageController@destroy');

    // Content tags
    Route::get('content/tag', 'Admin\ContentTagController@index');
    Route::get('content/tag/create', 'Admin\ContentTagController@create');
    Route::get('content/tag/{id}/edit', 'Admin\ContentTagController@edit');
    Route::get('content/tag/{id}/delete', 'Admin\ContentTagController@delete');

    Route::post('content/tag', 'Admin\ContentTagController@store');
    Route::post('content/tag/{id}', 'Admin\ContentTagController@update');
    Route::post('content/tag/{id}/delete', 'Admin\ContentTagController@destroy');

    /**
     * ----------------- Route admin menu --------------------
     * ---------------------------------------------------------
     * ---------------------------------------------------------
     */
    Route::get('menu', 'Admin\MenuController@index');
    Route::get('menu/create', 'Admin\MenuController@create');
    Route::get('menu/{id}/edit', 'Admin\MenuController@edit');
    Route::get('menu/{id}/delete', 'Admin\MenuController@delete');

    Route::post('menu', 'Admin\MenuController@store');
    Route::post('menu/{id}', 'Admin\MenuController@update');
    Route::post('menu/{id}/delete', 'Admin\MenuController@destroy');

    Route::get('menuitems', 'Admin\MenuItemController@index');
    Route::get('menuitems/create', 'Admin\MenuItemController@create');
    Route::get('menuitems/{id}/edit', 'Admin\MenuItemController@edit');
    Route::get('menuitems/{id}/delete', 'Admin\MenuItemController@delete');

    Route::post('menuitems', 'Admin\MenuItemController@store');
    Route::post('menuitems/{id}', 'Admin\MenuItemController@update');
    Route::post('menuitems/{id}/delete', 'Admin\MenuItemController@destroy');

    /**
     * ----------------- Route admin users --------------------
     * ---------------------------------------------------------
     * ---------------------------------------------------------
     */

    Route::get('users', 'Admin\AdminManagerController@index');
    Route::get('users/create', 'Admin\AdminManagerController@create');
    Route::get('users/{id}/edit', 'Admin\AdminManagerController@edit');
    Route::get('users/{id}/delete', 'Admin\AdminManagerController@delete');

    Route::post('users', 'Admin\AdminManagerController@store');
    Route::post('users/{id}', 'Admin\AdminManagerController@update');
    Route::post('users/{id}/delete', 'Admin\AdminManagerController@destroy');

    /**
     * ----------------- Route admin users --------------------
     * ---------------------------------------------------------
     * ---------------------------------------------------------
     */

    Route::get('media', function () {
        return view('admin.content.media.index');
    });

    /**
     * ----------------- Route admin config --------------------
     * ---------------------------------------------------------
     * ---------------------------------------------------------
     */

    Route::get('config', 'Admin\ConfigController@index');
    Route::post('config', 'Admin\ConfigController@store');

    /**
     * ----------------- Route admin newsletters --------------------
     * ---------------------------------------------------------
     * ---------------------------------------------------------
     */

    Route::get('newsletters', 'Admin\NewslettersController@index');
    Route::get('newsletters/create', 'Admin\NewslettersController@create');
    Route::get('newsletters/{id}/edit', 'Admin\NewslettersController@edit');
    Route::get('newsletters/{id}/delete', 'Admin\NewslettersController@delete');

    Route::post('newsletters', 'Admin\NewslettersController@store');
    Route::post('newsletters/{id}', 'Admin\NewslettersController@update');
    Route::post('newsletters/{id}/delete', 'Admin\NewslettersController@destroy');

    /**
     * ----------------- Route admin banners --------------------
     * ---------------------------------------------------------
     * ---------------------------------------------------------
     */

    Route::get('banners', 'Admin\BannerController@index');
    Route::get('banners/create', 'Admin\BannerController@create');
    Route::get('banners/{id}/edit', 'Admin\BannerController@edit');
    Route::get('banners/{id}/delete', 'Admin\BannerController@delete');

    Route::post('banners', 'Admin\BannerController@store');
    Route::post('banners/{id}', 'Admin\BannerController@update');
    Route::post('banners/{id}/delete', 'Admin\BannerController@destroy');

    /**
     * ----------------- Route admin contacts --------------------
     * ---------------------------------------------------------
     * ---------------------------------------------------------
     */
    Route::get('contacts', function () {
        return view('admin.content.contacts.index');
    });

    /**
     * ----------------- Route admin email --------------------
     * ---------------------------------------------------------
     * ---------------------------------------------------------
     */
    Route::get('email/inbox', function () {
        return view('admin.content.email.index');
    });

    Route::get('email/draft', function () {
        return view('admin.content.email.draft');
    });

    Route::get('email/send', function () {
        return view('admin.content.email.send');
    });

});


/**
 * Route cho các nhà cung cấp sản phẩm ( seller )
 */
Route::prefix('seller')->group(function() {

    // Gom nhóm các route cho phần seller

    /**
     * URL : authen.com/seller/
     * Route mặc định của seller
     */
    Route::get('/', 'SellerController@index')->name('seller.dashboard');

    /**
     * URL : authen.com/seller/dashboard
     * Route đăng nhập thành công
     */
    Route::get('/dashboard', 'SellerController@index')->name('seller.dashboard');

    /**
     * URL : authen.com/seller/register
     * Route trả về view dùng để đăng ký tài khoản seller
     */
    Route::get('register', 'SellerController@create')->name('seller.register');

    /**
     * URL : authen.com/seller/register
     * Phương thức là POST
     * Route dùng để đăng ký 1 seller từ form POST
     */
    Route::post('register', 'SellerController@store')->name('seller.register.store');

    /**
     * URL : authen.com/seller/login
     * METHOD : GET
     * Route trả về view đăng nhập seller
     */
    Route::get('login', 'Auth\Seller\LoginController@login')->name('seller.auth.login');

    /**
     * URL : authen.com/seller/login
     * METHOD : POST
     * Route xử lý quá trình đăng nhập seller
     */
    Route::post('login', 'Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');

    /**
     * URL : authen.com/seller/logout
     * METHOD : POST
     * Route dùng để đăng xuất
     */
    Route::post('logout', 'Auth\Seller\LoginController@logout')->name('seller.auth.logout');


});

/**
 * Route cho các nhà cung cấp sản phẩm ( seller )
 */
Route::prefix('shipper')->group(function() {
    // Gom nhóm các route cho phần shipper

    /**
     * URL : authen.com/shipper/
     * Route mặc định của shipper
     */
    Route::get('/', 'ShipperController@index')->name('shipper.dashboard');

    /**
     * URL : authen.com/shipper/dashboard
     * Route đăng nhập thành công
     */
    Route::get('/dashboard', 'ShipperController@index')->name('shipper.dashboard');

    /**
     * URL : authen.com/shipper/register
     * Route trả về view dùng để đăng ký tài khoản shipper
     */
    Route::get('register', 'ShipperController@create')->name('shipper.register');

    /**
     * URL : authen.com/shipper/register
     * Phương thức là POST
     * Route dùng để đăng ký 1 shipper từ form POST
     */
    Route::post('register', 'ShipperController@store')->name('shipper.register.store');

    /**
     * URL : authen.com/shipper/login
     * METHOD : GET
     * Route trả về view đăng nhập shipper
     */
    Route::get('login', 'Auth\Shipper\LoginController@login')->name('shipper.auth.login');

    /**
     * URL : authen.com/shipper/login
     * METHOD : POST
     * Route xử lý quá trình đăng nhập shipper
     */
    Route::post('login', 'Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');

    /**
     * URL : authen.com/shipper/logout
     * METHOD : POST
     * Route dùng để đăng xuất
     */
    Route::post('logout', 'Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');

});

