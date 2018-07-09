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


Route::get('/login','HomeController@login');
Route::get('/logout','HomeController@logout');
Route::get('/admin','HomeController@user')->middleware('CheckUser');
Route::get('/homepage','HomeController@homepage')->middleware('CheckUser');
////////////////////Frontend Routing/////////////////////////////////

//homeController
Route::get('/','HomeController@index')->name('home');
Route::get('/search_by_category/{id}','HomeController@searchByCategory')->name('search_by_category');

//Cart Controller
Route::post('/add_to_cart','ShoppingCartController@add_to_cart')->name('add_to_cart');
Route::post('/update_cart','ShoppingCartController@update_cart')->name('update_cart');
Route::get('/shopping_cart','ShoppingCartController@shopping_cart')->name('shopping_cart');
Route::get('/delete_cart/{rowId}','ShoppingCartController@delete_cart')->name('delete_cart');

//CheckoutController
Route::get('/login','CheckoutController@login')->name('login');
Route::post('/customer_login','CheckoutController@customer_login')->name('customer_login');
Route::get('/customer_logout','CheckoutController@customer_logout')->name('customer_logout');
Route::post('/register_customer','CheckoutController@register_customer')->name('register_customer');
Route::get('/checkout','CheckoutController@checkout')->name('checkout');
Route::post('/save_shipping_details','CheckoutController@save_shipping_details')->name('save_shipping_details');


//////////////////// Backend Routing ////////////////////////////////
//Admin Controller

Route::get('/admin','AdminController@index')->name('admin');
Route::get('/dashboard','AdminController@showDashboard')->name('dashboard')->middleware('CheckUser');
Route::post('/admin_dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@logout');

//category controller
Route::get('/add_categories','CategoryController@addCategory')->name('add_categories');
Route::get('/all_categories','CategoryController@index')->name('all_categories');
Route::post('/save_category','CategoryController@saveCategory');
Route::get('/edit_category/{id}','CategoryController@editCategory');
Route::post('/update_category/{id}','CategoryController@updateCategory');
Route::get('/delete_category/{id}','CategoryController@deleteCategory');
Route::get('/inactive_category/{id}','CategoryController@inactiveCategory');
Route::get('/active_category/{id}','CategoryController@activeCategory');

//product controller
Route::get('/add_product','ProductController@addProduct')->name('add_product');
Route::post('/save_product','ProductController@saveProduct');
Route::get('/all_product','ProductController@allProducts')->name('all_products');
Route::get('/active_product/{product_id}','ProductController@activeProduct');
Route::get('/inactive_product/{product_id}','ProductController@inactiveProduct');
Route::get('/delete_product/{product_id}','ProductController@deleteProduct');
Route::get('/edit_product/{product_id}','ProductController@editProduct');
Route::post('/update_product/{product_id}','ProductController@updateProduct');
Route::get('/product_details/{id}','ProductController@productDetails')->name('product_details');

//slider controller
Route::get('/all_sliders','SliderController@index')->name('all_sliders');
Route::get('/add_slider','SliderController@addSlider')->name('add_slider');
Route::post('/save_slider','SliderController@saveSlider')->name('save_slider');
Route::get('/edit_slider/{id}','SliderController@editSlider');
Route::post('/update_slider/{id}','SliderController@updateSlider');
Route::get('/delete_slider/{id}','SliderController@deleteSlider');
Route::get('/inactive_slider/{id}','SliderController@inactiveSlider');
Route::get('/active_slider/{id}','SliderController@activeSlider');

//Order Controller
Route::get('all_orders','OrderController@index')->name('all_orders');
Route::get('order_details/{id}','OrderController@order_details')->name('order_details');
Route::get('edit_order/{id}','OrderController@edit_order')->name('edit_order');
Route::post('update_order/{id}','OrderController@update_order')->name('update_order');