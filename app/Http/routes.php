<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/test', function() {
    return view('frontend.email.thanks');
});
Route::group(['prefix' => 'social-auth'], function () {
    Route::group(['prefix' => 'facebook'], function () {
        Route::get('redirect/', ['as' => 'fb-auth', 'uses' => 'SocialAuthController@redirect']);
        Route::get('callback/', ['as' => 'fb-callback', 'uses' => 'SocialAuthController@callback']);
        Route::post('fb-login', ['as' => 'ajax-login-by-fb', 'uses' => 'SocialAuthController@fbLogin']);
    });

    Route::group(['prefix' => 'google'], function () {
        Route::get('redirect/', ['as' => 'gg-auth', 'uses' => 'SocialAuthController@googleRedirect']);
        Route::get('callback/', ['as' => 'gg-callback', 'uses' => 'SocialAuthController@googleCallback']);
    });

});

Route::group(['prefix' => 'authentication'], function () {
    Route::post('check_login', ['as' => 'auth-login', 'uses' => 'AuthenticationController@checkLogin']);
    Route::post('login_ajax', ['as' =>  'auth-login-ajax', 'uses' => 'AuthenticationController@checkLoginAjax']);
    Route::get('/user-logout', ['as' => 'user-logout', 'uses' => 'AuthenticationController@logout']);
});



