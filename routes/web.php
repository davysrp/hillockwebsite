<?php

use App\Models\Member;
use Illuminate\Support\Facades\Route;

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

Route::get('/page/{slug?}', 'FrontEndController@welcome')->name('welcome');
Route::get('/', 'FrontEndController@index')->name('home');
Route::get('/our-package/{slug?}', 'FrontEndController@package')->name('package');
Route::get('/suite-villa/{slug?}', 'FrontEndController@room')->name('room');
Route::get('/wellness-spa-detail/{slug?}', 'FrontEndController@spa')->name('spa');
Route::post('contact/', 'FrontEndController@contact')->name('contact');




Route::get('type/{slug}/{id}', 'FrontEndController@menu')->name('menu');
Route::get('/province/{id}/{slug}', 'FrontEndController@province')->name('province');
Route::get('/promotion/{id}', 'FrontEndController@promotion')->name('promotion');
Route::get('/category/{id}', 'FrontEndController@category')->name('category');
Route::get('/search', 'FrontEndController@search')->name('search');
Route::get('/tour-detail/{slug}/{id}', 'FrontEndController@productdetail')->name('productdetail');
Route::get('/user-register', 'FrontEndController@userregister')->name('userregister');
Route::get('/user-login', 'FrontEndController@userlogin')->name('userlogin');
Route::post('/user-action', 'FrontEndController@login')->name('userdologin');
Route::get('/user-phone-login', 'FrontEndController@userphonelogin')->name('userphonelogin');
Route::post('/do-phone-login', 'FrontEndController@phonelogin')->name('phonelogin');
Route::get('/user-reset-password', 'FrontEndController@userlogin')->name('user-reset-password');

Route::get('/clear-cache', function() {
    $exitCode = \Illuminate\Support\Facades\Artisan::call('cache:clear');
    // return what you want
});


Route::get('/blog', 'FrontEndController@blog')->name('blog');
Route::get('/loadmore/load_data', 'FrontEndController@load_data')->name('loadmore.load_data');
Route::get('/loadmore/load_data_cat/{id}', 'FrontEndController@load_data_by_cat')->name('loadmore.load_data_cat');
Route::get('/offer-detail/{id}', 'FrontEndController@blogdetail')->name('blogdetail');

Route::get('menu-page/{id}/{slug}', 'FrontEndController@menupage')->name('menupage');




//Route::get('/ip', 'FrontEndController@getIP');
/*Route::get('/sample-login', function (){
    $user = Member::where('phonenumber', '+855966663656')->first();
    $auth=\Illuminate\Support\Facades\Auth::guard('member')->login($user);
    if (Auth::guard('member')->check()) {
        echo 'Ok';
    }
});*/


Route::get('opt-district', function () {
    $dist = \App\Models\District::where('province_id', \Request::get('province_id'))->get();

    foreach ($dist as $item) {
        echo '<option value="' . $item->id . '">' . $item->name_kh . '</option>';
    }
})->name('opt-district');

Route::get('opt-commune', function () {
    $dist = \App\Models\Commune::where('district_id', \Request::get('province_id'))->get();

    foreach ($dist as $item) {
        echo '<option value="' . $item->id . '">' . $item->name_kh . '</option>';
    }
})->name('opt-commune');
Route::get('opt-village', function () {
    $dist = \App\Models\Village::where('commune_id', \Request::get('province_id'))->get();

    foreach ($dist as $item) {
        echo '<option value="' . $item->id . '">' . $item->name_kh . '</option>';
    }
})->name('opt-village');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('phone-auth', [PhoneAuthController::class, 'index']);


Route::get('/greeting/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'kh'])) {
        abort(400);
    }

    $lang = \Illuminate\Support\Facades\App::setLocale($locale);
    echo $lang;
    //
});


Auth::routes();
//auth:admin

Route::middleware(['auth:member'])->group(function () {

    Route::get('/user-property', 'ProfileController@userproperty')->name('userproperty');
    Route::post('/update-user-profile/{id}', 'ProfileController@updateuserprofile')->name('updateuserprofile');
    Route::post('/update-user-password/{id}', 'ProfileController@updatepassword')->name('updatepassword');
    Route::get('/add-property', 'ProfileController@addproperty')->name('addproperty');
    Route::get('/edit-property/{id}', 'ProfileController@editproperty')->name('editproperty');
    Route::post('/update-property/{id}', 'ProfileController@updateproperty')->name('updateproperty');

    Route::post('/save-property', 'ProfileController@saveProperty')->name('saveProperty');
    Route::DELETE('/remove-property/{id}', 'ProfileController@removeProperty')->name('removeProperty');
    Route::get('/remove-photo/{id}', 'ProfileController@removePhoto')->name('remove-photo');


    Route::get('/user-profile', 'ProfileController@userprofile')->name('user-profile');
    Route::get('/user-logout', 'ProfileController@logout')->name('user-logout');
    Route::get('/user-password', 'ProfileController@dashboard')->name('user-dashboard');
    Route::get('/user-edit', 'ProfileController@useredit')->name('user-edit');
    Route::get('/user-wishlist', 'ProfileController@wishlist')->name('wishlist');
    Route::get('/user-review', 'ProfileController@review')->name('review');
    Route::get('/user-order', 'ProfileController@order')->name('order');
    Route::get('/user-checkout', 'ProfileController@checkout')->name('checkout');
    Route::get('/user-checkout-pay', 'ProfileController@checkoutpay')->name('checkoutpay');
    Route::get('/user-add-cart/{id}', 'ProfileController@addcart')->name('addcart');
    Route::get('/user-update-cart', 'ProfileController@updatecard')->name('updatecart');
    Route::get('/user-remove-cart', 'ProfileController@removecard')->name('removecard');
});

