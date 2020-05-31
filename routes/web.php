<?php



Route::get('/', function () { return view('pages.index');});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

///---------admin -----category

Route::get('admin/categories','Admin\category\CategoryController@category')->name('categories');
Route::post('admin/store/category','Admin\category\CategoryController@StoreCategory')->name('store.category');
Route::get('delete/category/{id}','Admin\category\CategoryController@DeleteCategory');
Route::get('edit/category/{id}','Admin\category\CategoryController@EditCategory');
Route::post('update/category/{id}','Admin\category\CategoryController@UpdateCategory');


///--------------admin ----------brands-----

//Route::get('admin/brands','Admin\brand\BrandController@brand')->name('brands');
Route::get('admin/brands','Admin\brand\BrandController@brand')->name('brands');
Route::post('admin/store/brand','Admin\brand\BrandController@StoreBrand')->name('store.brand');
Route::get('delete/brand/{id}','Admin\brand\BrandController@DeleteBrand');
Route::get('edit/brand/{id}','Admin\brand\BrandController@EditBrand');
Route::post('update/brand/{id}','Admin\brand\BrandController@UpdateBrand');


///-------------------admin--------subcategory--------------
Route::get('admin/subcategory','Admin\subcategory\SubcategoryController@SubCategory')->name('subcategory');
Route::post('admin/store/subcategory','Admin\subcategory\SubcategoryController@StoreSubcategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}','Admin\subcategory\SubcategoryController@DeleteSubcategory');
Route::get('edit/subcategory/{id}','Admin\subcategory\SubcategoryController@EditSubcategory');
Route::post('update/subcategory/{id}','Admin\subcategory\SubcategoryController@UpdateSubcategory');

////------------admin----------------coupon---------

Route::get('admin/coupon','Admin\coupon\CouponController@Coupon')->name('coupon');
Route::post('admin/coupon/coupon','Admin\coupon\CouponController@StoreCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}','Admin\coupon\CouponController@DeleteCoupon');
Route::get('edit/coupon/{id}','Admin\coupon\CouponController@EditCoupon');
Route::post('update/coupon/{id}','Admin\coupon\CouponController@UpdateCoupon');

////--------------admin--------------Newsletters-------------
Route::get('admin/newsletter','Admin\coupon\CouponController@Newsletter')->name('newsletter');
Route::get('delete/newsletter/{id}','Admin\coupon\CouponController@DeleteNewsletter');
Route::get('admin/seo','Admin\coupon\CouponController@Seo')->name('admin.seo');
Route::post('admin/update/seo','Admin\coupon\CouponController@UpdateSeo')->name('update.seo');


///------------admin------------------product----------------
Route::get('admin/product/all','Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add','Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product','Admin\ProductController@store')->name('store.product');
Route::get('inactive/product/{id}','Admin\ProductController@Inactive');
Route::get('active/product/{id}','Admin\ProductController@Active');
Route::get('delete/product/{id}','Admin\ProductController@DeleteProduct');
Route::get('view/product/{id}','Admin\ProductController@ViewProduct');
Route::get('edit/product/{id}','Admin\ProductController@EditProduct');
Route::post('update/product/withoutphoto/{id}','Admin\ProductController@UpdateProductWithoutPhoto');
Route::post('update/product/photo/{id}','Admin\ProductController@UpdateProductPhoto');


///-----------------admin blog post-----------------category-----
Route::get('admin/post/category','Admin\Post\PostCategoryController@PostCategory')->name('post.category');
Route::post('admin/store/post/category','Admin\Post\PostCategoryController@StorePostCategory')->name('store.post_category');
Route::get('delete/post_category/{id}','Admin\Post\PostCategoryController@DeletePostCategory');
Route::get('edit/post_category/{id}','Admin\Post\PostCategoryController@EditPostCategory');
Route::post('update/post_category/{id}','Admin\Post\PostCategoryController@UpdatePostCategory');

///-----------------admin Blog Post---------------------
Route::get('admin/blog/post','Admin\Blog\BlogPostController@create')->name('blog.post');
Route::post('admin/blog/post','Admin\Blog\BlogPostController@store')->name('store.post');
Route::get('admin/blog/allpost','Admin\Blog\BlogPostController@index')->name('all.blogpost');
Route::get('delete/post/{id}','Admin\Blog\BlogPostController@destroy');
Route::get('edit/post/{id}','Admin\Blog\BlogPostController@edit');
Route::post('update/post/{id}','Admin\Blog\BlogPostController@update');

///-----------------admin setting-------------------
Route::get('admin/setting/add','Admin\Setting\SettingController@create')->name('add.setting');
Route::post('admin/store/setting','Admin\Setting\SettingController@store')->name('store.setting');
Route::get('admin/setting/all','Admin\Setting\SettingController@index')->name('all.setting');
Route::get('delete/setting/{id}','Admin\Setting\SettingController@destroy');
Route::get('view/setting/{id}','Admin\Setting\SettingController@ViewSetting');