// Authentication routes...
Route::get('backend/login', ['as' => 'backend.login-form', 'uses' => 'Backend\UserController@loginForm']);
Route::post('backend/login', ['as' => 'backend.check-login', 'uses' => 'Backend\UserController@checkLogin']);
Route::get('backend/logout', ['as' => 'backend.logout', 'uses' => 'Backend\UserController@logout']);
Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'middleware' => 'isAdmin'], function()
{
    // Controllers Within The "App\Http\Controllers\Backend" Namespace
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', ['as' => 'settings.index', 'uses' => 'SettingsController@index']);
        Route::post('/update', ['as' => 'settings.update', 'uses' => 'SettingsController@update']);
    });
    Route::group(['prefix' => 'report'], function () {
        Route::get('/', ['as' => 'report.index', 'uses' => 'ReportController@index']);        
    });
    Route::group(['prefix' => 'pages'], function () {
        Route::get('/', ['as' => 'pages.index', 'uses' => 'PagesController@index']);
        Route::get('/create', ['as' => 'pages.create', 'uses' => 'PagesController@create']);
        Route::post('/store', ['as' => 'pages.store', 'uses' => 'PagesController@store']);
        Route::get('{id}/edit',   ['as' => 'pages.edit', 'uses' => 'PagesController@edit']);
        Route::post('/update', ['as' => 'pages.update', 'uses' => 'PagesController@update']);
        Route::get('{id}/destroy', ['as' => 'pages.destroy', 'uses' => 'PagesController@destroy']);
    });
    Route::group(['prefix' => 'info-seo'], function () {
        Route::get('/', ['as' => 'info-seo.index', 'uses' => 'InfoSeoController@index']);
        Route::get('/create', ['as' => 'info-seo.create', 'uses' => 'InfoSeoController@create']);
        Route::post('/store', ['as' => 'info-seo.store', 'uses' => 'InfoSeoController@store']);
        Route::get('{id}/edit',   ['as' => 'info-seo.edit', 'uses' => 'InfoSeoController@edit']);
        Route::post('/update', ['as' => 'info-seo.update', 'uses' => 'InfoSeoController@update']);
        Route::get('{id}/destroy', ['as' => 'info-seo.destroy', 'uses' => 'InfoSeoController@destroy']);
    });
    Route::group(['prefix' => 'newsletter'], function () {
        Route::get('/', ['as' => 'newsletter.index', 'uses' => 'NewsletterController@index']);
        Route::post('/store', ['as' => 'newsletter.store', 'uses' => 'NewsletterController@store']);
        Route::get('{id}/edit',   ['as' => 'newsletter.edit', 'uses' => 'NewsletterController@edit']);
        Route::post('/update', ['as' => 'newsletter.update', 'uses' => 'NewsletterController@update']);
        Route::get('{id}/destroy', ['as' => 'newsletter.destroy', 'uses' => 'NewsletterController@destroy']);
    });
    Route::group(['prefix' => 'events'], function () {
        Route::get('/', ['as' => 'events.index', 'uses' => 'EventsController@index']);
        Route::get('/create', ['as' => 'events.create', 'uses' => 'EventsController@create']);
        Route::post('/store', ['as' => 'events.store', 'uses' => 'EventsController@store']);
        Route::get('{id}/edit',   ['as' => 'events.edit', 'uses' => 'EventsController@edit']);
        Route::post('/update', ['as' => 'events.update', 'uses' => 'EventsController@update']);
        Route::get('{id}/destroy', ['as' => 'events.destroy', 'uses' => 'EventsController@destroy']);
        Route::get('destroy-product/{event_id}/{sp_id}', ['as' => 'events.destroy-product', 'uses' => 'EventsController@destroyProduct']);
        Route::get('/product-event/{event_id}', ['as' => 'events.product-event', 'uses' => 'EventsController@productEvent']);
        Route::post('/ajax-search', ['as' => 'events.ajax-search', 'uses' => 'EventsController@ajaxSearch']);
        Route::post('/ajax-save-product', ['as' => 'events.ajax-save-product', 'uses' => 'EventsController@ajaxSaveProduct']);
    });
    Route::group(['prefix' => 'tinh'], function () {
        Route::get('/', ['as' => 'tinh.index', 'uses' => 'TinhThanhController@index']);
        Route::post('/store', ['as' => 'tinh.store', 'uses' => 'TinhThanhController@store']);
        Route::get('{id}/edit',   ['as' => 'tinh.edit', 'uses' => 'TinhThanhController@edit']);
        Route::post('/update', ['as' => 'tinh.update', 'uses' => 'TinhThanhController@update']);
        Route::get('{id}/destroy', ['as' => 'tinh.destroy', 'uses' => 'TinhThanhController@destroy']);
    });
    Route::group(['prefix' => 'loai-sp'], function () {
        Route::get('/', ['as' => 'loai-sp.index', 'uses' => 'LoaiSpController@index']);
        Route::get('/create', ['as' => 'loai-sp.create', 'uses' => 'LoaiSpController@create']);
        Route::get('/thuoc-tinh', ['as' => 'loai-sp.thuoc-tinh', 'uses' => 'LoaiSpController@thuocTinh']);
        Route::get('/edit-thuoc-tinh', ['as' => 'loai-sp.edit-thuoc-tinh', 'uses' => 'LoaiSpController@editThuocTinh']);
        Route::get('/list-thuoc-tinh', ['as' => 'loai-sp.list-thuoc-tinh', 'uses' => 'LoaiSpController@listThuocTinh']);
        Route::post('/store-thuoc-tinh', ['as' => 'loai-sp.store-thuoc-tinh', 'uses' => 'LoaiSpController@storeThuocTinh']);
        Route::post('/update-thuoc-tinh', ['as' => 'loai-sp.update-thuoc-tinh', 'uses' => 'LoaiSpController@updateThuocTinh']);
        Route::post('/store', ['as' => 'loai-sp.store', 'uses' => 'LoaiSpController@store']);
        Route::get('{id}/edit',   ['as' => 'loai-sp.edit', 'uses' => 'LoaiSpController@edit']);
        Route::post('/update', ['as' => 'loai-sp.update', 'uses' => 'LoaiSpController@update']);
        Route::get('{id}/destroy', ['as' => 'loai-sp.destroy', 'uses' => 'LoaiSpController@destroy']);
        Route::get('{id}/destroy-thuoc-tinh', ['as' => 'loai-sp.destroyThuocTinh', 'uses' => 'LoaiSpController@destroyThuocTinh']);
    });
    Route::group(['prefix' => 'convert'], function () {
        Route::get('/', ['as' => 'convert.index', 'uses' => 'ConvertController@index']);
    });
    Route::group(['prefix' => 'loai-thuoc-tinh'], function () {
        Route::get('/', ['as' => 'loai-thuoc-tinh.index', 'uses' => 'LoaiThuocTinhController@index']);
        Route::get('/create', ['as' => 'loai-thuoc-tinh.create', 'uses' => 'LoaiThuocTinhController@create']);
        Route::post('/store', ['as' => 'loai-thuoc-tinh.store', 'uses' => 'LoaiThuocTinhController@store']);

        Route::get('{id}/edit',   ['as' => 'loai-thuoc-tinh.edit', 'uses' => 'LoaiThuocTinhController@edit']);
        Route::post('/update', ['as' => 'loai-thuoc-tinh.update', 'uses' => 'LoaiThuocTinhController@update']);
        Route::get('{id}/destroy', ['as' => 'loai-thuoc-tinh.destroy', 'uses' => 'LoaiThuocTinhController@destroy']);
        Route::get('/ajax-get-loai-thuoc-tinh-by-id', ['as' => 'loai-thuoc-tinh.ajax-get-loai-thuoc-tinh-by-id', 'uses' => 'LoaiThuocTinhController@getLoaiThuocTinhByLoaiId']);
    });
    Route::group(['prefix' => 'thuoc-tinh'], function () {
        Route::get('/', ['as' => 'thuoc-tinh.index', 'uses' => 'ThuocTinhController@index']);
        Route::get('/create', ['as' => 'thuoc-tinh.create', 'uses' => 'ThuocTinhController@create']);
        Route::post('/store', ['as' => 'thuoc-tinh.store', 'uses' => 'ThuocTinhController@store']);
        Route::get('{id}/edit',   ['as' => 'thuoc-tinh.edit', 'uses' => 'ThuocTinhController@edit']);
        Route::post('/update', ['as' => 'thuoc-tinh.update', 'uses' => 'ThuocTinhController@update']);
        Route::get('{id}/destroy', ['as' => 'thuoc-tinh.destroy', 'uses' => 'ThuocTinhController@destroy']);
    });
    Route::group(['prefix' => 'cate'], function () {
        Route::get('/{loai_id?}', ['as' => 'cate.index', 'uses' => 'CateController@index']);
        Route::get('/create/{loai_id?}', ['as' => 'cate.create', 'uses' => 'CateController@create']);
        Route::post('/store', ['as' => 'cate.store', 'uses' => 'CateController@store']);
        Route::get('{id}/edit',   ['as' => 'cate.edit', 'uses' => 'CateController@edit']);
        Route::post('/update', ['as' => 'cate.update', 'uses' => 'CateController@update']);
        Route::get('{id}/destroy', ['as' => 'cate.destroy', 'uses' => 'CateController@destroy']);
    });
    Route::group(['prefix' => 'banner'], function () {
        Route::get('/', ['as' => 'banner.index', 'uses' => 'BannerController@index']);
        Route::get('/create/', ['as' => 'banner.create', 'uses' => 'BannerController@create']);
        Route::get('/list', ['as' => 'banner.list', 'uses' => 'BannerController@list']);
        Route::post('/store', ['as' => 'banner.store', 'uses' => 'BannerController@store']);
        Route::get('/edit',   ['as' => 'banner.edit', 'uses' => 'BannerController@edit']);
        Route::post('/update', ['as' => 'banner.update', 'uses' => 'BannerController@update']);
        Route::get('{id}/destroy', ['as' => 'banner.destroy', 'uses' => 'BannerController@destroy']);
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', ['as' => 'product.index', 'uses' => 'ProductController@index']);
        Route::get('/short', ['as' => 'product.short', 'uses' => 'ProductController@short']);
        Route::get('/ajax-get-detail-product', ['as' => 'ajax-get-detail-product', 'uses' => 'ProductController@ajaxDetail']);        
        Route::get('/create/', ['as' => 'product.create', 'uses' => 'ProductController@create']);
        Route::get('/tuong-thich', ['as' => 'product.tuong-thich', 'uses' => 'ProductController@spTuongThich']);
        Route::post('/store', ['as' => 'product.store', 'uses' => 'ProductController@store']);
        Route::post('/ajax-save-info', ['as' => 'product.ajax-save-info', 'uses' => 'ProductController@ajaxSaveInfo']);
        Route::get('{id}/edit',   ['as' => 'product.edit', 'uses' => 'ProductController@edit']);
        Route::post('/update', ['as' => 'product.update', 'uses' => 'ProductController@update']);
        Route::post('/ajax-search', ['as' => 'product.ajax-search', 'uses' => 'ProductController@ajaxSearch']);
        Route::post('/ajax-search-tuong-thich', ['as' => 'product.ajax-search-tuong-thich', 'uses' => 'ProductController@ajaxSearchTuongThich']);
        Route::get('{id}/destroy', ['as' => 'product.destroy', 'uses' => 'ProductController@destroy']);
        Route::post('/ajax-save-related', ['as' => 'product.ajax-save-related', 'uses' => 'ProductController@ajaxSaveRelated']);
        Route::post('/ajax-save-tuong-thich', ['as' => 'product.ajax-save-tuong-thich', 'uses' => 'ProductController@ajaxSaveTuongThich']);        
        Route::post('/save-sp-tuong-thich', ['as' => 'product.save-sp-tuong-thich', 'uses' => 'ProductController@saveSpTuongThich']);        

    });
    Route::post('/tmp-upload', ['as' => 'image.tmp-upload', 'uses' => 'UploadController@tmpUpload']);
    Route::post('/tmp-upload-multiple', ['as' => 'image.tmp-upload-multiple', 'uses' => 'UploadController@tmpUploadMultiple']);
    Route::post('/update-order', ['as' => 'update-order', 'uses' => 'GeneralController@updateOrder']);
    Route::post('/ck-upload', ['as' => 'ck-upload', 'uses' => 'UploadController@ckUpload']);
    Route::post('/get-slug', ['as' => 'get-slug', 'uses' => 'GeneralController@getSlug']);

    Route::group(['prefix' => 'order'], function () {
        Route::get('/', ['as' => 'orders.index', 'uses' => 'OrderController@index']);
        Route::post('/update', ['as' => 'orders.update', 'uses' => 'OrderController@update']);
        Route::get('/{order_id}/chi-tiet', ['as' => 'order.detail', 'uses' => 'OrderController@orderDetail']);
        Route::post('/delete-order-detail', ['as' => 'order.detail.delete', 'uses' => 'OrderController@orderDetailDelete']);
    });

     Route::group(['prefix' => 'articles-cate'], function () {
        Route::get('/', ['as' => 'articles-cate.index', 'uses' => 'ArticlesCateController@index']);
        Route::get('/create', ['as' => 'articles-cate.create', 'uses' => 'ArticlesCateController@create']);
        Route::post('/store', ['as' => 'articles-cate.store', 'uses' => 'ArticlesCateController@store']);
        Route::get('{id}/edit',   ['as' => 'articles-cate.edit', 'uses' => 'ArticlesCateController@edit']);
        Route::post('/update', ['as' => 'articles-cate.update', 'uses' => 'ArticlesCateController@update']);
        Route::get('{id}/destroy', ['as' => 'articles-cate.destroy', 'uses' => 'ArticlesCateController@destroy']);
    });
    Route::group(['prefix' => 'tag'], function () {
        Route::get('/', ['as' => 'tag.index', 'uses' => 'TagController@index']);
        Route::get('/create', ['as' => 'tag.create', 'uses' => 'TagController@create']);
        Route::post('/store', ['as' => 'tag.store', 'uses' => 'TagController@store']);
        Route::get('{id}/edit',   ['as' => 'tag.edit', 'uses' => 'TagController@edit']);
        Route::post('/update', ['as' => 'tag.update', 'uses' => 'TagController@update']);
        Route::get('{id}/destroy', ['as' => 'tag.destroy', 'uses' => 'TagController@destroy']);
    });
    Route::group(['prefix' => 'account'], function () {
        Route::get('/', ['as' => 'account.index', 'uses' => 'AccountController@index']);
        Route::get('/update-status/{status}/{id}', ['as' => 'account.update-status', 'uses' => 'AccountController@updateStatus']);
        Route::get('/create', ['as' => 'account.create', 'uses' => 'AccountController@create']);
        Route::post('/store', ['as' => 'account.store', 'uses' => 'AccountController@store']);
        Route::get('{id}/edit',   ['as' => 'account.edit', 'uses' => 'AccountController@edit']);
        Route::post('/update', ['as' => 'account.update', 'uses' => 'AccountController@update']);
        Route::get('{id}/destroy', ['as' => 'account.destroy', 'uses' => 'AccountController@destroy']);
    });
    Route::group(['prefix' => 'articles'], function () {
        Route::get('/', ['as' => 'articles.index', 'uses' => 'ArticlesController@index']);
        Route::get('/create', ['as' => 'articles.create', 'uses' => 'ArticlesController@create']);
        Route::post('/store', ['as' => 'articles.store', 'uses' => 'ArticlesController@store']);
        Route::get('{id}/edit',   ['as' => 'articles.edit', 'uses' => 'ArticlesController@edit']);
        Route::post('/update', ['as' => 'articles.update', 'uses' => 'ArticlesController@update']);
        Route::get('{id}/destroy', ['as' => 'articles.destroy', 'uses' => 'ArticlesController@destroy']);
    });

});
Route::group(['namespace' => 'Frontend'], function()
{
    Route::get('code/sang-map/seo-link', ['as' => 'seo-link', 'uses' => 'HomeController@showLink']);   

    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/load-slider', ['as' => 'load-slider', 'uses' => 'HomeController@loadSlider']);
    Route::get('/chuong-trinh-khuyen-mai', ['as' => 'chuong-trinh-khuyen-mai', 'uses' => 'EventController@index']);
    Route::get('event/{slug}', ['as' => 'detail-event', 'uses' => 'EventController@detail']);
    Route::get('/may-bo-van-phong', ['as' => 'may-bo-van-phong', 'uses' => 'LapRapController@index']);

    Route::post('/send-contact', ['as' => 'send-contact', 'uses' => 'ContactController@store']);
    Route::post('/set-service', ['as' => 'set-service', 'uses' => 'CartController@setService']);
    Route::get('/may-bo-choi-game', ['as' => 'may-bo-choi-game', 'uses' => 'LapRapController@index']);
    Route::get('/may-bo-do-hoa', ['as' => 'may-bo-do-hoa', 'uses' => 'LapRapController@index']);
    Route::get('/may-bo-am-thanh', ['as' => 'may-bo-am-thanh', 'uses' => 'LapRapController@index']);
    Route::get('san-pham/{slug}', ['as' => 'chi-tiet', 'uses' => 'DetailController@index']);
    Route::get('/tin-tuc/{slug}-{id}.html', ['as' => 'news-detail', 'uses' => 'HomeController@newsDetail']);
    Route::get('{slugLoaiSp}/gia-{slugGia}', ['as' => 'theo-gia-danh-muc-cha', 'uses' => 'CateController@theoGia']);

    Route::get('{slugLoaiSp}/ban-chay/', ['as' => 'ban-chay', 'uses' => 'CateController@banChay']);

    Route::get('{slugLoaiSp}/san-pham-moi/', ['as' => 'san-pham-moi', 'uses' => 'CateController@sanPhamMoi']);
    Route::get('{slugLoaiSp}/giam-gia/', ['as' => 'giam-gia', 'uses' => 'CateController@giamGia']);

    Route::get('tu-chon-cau-hinh/{slug}/', ['as' => 'lap-rap', 'uses' => 'LapRapController@lapRap']);
    Route::post('tu-chon-cau-hinh/mua/', ['as' => 'mua-lap-rap', 'uses' => 'LapRapController@mua']);
    Route::post('tu-chon-cau-hinh/lay-san-pham-tuong-thich/', ['as' => 'lay-sp-tuong-thich', 'uses' => 'LapRapController@getTuongThich']);
    Route::group(['prefix' => 'thanh-toan'], function () {
        Route::get('gio-hang', ['as' => 'gio-hang', 'uses' => 'CartController@index']);
        Route::any('shipping-step-1', ['as' => 'shipping-step-1', 'uses' => 'CartController@shippingStep1']);
        Route::get('shipping-step-2', ['as' => 'shipping-step-2', 'uses' => 'CartController@shippingStep2']);
        Route::get('shipping-step-3', ['as' => 'shipping-step-3', 'uses' => 'CartController@shippingStep3']);
        Route::post('update-sanpham', ['as' => 'update-sanpham', 'uses' => 'CartController@update']);
        Route::post('them-sanpham', ['as' => 'them-sanpham', 'uses' => 'CartController@addProduct']);
        Route::get('thanh-cong', ['as' => 'thanh-cong', 'uses' => 'CartController@success']);
        Route::post('dat-hang', ['as' => 'dat-hang', 'uses' => 'CartController@order']);
        // Route::get('test', 'CartController@test');
    });

    Route::group(['prefix' => 'tai-khoan'], function () {
        Route::get('don-hang-cua-toi', ['as' => 'order-history', 'uses' => 'OrderController@history']);
        Route::get('/{order_id}/chi-tiet-don-hang', ['as' => 'order-detail', 'uses' => 'OrderController@detail']);
    });
    Route::get('{slugLoaiSp}/{slug}/', ['as' => 'danh-muc-con', 'uses' => 'CateController@cate']);
    
    

    Route::post('/dang-ki-newsletter', ['as' => 'register.newsletter', 'uses' => 'HomeController@registerNews']);
    Route::get('/cap-nhat-thong-tin', ['as' => 'cap-nhat-thong-tin', 'uses' => 'CartController@updateUserInformation']);

    Route::get('/{slug}', ['as' => 'news-list', 'uses' => 'HomeController@newsList']);
    Route::get('/tin-tuc/{slug}-{id}.html', ['as' => 'news-detail', 'uses' => 'HomeController@newsDetail']);
    Route::post('/get-district', ['as' => 'get-district', 'uses' => 'DistrictController@getDistrict']);
    Route::post('/get-ward', ['as' => 'get-ward', 'uses' => 'WardController@getWard']);
    Route::post('/customer/update', ['as' => 'update-customer', 'uses' => 'CustomerController@update']);
    Route::post('/customer/register', ['as' => 'register-customer', 'uses' => 'CustomerController@register']);
    Route::post('/customer/register-ajax', ['as' => 'register-customer-ajax', 'uses' => 'CustomerController@registerAjax']);
    Route::post('/customer/checkemail', ['as' => 'checkemail-customer', 'uses' => 'CustomerController@isEmailExist']);



    
    Route::get('/tim-kiem.html', ['as' => 'search', 'uses' => 'HomeController@search']);
    Route::get('so-sanh.html', ['as' => 'so-sanh', 'uses' => 'CompareController@index']);
    Route::get('lien-he.html', ['as' => 'contact', 'uses' => 'HomeController@contact']);
    /*Route::get('phuong-thuc-thanh-toan.html', ['as' => 'phuong-thuc-thanh-toan', 'uses' => 'PageController@index']);
    Route::get('lien-he.html', ['as' => 'lien-he', 'uses' => 'PageController@contact']);
    Route::get('hinh-thuc-van-chuyen.html', ['as' => 'hinh-thuc-van-chuyen', 'uses' => 'PageController@index']);
    Route::get('chinh-sach-bao-hanh.html', ['as' => 'chinh-sach-bao-hanh', 'uses' => 'PageController@index']);
    Route::get('chinh-sach-doi-tra.html', ['as' => 'chinh-sach-doi-tra', 'uses' => 'PageController@index']);
    Route::get('gioi-thieu.html', ['as' => 'gioi-thieu', 'uses' => 'PageController@index']);
    Route::get('huong-dan-mua-hang.html', ['as' => 'huong-dan-mua-hang', 'uses' => 'PageController@index']);
    Route::get('bao-mat-thong-tin.html', ['as' => 'bao-mat-thong-tin', 'uses' => 'PageController@index']);
    */
    //Route::get('/phim-le', ['as' => 'phim-le', 'uses' => 'HomeController@cate']);
    //::get('/phim-bo', ['as' => 'phim-bo', 'uses' => 'HomeController@cate']);

    
    
    Route::get('{slug}.html', ['as' => 'danh-muc-cha', 'uses' => 'CateController@index']);
    

    Route::get('/movies-info/{movies_id}', ['as' => 'movies-info', 'uses' => 'DetailController@ajaxMoviesInfo']);

    Route::get('/download', ['as' => 'download', 'uses' => 'DetailController@download']);


});