Route::middleware(['auth:web'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::group([
            'prefix' => 'settings',
        ], function () {
            Route::get('/', 'SettingsController@index')
                ->name('settings.setting.index');
            Route::get('/create','SettingsController@create')
                ->name('settings.setting.create');
            Route::get('/show/{setting}','SettingsController@show')
                ->name('settings.setting.show')->where('id', '[0-9]+');
            Route::get('/{setting}/edit','SettingsController@edit')
                ->name('settings.setting.edit')->where('id', '[0-9]+');
            Route::post('/', 'SettingsController@store')
                ->name('settings.setting.store');
            Route::put('setting/{setting}', 'SettingsController@update')
                ->name('settings.setting.update')->where('id', '[0-9]+');
            Route::delete('/setting/{setting}','SettingsController@destroy')
                ->name('settings.setting.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'types',
        ], function () {
            Route::get('/', 'TypesController@index')
                ->name('types.type.index');
            Route::get('/create', 'TypesController@create')
                ->name('types.type.create');
            Route::get('/show/{type}', 'TypesController@show')
                ->name('types.type.show')->where('id', '[0-9]+');
            Route::get('/{type}/edit', 'TypesController@edit')
                ->name('types.type.edit')->where('id', '[0-9]+');
            Route::post('/', 'TypesController@store')
                ->name('types.type.store');
            Route::put('type/{type}', 'TypesController@update')
                ->name('types.type.update')->where('id', '[0-9]+');
            Route::delete('/type/{type}', 'TypesController@destroy')
                ->name('types.type.destroy')->where('id', '[0-9]+');

        });

        Route::group([
            'prefix' => 'users',
        ], function () {
            Route::get('/', 'UsersController@index')
                ->name('users.user.index');
            Route::get('/create', 'UsersController@create')
                ->name('users.user.create');
            Route::get('/show/{user}', 'UsersController@show')
                ->name('users.user.show');
            Route::get('/{user}/edit', 'UsersController@edit')
                ->name('users.user.edit');
            Route::post('/', 'UsersController@store')
                ->name('users.user.store');
            Route::put('user/{user}', 'UsersController@update')
                ->name('users.user.update');
            Route::delete('/user/{user}', 'UsersController@destroy')
                ->name('users.user.destroy');
        });

        Route::group([
            'prefix' => 'subscriber',
        ], function () {
            Route::get('/', 'SubscriberController@index')
                ->name('subscribers.subscriber.index');
            Route::get('/create', 'SubscriberController@create')
                ->name('subscribers.subscriber.create');
            Route::get('/show/{user}', 'SubscriberController@show')
                ->name('subscribers.subscriber.show');
            Route::get('/{user}/edit', 'SubscriberController@edit')
                ->name('subscribers.subscriber.edit');
            Route::post('/', 'SubscriberController@store')
                ->name('subscribers.subscriber.store');
            Route::put('user/{user}', 'SubscriberController@update')
                ->name('subscribers.subscriber.update');
            Route::delete('/user/{user}', 'SubscriberController@destroy')
                ->name('subscribers.subscriber.destroy');
        });


        Route::group([
            'prefix' => 'promotions',
        ], function () {
            Route::get('/', 'PromotionsController@index')
                ->name('promotions.promotion.index');
            Route::get('/create', 'PromotionsController@create')
                ->name('promotions.promotion.create');
            Route::get('/show/{promotion}', 'PromotionsController@show')
                ->name('promotions.promotion.show')->where('id', '[0-9]+');
            Route::get('/{promotion}/edit', 'PromotionsController@edit')
                ->name('promotions.promotion.edit')->where('id', '[0-9]+');
            Route::post('/', 'PromotionsController@store')
                ->name('promotions.promotion.store');
            Route::put('promotion/{promotion}', 'PromotionsController@update')
                ->name('promotions.promotion.update')->where('id', '[0-9]+');
            Route::delete('/promotion/{promotion}', 'PromotionsController@destroy')
                ->name('promotions.promotion.destroy')->where('id', '[0-9]+');
            Route::post('files', 'FileController@uploadfile')->name('file.store');
            Route::post('files/remove', 'FileController@remvoeFile')->name('file.remove');
        });
        Route::group([
            'prefix' => 'menu_bars',
        ], function () {
            Route::get('/', 'MenuBarsController@index')
                ->name('menu_bars.menu_bar.index');
            Route::get('/create', 'MenuBarsController@create')
                ->name('menu_bars.menu_bar.create');
            Route::get('/show/{menuBar}', 'MenuBarsController@show')
                ->name('menu_bars.menu_bar.show')->where('id', '[0-9]+');
            Route::get('/{menuBar}/edit', 'MenuBarsController@edit')
                ->name('menu_bars.menu_bar.edit')->where('id', '[0-9]+');
            Route::post('/', 'MenuBarsController@store')
                ->name('menu_bars.menu_bar.store');
            Route::put('menu_bar/{menuBar}', 'MenuBarsController@update')
                ->name('menu_bars.menu_bar.update')->where('id', '[0-9]+');
            Route::delete('/menu_bar/{menuBar}', 'MenuBarsController@destroy')
                ->name('menu_bars.menu_bar.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'labels',
        ], function () {
            Route::get('/', 'LabelsController@index')
                ->name('labels.label.index');
            Route::get('/create', 'LabelsController@create')
                ->name('labels.label.create');
            Route::get('/show/{label}', 'LabelsController@show')
                ->name('labels.label.show')->where('id', '[0-9]+');
            Route::get('/{label}/edit', 'LabelsController@edit')
                ->name('labels.label.edit')->where('id', '[0-9]+');
            Route::post('/', 'LabelsController@store')
                ->name('labels.label.store');
            Route::put('label/{label}', 'LabelsController@update')
                ->name('labels.label.update')->where('id', '[0-9]+');
            Route::delete('/label/{label}', 'LabelsController@destroy')
                ->name('labels.label.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'results',
        ], function () {
            Route::get('/', 'ResultsController@index')
                ->name('results.results.index');
            Route::get('/create', 'ResultsController@create')
                ->name('results.results.create');
            Route::get('/show/{results}', 'ResultsController@show')
                ->name('results.results.show')->where('id', '[0-9]+');
            Route::get('/{results}/edit', 'ResultsController@edit')
                ->name('results.results.edit')->where('id', '[0-9]+');
            Route::post('/', 'ResultsController@store')
                ->name('results.results.store');
            Route::put('results/{results}', 'ResultsController@update')
                ->name('results.results.update')->where('id', '[0-9]+');
            Route::delete('/results/{results}', 'ResultsController@destroy')
                ->name('results.results.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'type_labels',
        ], function () {
            Route::get('/', 'TypeLabelsController@index')
                ->name('type_labels.type_label.index');
            Route::get('/create', 'TypeLabelsController@create')
                ->name('type_labels.type_label.create');
            Route::get('/show/{typeLabel}', 'TypeLabelsController@show')
                ->name('type_labels.type_label.show')->where('id', '[0-9]+');
            Route::get('/{typeLabel}/edit', 'TypeLabelsController@edit')
                ->name('type_labels.type_label.edit')->where('id', '[0-9]+');
            Route::post('/', 'TypeLabelsController@store')
                ->name('type_labels.type_label.store');
            Route::put('type_label/{typeLabel}', 'TypeLabelsController@update')
                ->name('type_labels.type_label.update')->where('id', '[0-9]+');
            Route::delete('/type_label/{typeLabel}', 'TypeLabelsController@destroy')
                ->name('type_labels.type_label.destroy')->where('id', '[0-9]+');
        });



        Route::group([
            'prefix' => 'categories',
        ], function () {
            Route::get('/', 'CategoriesController@index')
                ->name('categories.category.index');
            Route::get('/create', 'CategoriesController@create')
                ->name('categories.category.create');
            Route::get('/show/{category}', 'CategoriesController@show')
                ->name('categories.category.show')->where('id', '[0-9]+');
            Route::get('/{category}/edit', 'CategoriesController@edit')
                ->name('categories.category.edit')->where('id', '[0-9]+');
            Route::post('/', 'CategoriesController@store')
                ->name('categories.category.store');
            Route::put('category/{category}', 'CategoriesController@update')
                ->name('categories.category.update')->where('id', '[0-9]+');
            Route::delete('/category/{category}', 'CategoriesController@destroy')
                ->name('categories.category.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'products',
        ], function () {
            Route::get('/', 'ProductsController@index')
                ->name('products.product.index');
            Route::get('/create', 'ProductsController@create')
                ->name('products.product.create');
            Route::get('/show/{product}', 'ProductsController@show')
                ->name('products.product.show')->where('id', '[0-9]+');
            Route::get('/{product}/edit', 'ProductsController@edit')
                ->name('products.product.edit')->where('id', '[0-9]+');
            Route::post('/', 'ProductsController@store')
                ->name('products.product.store');
            Route::put('product/{product}', 'ProductsController@update')
                ->name('products.product.update')->where('id', '[0-9]+');
            Route::delete('/product/{product}', 'ProductsController@destroy')
                ->name('products.product.destroy')->where('id', '[0-9]+');
            Route::get('/remove-photo/{id}', 'ProductsController@removePhoto')
                ->name('products.product.removephoto');
        });
        Route::group([
            'prefix' => 'product_photos',
        ], function () {
            Route::get('/', 'ProductPhotosController@index')
                ->name('product_photos.product_photo.index');
            Route::get('/create', 'ProductPhotosController@create')
                ->name('product_photos.product_photo.create');
            Route::get('/show/{productPhoto}', 'ProductPhotosController@show')
                ->name('product_photos.product_photo.show')->where('id', '[0-9]+');
            Route::get('/{productPhoto}/edit', 'ProductPhotosController@edit')
                ->name('product_photos.product_photo.edit')->where('id', '[0-9]+');
            Route::post('/', 'ProductPhotosController@store')
                ->name('product_photos.product_photo.store');
            Route::put('product_photo/{productPhoto}', 'ProductPhotosController@update')
                ->name('product_photos.product_photo.update')->where('id', '[0-9]+');
            Route::delete('/product_photo/{productPhoto}', 'ProductPhotosController@destroy')
                ->name('product_photos.product_photo.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'product_colors',
        ], function () {
            Route::get('/', 'ProductColorsController@index')
                ->name('product_colors.product_color.index');
            Route::get('/create', 'ProductColorsController@create')
                ->name('product_colors.product_color.create');
            Route::get('/show/{productColor}', 'ProductColorsController@show')
                ->name('product_colors.product_color.show')->where('id', '[0-9]+');
            Route::get('/{productColor}/edit', 'ProductColorsController@edit')
                ->name('product_colors.product_color.edit')->where('id', '[0-9]+');
            Route::post('/', 'ProductColorsController@store')
                ->name('product_colors.product_color.store');
            Route::put('product_color/{productColor}', 'ProductColorsController@update')
                ->name('product_colors.product_color.update')->where('id', '[0-9]+');
            Route::delete('/product_color/{productColor}', 'ProductColorsController@destroy')
                ->name('product_colors.product_color.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'product_sizes',
        ], function () {
            Route::get('/', 'ProductSizesController@index')
                ->name('product_sizes.product_size.index');
            Route::get('/create', 'ProductSizesController@create')
                ->name('product_sizes.product_size.create');
            Route::get('/show/{productSize}', 'ProductSizesController@show')
                ->name('product_sizes.product_size.show')->where('id', '[0-9]+');
            Route::get('/{productSize}/edit', 'ProductSizesController@edit')
                ->name('product_sizes.product_size.edit')->where('id', '[0-9]+');
            Route::post('/', 'ProductSizesController@store')
                ->name('product_sizes.product_size.store');
            Route::put('product_size/{productSize}', 'ProductSizesController@update')
                ->name('product_sizes.product_size.update')->where('id', '[0-9]+');
            Route::delete('/product_size/{productSize}', 'ProductSizesController@destroy')
                ->name('product_sizes.product_size.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'payments',
        ], function () {
            Route::get('/', 'PaymentsController@index')
                ->name('payments.payment.index');
            Route::get('/create', 'PaymentsController@create')
                ->name('payments.payment.create');
            Route::get('/show/{payment}', 'PaymentsController@show')
                ->name('payments.payment.show')->where('id', '[0-9]+');
            Route::get('/{payment}/edit', 'PaymentsController@edit')
                ->name('payments.payment.edit')->where('id', '[0-9]+');
            Route::post('/', 'PaymentsController@store')
                ->name('payments.payment.store');
            Route::put('payment/{payment}', 'PaymentsController@update')
                ->name('payments.payment.update')->where('id', '[0-9]+');
            Route::delete('/payment/{payment}', 'PaymentsController@destroy')
                ->name('payments.payment.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'coupons',
        ], function () {
            Route::get('/', 'CouponsController@index')
                ->name('coupons.coupon.index');
            Route::get('/create', 'CouponsController@create')
                ->name('coupons.coupon.create');
            Route::get('/show/{coupon}', 'CouponsController@show')
                ->name('coupons.coupon.show')->where('id', '[0-9]+');
            Route::get('/{coupon}/edit', 'CouponsController@edit')
                ->name('coupons.coupon.edit')->where('id', '[0-9]+');
            Route::post('/', 'CouponsController@store')
                ->name('coupons.coupon.store');
            Route::put('coupon/{coupon}', 'CouponsController@update')
                ->name('coupons.coupon.update')->where('id', '[0-9]+');
            Route::delete('/coupon/{coupon}', 'CouponsController@destroy')
                ->name('coupons.coupon.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'product_reviews',
        ], function () {
            Route::get('/', 'ProductReviewsController@index')
                ->name('product_reviews.product_review.index');
            Route::get('/create', 'ProductReviewsController@create')
                ->name('product_reviews.product_review.create');
            Route::get('/show/{productReview}', 'ProductReviewsController@show')
                ->name('product_reviews.product_review.show')->where('id', '[0-9]+');
            Route::get('/{productReview}/edit', 'ProductReviewsController@edit')
                ->name('product_reviews.product_review.edit')->where('id', '[0-9]+');
            Route::post('/', 'ProductReviewsController@store')
                ->name('product_reviews.product_review.store');
            Route::put('product_review/{productReview}', 'ProductReviewsController@update')
                ->name('product_reviews.product_review.update')->where('id', '[0-9]+');
            Route::delete('/product_review/{productReview}', 'ProductReviewsController@destroy')
                ->name('product_reviews.product_review.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'admins',
        ], function () {
            Route::get('/', 'AdminsController@index')
                ->name('admins.admin.index');
            Route::get('/create', 'AdminsController@create')
                ->name('admins.admin.create');
            Route::get('/show/{admin}', 'AdminsController@show')
                ->name('admins.admin.show');
            Route::get('/{admin}/edit', 'AdminsController@edit')
                ->name('admins.admin.edit');
            Route::post('/', 'AdminsController@store')
                ->name('admins.admin.store');
            Route::put('admin/{admin}', 'AdminsController@update')
                ->name('admins.admin.update');
            Route::delete('/admin/{admin}', 'AdminsController@destroy')
                ->name('admins.admin.destroy');
        });
        Route::group([
            'prefix' => 'blog_categories',
        ], function () {
            Route::get('/', 'BlogCategoriesController@index')
                ->name('blog_categories.blog_category.index');
            Route::get('/create', 'BlogCategoriesController@create')
                ->name('blog_categories.blog_category.create');
            Route::get('/show/{blogCategory}', 'BlogCategoriesController@show')
                ->name('blog_categories.blog_category.show')->where('id', '[0-9]+');
            Route::get('/{blogCategory}/edit', 'BlogCategoriesController@edit')
                ->name('blog_categories.blog_category.edit')->where('id', '[0-9]+');
            Route::post('/', 'BlogCategoriesController@store')
                ->name('blog_categories.blog_category.store');
            Route::put('blog_category/{blogCategory}', 'BlogCategoriesController@update')
                ->name('blog_categories.blog_category.update')->where('id', '[0-9]+');
            Route::delete('/blog_category/{blogCategory}', 'BlogCategoriesController@destroy')
                ->name('blog_categories.blog_category.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'blogs',
        ], function () {
            Route::get('/', 'BlogsController@index')
                ->name('blogs.blog.index');
            Route::get('/create', 'BlogsController@create')
                ->name('blogs.blog.create');
            Route::get('/show/{blog}', 'BlogsController@show')
                ->name('blogs.blog.show')->where('id', '[0-9]+');
            Route::get('/{blog}/edit', 'BlogsController@edit')
                ->name('blogs.blog.edit')->where('id', '[0-9]+');
            Route::post('/', 'BlogsController@store')
                ->name('blogs.blog.store');
            Route::put('blog/{blog}', 'BlogsController@update')
                ->name('blogs.blog.update')->where('id', '[0-9]+');
            Route::delete('/blog/{blog}', 'BlogsController@destroy')
                ->name('blogs.blog.destroy')->where('id', '[0-9]+');
        });
        Route::group([
            'prefix' => 'provinces',
        ], function () {
            Route::get('/', 'ProvincesController@index')
                ->name('provinces.province.index');
            Route::get('/create', 'ProvincesController@create')
                ->name('provinces.province.create');
            Route::get('/show/{province}', 'ProvincesController@show')
                ->name('provinces.province.show')->where('id', '[0-9]+');
            Route::get('/{province}/edit', 'ProvincesController@edit')
                ->name('provinces.province.edit')->where('id', '[0-9]+');
            Route::post('/', 'ProvincesController@store')
                ->name('provinces.province.store');
            Route::put('province/{province}', 'ProvincesController@update')
                ->name('provinces.province.update')->where('id', '[0-9]+');
            Route::delete('/province/{province}', 'ProvincesController@destroy')
                ->name('provinces.province.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'features',
        ], function () {
            Route::get('/', 'FeaturesController@index')
                ->name('features.feature.index');
            Route::get('/create', 'FeaturesController@create')
                ->name('features.feature.create');
            Route::get('/show/{feature}', 'FeaturesController@show')
                ->name('features.feature.show')->where('id', '[0-9]+');
            Route::get('/{feature}/edit', 'FeaturesController@edit')
                ->name('features.feature.edit')->where('id', '[0-9]+');
            Route::post('/', 'FeaturesController@store')
                ->name('features.feature.store');
            Route::put('feature/{feature}', 'FeaturesController@update')
                ->name('features.feature.update')->where('id', '[0-9]+');
            Route::delete('/feature/{feature}', 'FeaturesController@destroy')
                ->name('features.feature.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'amenities',
        ], function () {
            Route::get('/', 'AmenitiesController@index')
                ->name('amenities.amenity.index');
            Route::get('/create', 'AmenitiesController@create')
                ->name('amenities.amenity.create');
            Route::get('/show/{amenity}', 'AmenitiesController@show')
                ->name('amenities.amenity.show')->where('id', '[0-9]+');
            Route::get('/{amenity}/edit', 'AmenitiesController@edit')
                ->name('amenities.amenity.edit')->where('id', '[0-9]+');
            Route::post('/', 'AmenitiesController@store')
                ->name('amenities.amenity.store');
            Route::put('amenity/{amenity}', 'AmenitiesController@update')
                ->name('amenities.amenity.update')->where('id', '[0-9]+');
            Route::delete('/amenity/{amenity}', 'AmenitiesController@destroy')
                ->name('amenities.amenity.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'securities',
        ], function () {
            Route::get('/', 'SecuritiesController@index')
                ->name('securities.security.index');
            Route::get('/create', 'SecuritiesController@create')
                ->name('securities.security.create');
            Route::get('/show/{security}', 'SecuritiesController@show')
                ->name('securities.security.show')->where('id', '[0-9]+');
            Route::get('/{security}/edit', 'SecuritiesController@edit')
                ->name('securities.security.edit')->where('id', '[0-9]+');
            Route::post('/', 'SecuritiesController@store')
                ->name('securities.security.store');
            Route::put('security/{security}', 'SecuritiesController@update')
                ->name('securities.security.update')->where('id', '[0-9]+');
            Route::delete('/security/{security}', 'SecuritiesController@destroy')
                ->name('securities.security.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'product_features',
        ], function () {
            Route::get('/', 'ProductFeaturesController@index')
                ->name('product_features.product_feature.index');
            Route::get('/create', 'ProductFeaturesController@create')
                ->name('product_features.product_feature.create');
            Route::get('/show/{productFeature}', 'ProductFeaturesController@show')
                ->name('product_features.product_feature.show')->where('id', '[0-9]+');
            Route::get('/{productFeature}/edit', 'ProductFeaturesController@edit')
                ->name('product_features.product_feature.edit')->where('id', '[0-9]+');
            Route::post('/', 'ProductFeaturesController@store')
                ->name('product_features.product_feature.store');
            Route::put('product_feature/{productFeature}', 'ProductFeaturesController@update')
                ->name('product_features.product_feature.update')->where('id', '[0-9]+');
            Route::delete('/product_feature/{productFeature}', 'ProductFeaturesController@destroy')
                ->name('product_features.product_feature.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'product_amenities',
        ], function () {
            Route::get('/', 'ProductAmenitiesController@index')
                ->name('product_amenities.product_amenity.index');
            Route::get('/create', 'ProductAmenitiesController@create')
                ->name('product_amenities.product_amenity.create');
            Route::get('/show/{productAmenity}', 'ProductAmenitiesController@show')
                ->name('product_amenities.product_amenity.show')->where('id', '[0-9]+');
            Route::get('/{productAmenity}/edit', 'ProductAmenitiesController@edit')
                ->name('product_amenities.product_amenity.edit')->where('id', '[0-9]+');
            Route::post('/', 'ProductAmenitiesController@store')
                ->name('product_amenities.product_amenity.store');
            Route::put('product_amenity/{productAmenity}', 'ProductAmenitiesController@update')
                ->name('product_amenities.product_amenity.update')->where('id', '[0-9]+');
            Route::delete('/product_amenity/{productAmenity}', 'ProductAmenitiesController@destroy')
                ->name('product_amenities.product_amenity.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'product_securities',
        ], function () {
            Route::get('/', 'ProductSecuritiesController@index')
                ->name('product_securities.product_security.index');
            Route::get('/create', 'ProductSecuritiesController@create')
                ->name('product_securities.product_security.create');
            Route::get('/show/{productSecurity}', 'ProductSecuritiesController@show')
                ->name('product_securities.product_security.show')->where('id', '[0-9]+');
            Route::get('/{productSecurity}/edit', 'ProductSecuritiesController@edit')
                ->name('product_securities.product_security.edit')->where('id', '[0-9]+');
            Route::post('/', 'ProductSecuritiesController@store')
                ->name('product_securities.product_security.store');
            Route::put('product_security/{productSecurity}', 'ProductSecuritiesController@update')
                ->name('product_securities.product_security.update')->where('id', '[0-9]+');
            Route::delete('/product_security/{productSecurity}', 'ProductSecuritiesController@destroy')
                ->name('product_securities.product_security.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'sponsores',
        ], function () {
            Route::get('/', 'SponsoresController@index')
                ->name('sponsores.sponsore.index');
            Route::get('/create', 'SponsoresController@create')
                ->name('sponsores.sponsore.create');
            Route::get('/show/{sponsore}', 'SponsoresController@show')
                ->name('sponsores.sponsore.show')->where('id', '[0-9]+');
            Route::get('/{sponsore}/edit', 'SponsoresController@edit')
                ->name('sponsores.sponsore.edit')->where('id', '[0-9]+');
            Route::post('/', 'SponsoresController@store')
                ->name('sponsores.sponsore.store');
            Route::put('sponsore/{sponsore}', 'SponsoresController@update')
                ->name('sponsores.sponsore.update')->where('id', '[0-9]+');
            Route::delete('/sponsore/{sponsore}', 'SponsoresController@destroy')
                ->name('sponsores.sponsore.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'views',
        ], function () {
            Route::get('/', 'ViewsController@index')
                ->name('views.view.index');
            Route::get('/create', 'ViewsController@create')
                ->name('views.view.create');
            Route::get('/show/{view}', 'ViewsController@show')
                ->name('views.view.show')->where('id', '[0-9]+');
            Route::get('/{view}/edit', 'ViewsController@edit')
                ->name('views.view.edit')->where('id', '[0-9]+');
            Route::post('/', 'ViewsController@store')
                ->name('views.view.store');
            Route::put('view/{view}', 'ViewsController@update')
                ->name('views.view.update')->where('id', '[0-9]+');
            Route::delete('/view/{view}', 'ViewsController@destroy')
                ->name('views.view.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'product_views',
        ], function () {
            Route::get('/', 'ProductViewsController@index')
                ->name('product_views.product_view.index');
            Route::get('/create', 'ProductViewsController@create')
                ->name('product_views.product_view.create');
            Route::get('/show/{productView}', 'ProductViewsController@show')
                ->name('product_views.product_view.show')->where('id', '[0-9]+');
            Route::get('/{productView}/edit', 'ProductViewsController@edit')
                ->name('product_views.product_view.edit')->where('id', '[0-9]+');
            Route::post('/', 'ProductViewsController@store')
                ->name('product_views.product_view.store');
            Route::put('product_view/{productView}', 'ProductViewsController@update')
                ->name('product_views.product_view.update')->where('id', '[0-9]+');
            Route::delete('/product_view/{productView}', 'ProductViewsController@destroy')
                ->name('product_views.product_view.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'districts',
        ], function () {
            Route::get('/', 'DistrictsController@index')
                ->name('districts.district.index');
            Route::get('/create', 'DistrictsController@create')
                ->name('districts.district.create');
            Route::get('/show/{district}', 'DistrictsController@show')
                ->name('districts.district.show')->where('id', '[0-9]+');
            Route::get('/{district}/edit', 'DistrictsController@edit')
                ->name('districts.district.edit')->where('id', '[0-9]+');
            Route::post('/', 'DistrictsController@store')
                ->name('districts.district.store');
            Route::put('district/{district}', 'DistrictsController@update')
                ->name('districts.district.update')->where('id', '[0-9]+');
            Route::delete('/district/{district}', 'DistrictsController@destroy')
                ->name('districts.district.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'communes',
        ], function () {
            Route::get('/', 'CommunesController@index')
                ->name('communes.commune.index');
            Route::get('/create', 'CommunesController@create')
                ->name('communes.commune.create');
            Route::get('/show/{commune}', 'CommunesController@show')
                ->name('communes.commune.show')->where('id', '[0-9]+');
            Route::get('/{commune}/edit', 'CommunesController@edit')
                ->name('communes.commune.edit')->where('id', '[0-9]+');
            Route::post('/', 'CommunesController@store')
                ->name('communes.commune.store');
            Route::put('commune/{commune}', 'CommunesController@update')
                ->name('communes.commune.update')->where('id', '[0-9]+');
            Route::delete('/commune/{commune}', 'CommunesController@destroy')
                ->name('communes.commune.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'villages',
        ], function () {
            Route::get('/', 'VillagesController@index')
                ->name('villages.village.index');
            Route::get('/create', 'VillagesController@create')
                ->name('villages.village.create');
            Route::get('/show/{village}', 'VillagesController@show')
                ->name('villages.village.show')->where('id', '[0-9]+');
            Route::get('/{village}/edit', 'VillagesController@edit')
                ->name('villages.village.edit')->where('id', '[0-9]+');
            Route::post('/', 'VillagesController@store')
                ->name('villages.village.store');
            Route::put('village/{village}', 'VillagesController@update')
                ->name('villages.village.update')->where('id', '[0-9]+');
            Route::delete('/village/{village}', 'VillagesController@destroy')
                ->name('villages.village.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'rooms',
        ], function () {
            Route::get('/', 'RoomsController@index')
                ->name('rooms.room.index');
            Route::get('/create','RoomsController@create')
                ->name('rooms.room.create');
            Route::get('/show/{room}','RoomsController@show')
                ->name('rooms.room.show')->where('id', '[0-9]+');
            Route::get('/{room}/edit','RoomsController@edit')
                ->name('rooms.room.edit')->where('id', '[0-9]+');
            Route::post('/', 'RoomsController@store')
                ->name('rooms.room.store');
            Route::put('room/{room}', 'RoomsController@update')
                ->name('rooms.room.update')->where('id', '[0-9]+');
            Route::delete('/room/{room}','RoomsController@destroy')
                ->name('rooms.room.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'room_photos',
        ], function () {
            Route::get('/', 'RoomPhotosController@index')
                ->name('room_photos.room_photo.index');
            Route::get('/create','RoomPhotosController@create')
                ->name('room_photos.room_photo.create');
            Route::get('/show/{roomPhoto}','RoomPhotosController@show')
                ->name('room_photos.room_photo.show')->where('id', '[0-9]+');
            Route::get('/{roomPhoto}/edit','RoomPhotosController@edit')
                ->name('room_photos.room_photo.edit')->where('id', '[0-9]+');
            Route::post('/', 'RoomPhotosController@store')
                ->name('room_photos.room_photo.store');
            Route::put('room_photo/{roomPhoto}', 'RoomPhotosController@update')
                ->name('room_photos.room_photo.update')->where('id', '[0-9]+');
            Route::delete('/room_photo/{roomPhoto}','RoomPhotosController@destroy')
                ->name('room_photos.room_photo.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'packages',
        ], function () {
            Route::get('/', 'PackagesController@index')
                ->name('packages.package.index');
            Route::get('/create','PackagesController@create')
                ->name('packages.package.create');
            Route::get('/show/{package}','PackagesController@show')
                ->name('packages.package.show')->where('id', '[0-9]+');
            Route::get('/{package}/edit','PackagesController@edit')
                ->name('packages.package.edit')->where('id', '[0-9]+');
            Route::post('/', 'PackagesController@store')
                ->name('packages.package.store');
            Route::put('package/{package}', 'PackagesController@update')
                ->name('packages.package.update')->where('id', '[0-9]+');
            Route::delete('/package/{package}','PackagesController@destroy')
                ->name('packages.package.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'facilities',
        ], function () {
            Route::get('/', 'FacilitiesController@index')
                ->name('facilities.facility.index');
            Route::get('/create','FacilitiesController@create')
                ->name('facilities.facility.create');
            Route::get('/show/{facility}','FacilitiesController@show')
                ->name('facilities.facility.show')->where('id', '[0-9]+');
            Route::get('/{facility}/edit','FacilitiesController@edit')
                ->name('facilities.facility.edit')->where('id', '[0-9]+');
            Route::post('/', 'FacilitiesController@store')
                ->name('facilities.facility.store');
            Route::put('facility/{facility}', 'FacilitiesController@update')
                ->name('facilities.facility.update')->where('id', '[0-9]+');
            Route::delete('/facility/{facility}','FacilitiesController@destroy')
                ->name('facilities.facility.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'galleries',
        ], function () {
            Route::get('/', 'GalleriesController@index')
                ->name('galleries.gallery.index');
            Route::get('/create','GalleriesController@create')
                ->name('galleries.gallery.create');
            Route::get('/show/{gallery}','GalleriesController@show')
                ->name('galleries.gallery.show')->where('id', '[0-9]+');
            Route::get('/{gallery}/edit','GalleriesController@edit')
                ->name('galleries.gallery.edit')->where('id', '[0-9]+');
            Route::post('/', 'GalleriesController@store')
                ->name('galleries.gallery.store');
            Route::put('gallery/{gallery}', 'GalleriesController@update')
                ->name('galleries.gallery.update')->where('id', '[0-9]+');
            Route::delete('/gallery/{gallery}','GalleriesController@destroy')
                ->name('galleries.gallery.destroy')->where('id', '[0-9]+');
        });


        Route::group([
            'prefix' => 'menu_bar_galleries',
        ], function () {
            Route::get('/', 'MenuBarGalleriesController@index')
                ->name('menu_bar_galleries.menu_bar_gallery.index');
            Route::get('/create','MenuBarGalleriesController@create')
                ->name('menu_bar_galleries.menu_bar_gallery.create');
            Route::get('/show/{menuBarGallery}','MenuBarGalleriesController@show')
                ->name('menu_bar_galleries.menu_bar_gallery.show')->where('id', '[0-9]+');
            Route::get('/{menuBarGallery}/edit','MenuBarGalleriesController@edit')
                ->name('menu_bar_galleries.menu_bar_gallery.edit')->where('id', '[0-9]+');
            Route::post('/', 'MenuBarGalleriesController@store')
                ->name('menu_bar_galleries.menu_bar_gallery.store');
            Route::put('menu_bar_gallery/{menuBarGallery}', 'MenuBarGalleriesController@update')
                ->name('menu_bar_galleries.menu_bar_gallery.update')->where('id', '[0-9]+');
            Route::delete('/menu_bar_gallery/{menuBarGallery}','MenuBarGalleriesController@destroy')
                ->name('menu_bar_galleries.menu_bar_gallery.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'slides',
        ], function () {
            Route::get('/', 'SlidesController@index')
                ->name('slides.slide.index');
            Route::get('/create','SlidesController@create')
                ->name('slides.slide.create');
            Route::get('/show/{slide}','SlidesController@show')
                ->name('slides.slide.show')->where('id', '[0-9]+');
            Route::get('/{slide}/edit','SlidesController@edit')
                ->name('slides.slide.edit')->where('id', '[0-9]+');
            Route::post('/', 'SlidesController@store')
                ->name('slides.slide.store');
            Route::put('slide/{slide}', 'SlidesController@update')
                ->name('slides.slide.update')->where('id', '[0-9]+');
            Route::delete('/slide/{slide}','SlidesController@destroy')
                ->name('slides.slide.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'package_photos',
        ], function () {
            Route::get('/', 'PackagePhotosController@index')
                ->name('package_photos.package_photo.index');
            Route::get('/create','PackagePhotosController@create')
                ->name('package_photos.package_photo.create');
            Route::get('/show/{packagePhoto}','PackagePhotosController@show')
                ->name('package_photos.package_photo.show')->where('id', '[0-9]+');
            Route::get('/{packagePhoto}/edit','PackagePhotosController@edit')
                ->name('package_photos.package_photo.edit')->where('id', '[0-9]+');
            Route::post('/', 'PackagePhotosController@store')
                ->name('package_photos.package_photo.store');
            Route::put('package_photo/{packagePhoto}', 'PackagePhotosController@update')
                ->name('package_photos.package_photo.update')->where('id', '[0-9]+');
            Route::delete('/package_photo/{packagePhoto}','PackagePhotosController@destroy')
                ->name('package_photos.package_photo.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'dinings',
        ], function () {
            Route::get('/', 'DiningsController@index')
                ->name('dinings.dining.index');
            Route::get('/create','DiningsController@create')
                ->name('dinings.dining.create');
            Route::get('/show/{dining}','DiningsController@show')
                ->name('dinings.dining.show')->where('id', '[0-9]+');
            Route::get('/{dining}/edit','DiningsController@edit')
                ->name('dinings.dining.edit')->where('id', '[0-9]+');
            Route::post('/', 'DiningsController@store')
                ->name('dinings.dining.store');
            Route::put('dining/{dining}', 'DiningsController@update')
                ->name('dinings.dining.update')->where('id', '[0-9]+');
            Route::delete('/dining/{dining}','DiningsController@destroy')
                ->name('dinings.dining.destroy')->where('id', '[0-9]+');
        });


        Route::group([
            'prefix' => 'spas',
        ], function () {
            Route::get('/', 'SpasController@index')
                ->name('spas.spa.index');
            Route::get('/create','SpasController@create')
                ->name('spas.spa.create');
            Route::get('/show/{spa}','SpasController@show')
                ->name('spas.spa.show')->where('id', '[0-9]+');
            Route::get('/{spa}/edit','SpasController@edit')
                ->name('spas.spa.edit')->where('id', '[0-9]+');
            Route::post('/', 'SpasController@store')
                ->name('spas.spa.store');
            Route::put('spa/{spa}', 'SpasController@update')
                ->name('spas.spa.update')->where('id', '[0-9]+');
            Route::delete('/spa/{spa}','SpasController@destroy')
                ->name('spas.spa.destroy')->where('id', '[0-9]+');
        });
    });



});





