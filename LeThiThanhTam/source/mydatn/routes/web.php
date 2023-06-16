<?php

use App\Http\Controllers\Front;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
//Front (client)
Route::get('/', [Front\HomeController::class,'index']);

Route::prefix('san-pham')->group(function(){
    Route::get('/{id}-{productName}.html', [Front\ShopController::class,'show'])->name('showProduct');
    Route::post('changeColor', [Front\ShopController::class,'changeColor'])->name('changeColor');
    Route::post('load', [Front\ShopController::class,'load'])->name('shop.load');
    Route::post('/{id}', [Front\ShopController::class,'postComment']);

});
Route::get('danh-muc/{categoryName}.html', [Front\ShopController::class,'category'])->name('categoryProduct');
Route::get('danh-muc/tat-ca-san-pham.html', [Front\ShopController::class,'index'])->name('shopIndex');
Route::get('lien-he.html', [Front\ContactController::class,'index'])->name('lienHe');
Route::get('chinh-sach.html', [Front\PolicyController::class,'index'])->name('chinhSach');

//nhóm các route theo tiền tố cart
Route::prefix('gio-hang')->group(function(){
    //dang ki route de them sp vao gio hang
    Route::post('addProduct', [Front\CartController::class,'addProduct'])->name('addProduct');
    Route::get('/', [Front\CartController::class,'index'])->name('cart');
    Route::get('deleteProduct', [Front\CartController::class,'deleteProduct'])->name('deleteProduct');
    Route::get('/destroy', [Front\CartController::class,'destroy']);
    Route::get('/update', [Front\CartController::class,'update']);
    

});

Route::prefix('thanh-toan')->group(function(){

    Route::get('/', [Front\CheckOutController::class,'index'])->name('checkout');
    Route::post('loadCheckout', [Front\CheckOutController::class,'loadCheckout'])->name('checkout.load');
    Route::post('/', [Front\CheckOutController::class,'addOrder'])->name('addOrder');
    // Route::get('/vnPayCheck', [Front\CheckOutController::class,'vnPayCheck']); //xử lí dữ liệu trả về từ VNPay
    Route::get('/result', [Front\CheckOutController::class,'result']); 

    Route::post('/checkCoupon', [Front\CheckOutController::class,'checkCoupon'])->name('checkCoupon');
    // Route::post('/momo_payment', [Front\CheckOutController::class,'momo_payment'])->name('momo_payment');

});

Route::get('checkout/vnPayCheck', [Front\CheckOutController::class,'vnPayCheck']);

Route::prefix('tai-khoan')->group(function(){
    Route::get('/login', [Front\AccountController::class,'login'])->name('login');
    Route::post('/login', [Front\AccountController::class,'checkLogin'])->name('checkLogin');
    // Google Sign In
    Route::get('/get-google-sign-in-url', [Front\AccountController::class, 'getGoogleSignInUrl']);
    Route::get('/login/google', [Front\AccountController::class, 'loginGoogle']);

    // fb Socialite::driver('facebook')
    Route::get('/login/facebook', [Front\AccountController::class, 'facebookRedirect'])->name('login.fb');
    Route::get('/login/facebook/callback', [Front\AccountController::class, 'loginWithFacebook']);

    Route::get('cancelOrder', [Front\AccountController::class,'cancelOrder'])->name('cancelOrder');

    Route::get('/dang-xuat.html', [Front\AccountController::class,'logout'])->name('logout');
    Route::get('/quen-mat-khau.html', [Front\AccountController::class,'forgot'])->name('forgot');
    Route::post('/quen-mat-khau.html', [Front\AccountController::class,'checkForgot']); 

    Route::get('/resetPass/{id}', [Front\AccountController::class,'resetPass']);
    Route::post('/resetPass/{id}', [Front\AccountController::class,'checkPass']);
    Route::get('/thong-tin-ca-nhan.html', [Front\AccountController::class,'information'])->name('information');
    Route::post('loadCity', [Front\AccountController::class,'loadCity'])->name('account.load');
    Route::post('/updateInformation', [Front\AccountController::class,'updateInformation'])->name('updateInformation');
    Route::get('/lich-su-mua-hang.html', [Front\AccountController::class,'history'])->name('ordersHistory');


    Route::get('/register', [Front\AccountController::class,'register'])->name('register');
    Route::post('/register', [Front\AccountController::class,'createUser']);

    Route::prefix('mua-hang')->group(function(){
        // Route::get('/', [Front\AccountController::class,'myOrderIndex'])->name('myorder');
        Route::get('{id}-{orderName}.html', [Front\AccountController::class,'myOrderDetail'])->name('orderDetail');
    });
});

Route::prefix('tin-tuc')->group(function(){
    // Route::get('/', [Front\BlogController::class,'index'])->name('blogIndex');
    Route::get('/{id}-{blogName}.html', [Front\BlogController::class,'detail'])->name('showBlog');
    Route::prefix('/{id}')->middleware('CheckMemberLogin')->group(function(){
        Route::post('', [Front\BlogController::class,'postComment']);
    });
});
Route::get('chuyen-muc/tat-ca-tin-tuc.html', [Front\BlogController::class,'index'])->name('blogIndex');
Route::get('chuyen-muc/{categoryName}.html', [Front\BlogController::class,'category'])->name('categoryBlog');


//Dashboard (Admin)
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function(){
    // Route::redirect('', '/admin/order');//chuyển hướng đến admin/product mặc định
    Route::resource('dashboard', Admin\DashboardController::class);
    Route::resource('order', Admin\OrderController::class);
    Route::resource('/user', Admin\UserController::class);

    Route::resource('category', Admin\ProductCategoryController::class);
    Route::resource('blogCategory', Admin\BlogCategoryController::class);
    Route::resource('brand', Admin\BrandController::class);
    Route::resource('coupon', Admin\CouponController::class);
    Route::resource('product', Admin\ProductController::class);
    Route::resource('product/{product_id}/image', Admin\ProductImageController::class);
    Route::resource('product/{product_id}/detail', Admin\ProductDetailController::class);
    Route::resource('order', Admin\OrderController::class);
    Route::resource('blog', Admin\BlogController::class);
    Route::resource('productComment', Admin\ProductCommentController::class);
    Route::post('/changeStatus', [Admin\ProductCommentController::class, 'changeStatus'])->name('changeStatus');
    

    Route::prefix('login')->group(function(){
        Route::get('', [Admin\HomeController::class,'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('', [Admin\HomeController::class,'postLogin'])->withoutMiddleware('CheckAdminLogin');

    });

    Route::get('logout', [Admin\HomeController::class,'logout']);

    Route::prefix('setting')->group(function () {
        Route::get('/', [Admin\SettingController::class, 'index'])->name('setting.index');
        Route::post('/addSetting', [Admin\SettingController::class, 'addSetting'])->name('addSetting');
    });

    Route::get('print-order/{order_id}', [Admin\OrderController::class,'print_order'])->name('print.order');
    Route::post('/filter-by-date', [Admin\DashboardController::class, 'filter_by_date'])->name('dashboard.order');
    Route::post('/days-order', [Admin\DashboardController::class, 'days_order'])->name('dashboard.days.order');
    Route::post('/dashboard-filter', [Admin\DashboardController::class, 'dashboard_filter'])->name('dashboard.order.filter');
});

Route::get('lang/{locale}',function($locale){
    if(! in_array($locale, ['vi','en'])){
        abort(404);
    }
    session()->put('locale',$locale);
    return redirect()->back();
})->name('user.change-language');;
