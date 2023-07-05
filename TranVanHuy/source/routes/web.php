<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

// Route::group(['namespace' => 'App\Http\Controllers'], function () {
//     Route::get('/test', 'DashboardController@index');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('unicode', function () {
//     return view('form');
// });
// Route::post('unicode', function () {
//     return 'Phương thức Post của path /unicode';
// });

// Route::match(['get', 'post'], '/getpost', function () {
//     return view('form');
// });

// Route::get('/', function () {
//     //Auth::routes();
//     return view('welcome', ['name' => 'Samantha']);
// });

// Route::get('{slug}', 'SlugController@slug')->name('slug');

// --------------------------------USERS-------------------------------------

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // Trang chủ
    Route::get('/', 'UserController@index')->name('home');
    Route::get('shop', function () { return 'shop'; })->name('shop');
    Route::get('wishlist', function () { return 'wishlist'; })->name('wishlist');
    Route::get('single-product', function () { return 'single-product'; })->name('single-product');
    Route::get('cart', function () { return 'cart'; })->name('cart');
    Route::get('checkout', function () { return 'checkout'; })->name('checkout');
    Route::get('about', function () { return 'about'; })->name('about');
    Route::get('contact', function () { return 'contact'; })->name('contact');

    // Trang bài viết
    Route::group(['prefix' => 'blogs', 'as' => 'blog.'], function () {
        Route::get('/', 'UserController@blogIndex')->name('blogIndex');
        Route::get('/{slug}', 'SlugController@slug')->name('slug');
    });

    // Trang sản phẩm
    Route::group(['prefix' => 'products', 'as' => 'product.'], function () {
        // Route::get('/', 'UserController@productIndex')->name('productIndex');
        Route::get('/{slug}', 'SlugController@slug')->name('slug');
    });

    // Trang giỏ hàng
    Route::group(['prefix' => 'carts', 'as' => 'cart.'], function () {
        Route::group(['middleware' => ['auth:webuser']], function () {
            Route::get('/', 'ShopcartController@cartDetail')->name('detail');
            Route::post('/{slug}/cart/store', 'ShopcartController@store')->name('store');
            Route::post('/update', 'ShopcartController@update')->name('update');
            Route::get('/delete/{id}', 'ShopcartController@deleteCartItem')->name('delete');
        });
    });

    //Thanh toán và tạo hóa đơn
    Route::group(['prefix' => 'invoices', 'as' => 'invoice.'], function () {
        Route::post('/', 'InvoiceController@create')->name('create');
    });

    Route::group(['prefix' => 'account', 'as' => 'user.'], function () {
        // Trang đăng nhập & đăng ký
        Route::get('/', 'UserController@login')->name('login');
        Route::post('/', 'UserController@handlelogin')->name('handlelogin');
        Route::get('/register', 'UserController@register')->name('register');
        Route::post('/register', 'UserController@postRegister');

        // Trang xác minh email
        Route::get('/actived/{member}/{token}', 'UserController@actived')->name('actived');

        // Trang xác thực email khi tài khoản quên kích hoạt quá lâu
        Route::get('/verifyEmail', 'UserController@verifyEmail')->name('verifyemail');
        Route::post('/verifyEmail', 'UserController@postVerifyEmail');

        // Trang quên mật khẩu
        Route::get('/forgotPassword', 'UserController@forgotPass')->name('forgotpass');
        Route::post('/forgotPassword', 'UserController@postforgotPass');

        // Lấy lại mật khẩu
        Route::get('/resetPassword/{member}/{token}', 'UserController@resetPass')->name('resetpass');
        Route::post('/resetPassword/{member}/{token}', 'UserController@postresetPass');

        // Đăng xuất
        Route::get('/logout', 'UserController@logout')->name('logout');
    });

    // Trang thông tin tài khoản cá nhân
    Route::group(['prefix' => 'infomation', 'as' => 'userinf.', 'middleware' => ['auth:webuser']], function () {
        Route::get('/{id}', 'UserController@inf')->name('inf');
        Route::post('/{id}', 'UserController@editinf');
    });
});

// Dẫn Comment ngoài
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('/{slug}/comment/store', 'CommentController@store')->name('comment.store')->middleware('auth:webuser');
});

