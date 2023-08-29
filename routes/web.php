<?php

use App\Http\Controllers\rioAdmin\AccountSettingsController;
use App\Http\Controllers\rioAdmin\AdminAuthController;
use App\Http\Controllers\rioAdmin\CategoryController;
use App\Http\Controllers\rioAdmin\CouponController;
use App\Http\Controllers\rioAdmin\CustomerController;
use App\Http\Controllers\rioAdmin\OrderController;
use App\Http\Controllers\rioAdmin\ProductController;
use App\Http\Controllers\rioAdmin\AppSettingsController;
use App\Http\Controllers\rioHome\CartController;
use App\Http\Controllers\rioHome\OrderPlaceController;
use App\Http\Controllers\rioHome\PageController;
use App\Http\Controllers\rioUser\OrderHistoryController;
use App\Http\Controllers\rioUser\OrderTrackController;
use App\Http\Controllers\rioUser\ProductHistoryController;
use App\Http\Controllers\rioUser\UserAccountSettingsController;
use App\Http\Controllers\rioUser\UserAuthController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes Start
|--------------------------------------------------------------------------
*/

Route::get('/order-success/{id}', [PageController::class, 'success'])->name('success');

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/our-foods', [PageController::class, 'ourFoods'])->name('our-foods');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/cart/add', [CartController::class, 'addCart'])->name('cart.add');
Route::post('/order/place', [OrderPlaceController::class, 'orderPlace'])->name('order.place');
Route::post('/cart-coupon', [CartController::class, 'addCartCoupon'])->name('cart-coupon');

/*
|--------------------------------------------------------------------------
| Web Routes END
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Customer Routes Start
|--------------------------------------------------------------------------
*/

Route::get('/login', [UserAuthController::class, 'loginForm'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('login');
Route::get('/register', [UserAuthController::class, 'registerForm'])->name('register');
Route::post('/register', [UserAuthController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserAuthController::class, 'index'])->name('dashboard');
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

    Route::post('order/track', [OrderTrackController::class, 'orderTrack'])->name('order.track');
    Route::get('/order/history', [OrderHistoryController::class, 'orderHistory'])->name('order.history');
    Route::get('/product/history', [ProductHistoryController::class, 'productHistory'])->name('product.history');
    Route::get('/user/account/settings', [UserAccountSettingsController::class, 'settings'])->name('user.account.settings');
    Route::post('/user/account/settings/update/{id}', [UserAccountSettingsController::class, 'update'])->name('user.account.settings.update');
});

/*
|--------------------------------------------------------------------------
| Customer Routes END
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Admin Routes Start
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminAuthController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [AdminAuthController::class, 'registerForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register');

Route::middleware(['admin:admin'])->group(callback: function () {

    Route::get('/admin/dashboard', [AdminAuthController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    /**************************************** Product Routes *****************************************/
    Route::get('/product/list', [ProductController::class, 'index'])->name('product.list');
    Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');

    Route::get('/product/create', [ProductController::class, 'productCreateForm'])->name('product.create');
    Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');

    Route::get('/product/update/{id}', [ProductController::class, 'productUpdateForm'])->name('product.update');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/product/status/{id}', [ProductController::class, 'status'])->name('product.status');
    /**************************************** Product Routes End *****************************************/

    /**************************************** Product Category Routes *****************************************/
    Route::get('/category', [CategoryController::class, 'index'])->name('category');

    Route::post('/category/create', [CategoryController::class, 'create'])->name('category.create');

    Route::get('/category/detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');

    Route::get('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/category/status/{id}', [CategoryController::class, 'status'])->name('category.status');
    /**************************************** Product Category Routes End *****************************************/

    /**************************************** Product Coupon Routes *****************************************/
    Route::get('/coupon', [CouponController::class, 'index'])->name('coupon');

    Route::post('/coupon/create', [CouponController::class, 'create'])->name('coupon.create');

    Route::get('/coupon/detail/{id}', [CouponController::class, 'detail'])->name('coupon.detail');

    Route::get('/coupon/update/{id}', [CouponController::class, 'couponUpdate'])->name('coupon.update');
    Route::post('/coupon/update/{id}', [CouponController::class, 'update'])->name('coupon.update');

    Route::get('/coupon/delete/{id}', [CouponController::class, 'delete'])->name('coupon.delete');
    Route::get('/coupon/status/{id}', [CouponController::class, 'status'])->name('coupon.status');
    /**************************************** Product Coupon Routes End *****************************************/

    /**************************************** Order Routes *****************************************/
    Route::get('/order/list', [OrderController::class, 'index'])->name('order.list');
    Route::get('/order/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');

    Route::get('/order/create', [OrderController::class, 'orderCreateForm'])->name('order.create');
    Route::post('/order/create', [OrderController::class, 'create'])->name('order.create');

    Route::get('/order/update/{id}', [OrderController::class, 'orderUpdateForm'])->name('order.update');
    Route::post('/order/update/{id}', [OrderController::class, 'orderUpdate'])->name('order.update');

    Route::post('/order/delete/{id}', [OrderController::class, 'delete'])->name('order.delete');
    Route::post('/order/status/{id}', [OrderController::class, 'status'])->name('order.status');
    /**************************************** Order Routes End *****************************************/

    Route::get('/order/update/coupon/{id}', [OrderController::class, 'orderCouponUpdate'])->name('order.update.coupon');
    Route::get('/order/update/shipping-fees/{id}', [OrderController::class, 'orderShipFeesUpdate'])->name('order.update.shipping-fees');

    Route::get('/order/product/category/{cat_id}/{order_id}', [OrderController::class, 'productSearchByCat'])->name('order.product.category');
    Route::get('/ordered/custom/product/{id}', [OrderController::class, 'customOrderedProduct'])->name('ordered.custom.product');
    Route::get('/ordered/product/qty-update/{ordered_product_id}/{product_qty}', [OrderController::class, 'productQtyUpdate'])->name('ordered.product.qty-update');
    Route::get('/ordered/product/delete/{ordered_product_id}/{order_id}', [OrderController::class, 'orderedProductDel'])->name('ordered.product.delete');

    /**************************************** Customer Routes *****************************************/
    Route::get('/customer/list', [CustomerController::class, 'index'])->name('customer.list');
    Route::get('/customer/detail/{id}', [CustomerController::class, 'detail'])->name('customer.detail');

    Route::get('/customer/create', [CustomerController::class, 'customerCreateForm'])->name('customer.create');
    Route::post('/customer/create', [CustomerController::class, 'create'])->name('customer.create');

    Route::get('/customer/update/{id}', [CustomerController::class, 'customerUpdateForm'])->name('customer.update');
    Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');

    Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::post('/customer/status/{id}', [CustomerController::class, 'status'])->name('customer.status');
    /**************************************** Customer Routes End *****************************************/

    /**************************************** App Settings Routes *****************************************/

    Route::get('/app/settings', [AppSettingsController::class, 'appSettingsForm'])->name('app.settings');
    Route::post('/app/settings', [AppSettingsController::class, 'update'])->name('app.settings');
    Route::get('/account/settings', [AccountSettingsController::class, 'accountSettingsForm'])->name('account.settings-form');
    Route::post('/account/settings/{id}', [AccountSettingsController::class, 'update'])->name('account.settings');

    /**************************************** Settings Routes End *****************************************/

});

/*
|--------------------------------------------------------------------------
| Admin Routes END
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| SSLCOMMERZ  Routes Start
|--------------------------------------------------------------------------
*/

Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

/*
|--------------------------------------------------------------------------
| SSLCOMMERZ  Routes END
|--------------------------------------------------------------------------
*/