///------------------admin orders-------------------
Route::get('admin/pending/order','Admin\OrderController@NewOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}','Admin\OrderController@ViewOrder');
Route::get('admin/payment/accept/{id}','Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}','Admin\OrderController@PaymentCancel');
Route::get('admin/accept/payment','Admin\OrderController@AcceptPaymentOrder')->name('admin.accept.payment');
Route::get('admin/progress/payment','Admin\OrderController@ProgressPaymentOrder')->name('admin.progress.payment');
Route::get('admin/success/payment','Admin\OrderController@SuccessPaymentOrder')->name('admin.success.payment');
Route::get('admin/cancel/order','Admin\OrderController@CancelPaymentOrder')->name('admin.cancel.order');
Route::get('admin/delevery/progress/{id}','Admin\OrderController@DeleveryProgress');
Route::get('admin/delevery/done/{id}','Admin\OrderController@DeleveryDone');

//------------------order route----------------------
Route::get('admin/today/order','Admin\ReportController@TodayOrder')->name('today.order');
Route::get('admin/today/delevered','Admin\ReportController@TodayDelevered')->name('today.delevered');
Route::get('admin/this/month','Admin\ReportController@ThisMonth')->name('this.month');
Route::get('admin/search/report','Admin\ReportController@SearchReport')->name('search.report');
Route::post('admin/search/byyear','Admin\ReportController@SearchByYear')->name('search.by.year');
Route::post('admin/search/bymonth','Admin\ReportController@SearchByMonth')->name('search.by.month');
Route::post('admin/search/bydate','Admin\ReportController@SearchByDate')->name('search.by.date');

//---------------user role---------------
Route::get('admin/create/role','Admin\UserroleController@UserRole')->name('create.user.role');
Route::get('admin/create/admin','Admin\UserroleController@CreateAdmin')->name('create.admin');
Route::post('admin/store/admin','Admin\UserroleController@UserStore')->name('store.admin');
Route::get('delete/admin/{id}','Admin\UserroleController@UserDelete');
Route::get('edit/admin/{id}','Admin\UserroleController@UserEdit');
Route::post('admin/update/admin','Admin\UserroleController@UserUpdate')->name('update.admin');

///---------------stock product--------------------
Route::get('admin/stock/product','Admin\StockController@Stock')->name('admin.product.stock');

///--------------site setting----------------
Route::get('admin/site/setting','Admin\SettingController@SiteSetting')->name('admin.site.setting');
Route::post('admin/update/sitesettin','Admin\SettingController@UpdateSetting')->name('update.sitesetting');

//--------------get ajax-------------------

Route::get('get/subcategory/{category_id}','Admin\ProductController@GetSubcat');





////---------------frontend--------------newsletters--------

Route::post('store/news','Frontend\newsletter\NewsletterController@StoreNewsletter')->name('store.news');
Route::post('order/tracking','Frontend\newsletter\NewsletterController@OrderTracking')->name('order.tracking');



Route::get('/product/details/{id}/{product_name}','ProductController@ProductView');
Route::post('/cart/product/add/{id}','ProductController@AddCart');



/////////---------------frontend -------------post
Route::get('post/blog','BlogController@blog')->name('post.blog');
Route::get('language/bangla','BlogController@Bangla')->name('language.bangla');
Route::get('language/english','BlogController@English')->name('language.english');
Route::post('product/search','BlogController@ProductSearch')->name('product.search');


//--------------------wishlist------
Route::get('add/wishlist/{id}','WishlistController@AddWistlist');

//---------------add card--------------------
Route::get('add/to/cart/{id}','CartController@AddCart');
Route::get('product/cart','CartController@ShowCart')->name('show.cart');
Route::get('remove/cart/{rowId}','CartController@removeCart');
Route::post('update/cart/item','CartController@UpdateCart')->name('update.cartitem');
Route::get('cart/product/view/{id}','CartController@ViewProduct');
Route::post('insert/into/cart','CartController@InsertCart')->name('insert.into.cart');
Route::get('user/checkout/','CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/','CartController@Wishlist')->name('user.wishlist');
Route::post('user/apply/coupon/','CartController@Coupon')->name('apply.coupon');
Route::get('coupon/remove/','CartController@CouponRemove')->name('coupon.remove');
Route::get('payment/page','CartController@PaymentPage')->name('payment.step');




//---------------------payment methods-----------
Route::post('user/payment/process/','PaymentController@payment')->name('payment.process');
Route::post('user/stripe/charge/','PaymentController@StripeCharge')->name('stripe.charge');

Route::get('success/list/','PaymentController@SuccessList')->name('success.orderlist');
Route::get('request/return/{id}','PaymentController@RequestReturn');


///--------------return products admin panel--------------
Route::get('admin/return/request','Admin\ReturnController@request')->name('admin.return.request');
Route::get('/admin/approve/return/{id}','Admin\ReturnController@ApproveReturn');
Route::get('admin/all/return','Admin\ReturnController@AllReturn')->name('admin.all.return');



//-----------------product------------
Route::get('/products/{id}','ProductController@productsView');