// --------------------------------ADMIN-------------------------------------

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // Trang đăng nhập
    Route::get('/login', 'AdminAuthController@loginAdmin')->name('login');
    Route::post('/login', 'AdminAuthController@postloginAdmin');

    // Trang quên mật khẩu
    Route::get('/forgotPassword', 'AdminAuthController@forgotPass')->name('forgotpass');
    Route::post('/forgotPassword', 'AdminAuthController@postforgotPass');

    // Lấy lại mật khẩu
    Route::get('/resetPassword/{user}/{token}', 'AdminAuthController@resetPass')->name('resetpass');
    Route::post('/resetPassword/{user}/{token}', 'AdminAuthController@postresetPass');

    // Đăng xuất
    Route::get('/logout', 'AdminAuthController@logout')->name('logout');
});

Route::group(['prefix' => 'adminshop', 'middleware' => 'auth'], function () {
    Route::group(['namespace' => 'App\Http\Controllers', 'as' => 'adminshop.'], function () {
        // Trang chủ
        Route::get('/', 'AdminAuthController@index')->name('index');

        // Trang đổi mật khẩu
        Route::get('/changePassword', 'AdminAuthController@changePass')->name('changepass');
        Route::post('/changePassword', 'AdminAuthController@postchangePass');

        // Trang QL Sản phẩm
        Route::group(['prefix' => 'products', 'as' => 'product.'], function () {
            Route::get('/', 'ProductController@index')->name('index');
            Route::get('/create', 'ProductController@create')->name('create');
            Route::post('/create', 'ProductController@postcreate')->name('postcreate');
            Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
            Route::post('/edit/{id}', 'ProductController@updateProduct')->name('postedit');
            Route::get('/delete/{id}', 'ProductController@delete')->name('delete');
        });

        // Trang QL Danh mục sp
        Route::group(['prefix' => 'productcategories', 'as' => 'productcategory.'], function () {
            Route::get('/', 'ProductCategoryController@index')->name('index');
            Route::get('/create', 'ProductCategoryController@create')->name('create');
            Route::post('/create', 'ProductCategoryController@postcreate')->name('postcreate');
            Route::get('/edit/{id}', 'ProductCategoryController@edit')->name('edit');
            Route::post('/edit/{id}', 'ProductCategoryController@updateCategory')->name('updatecategory');
            Route::get('/delete/{id}', 'ProductCategoryController@delete')->name('delete');
        });

        // Trang QL Nhà cung cấp
        Route::group(['prefix' => 'suppliers', 'as' => 'supplier.'], function () {
            Route::get('/', 'SupplierController@index')->name('index');
            Route::get('/create', 'SupplierController@create')->name('create');
            Route::post('/create', 'SupplierController@postcreate')->name('postcreate');
            Route::get('/edit/{id}', 'SupplierController@edit')->name('edit');
            Route::post('/edit/{id}', 'SupplierController@updateSupplier')->name('updateSupplier');
            Route::get('/delete/{id}', 'SupplierController@delete')->name('delete');
        });

        // Trang QL Nơi xuất xứ
        Route::group(['prefix' => 'trademarks', 'as' => 'trademark.'], function () {
            Route::get('/', 'TrademarkController@index')->name('index');
            Route::get('/create', 'TrademarkController@create')->name('create');
            Route::post('/create', 'TrademarkController@postcreate');
            Route::get('/edit/{id}', 'TrademarkController@edit')->name('edit');
            Route::post('/edit/{id}', 'TrademarkController@update');
            Route::get('/delete/{id}', 'TrademarkController@delete')->name('delete');
        });

        // Trang QL Đơn vị tính
        Route::group(['prefix' => 'units', 'as' => 'unit.'], function () {
            Route::get('/', 'UnitController@index')->name('index');
            Route::get('/create', 'UnitController@create')->name('create');
            Route::post('/create', 'UnitController@postcreate');
            Route::get('/edit/{id}', 'UnitController@edit')->name('edit');
            Route::post('/edit/{id}', 'UnitController@update');
            Route::get('/delete/{id}', 'UnitController@delete')->name('delete');
        });

        // Trang QL Khuyến mãi
        Route::group(['prefix' => 'promotions', 'as' => 'promotion.'], function () {
            Route::get('/', 'PromotionController@index')->name('index');
            Route::post('/', 'PromotionController@postindex')->name('postindex');
            Route::get('/create', 'PromotionController@create')->name('create');
            Route::post('/create', 'PromotionController@postcreate')->name('postcreate');
            Route::get('/edit/{id}', 'PromotionController@edit')->name('edit');
            Route::post('/edit/{id}', 'PromotionController@update');
            Route::post('/updateDiscordNull', 'PromotionController@updateDiscordNull')->name('updateDiscordNull');
            Route::get('/delete/{id}', 'PromotionController@delete')->name('delete');
        });

        // Trang QL Giỏ hàng
        Route::group(['prefix' => 'carts', 'as' => 'cart.'], function () {
            Route::get('/', 'ShopcartController@index')->name('index');
            Route::get('/{id}', 'ShopcartController@indexDetail')->name('detail');
        });

        //Trang QL Hóa đơn
        Route::group(['prefix' => 'invoices', 'as' => 'invoice.'], function () {
            Route::get('/', 'InvoiceController@index')->name('index');
            Route::post('/', 'InvoiceController@changeStatus')->name('changeStatus');
            Route::get('/detail/{id}', 'InvoiceController@detail')->name('detail');
            // Route::get('/delete/{id}', 'InvoiceController@delete')->name('delete');
        });

        // ----------------------------------FRONTEND----------------------------------------------
        // Trang QL Menu
        Route::group(['prefix' => 'menus', 'as' => 'menu.'], function () {
            Route::get('/', 'MenuController@index')->name('index');
            Route::get('/create', 'MenuController@create')->name('create');
            Route::post('/create', 'MenuController@postcreate')->name('postcreate');
            Route::group(['prefix' => 'menunotes', 'as' => 'menunote.'], function () {
                Route::get('/create', 'MenuNoteController@create')->name('create');
                Route::post('/create', 'MenuNoteController@postcreate')->name('postcreate');
            });
            Route::get('/edit/{id}', 'MenuController@edit')->name('edit');
            Route::post('/edit/{id}', 'MenuController@updateMenu')->name('updateMenu');
            Route::get('/detail/{id}', 'MenuController@detail')->name('detail');
            Route::get('/delete/{id}', 'MenuController@delete')->name('delete');
            Route::get('/deletenote/{id}', 'MenuController@deleteNote')->name('deletenote');
        });

        // Trang QL Slider
        Route::group(['prefix' => 'sliders', 'as' => 'slider.'], function () {
            Route::get('/', 'SliderController@index')->name('index');
            Route::get('/create', 'SliderController@create')->name('create');
            Route::post('/create', 'SliderController@postcreate')->name('postcreate');
            Route::get('/edit/{id}', 'SliderController@edit')->name('edit');
            Route::post('/edit/{id}', 'SliderController@updateSlider')->name('updateSlider');
            Route::get('/delete/{id}', 'SliderController@delete')->name('delete');
        });

        // Trang QL bài viết
        Route::group(['prefix' => 'posts', 'as' => 'post.'], function () {
            Route::get('/', 'PostController@index')->name('index');
            Route::get('/create', 'PostController@create')->name('create');
            Route::post('/create', 'PostController@postcreate')->name('postcreate');
            Route::get('/edit/{id}', 'PostController@edit')->name('edit');
            Route::post('/edit/{id}', 'PostController@updatePost')->name('updatePost');
            Route::get('/delete/{id}', 'PostController@delete')->name('delete');
            Route::group(['prefix' => 'categories', 'as' => 'category.'], function () {
                Route::get('/', 'PostController@category')->name('index');
                Route::get('/create', 'PostController@createCategory')->name('createcategory');
                Route::post('/create', 'PostController@postcreateCategory');
                Route::get('/edit/{id}', 'PostController@editCategory')->name('editCategory');
                Route::post('/edit/{id}', 'PostController@updateCategory')->name('updateCategory');
                Route::get('/delete/{id}', 'PostController@deleteCategory')->name('deleteCategory');
            });
        });

        // Trang QL Cmt
        Route::group(['prefix' => 'comments', 'as' => 'comment.'], function () {
            Route::get('/', 'CommentController@index')->name('index');
            Route::get('/delete/{id}', 'CommentController@delete')->name('delete');
        });

        // Trang QL Giỏ hàng
        // Route::group(['prefix' => 'comments', 'as' => 'comment.'], function () {
        //     Route::get('/', 'CommentController@index')->name('index');
        //     Route::get('/delete/{id}', 'CommentController@delete')->name('delete');
        // });
    });
});
