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

Route::get('/', function () {
    return view('user/index');
});
Auth::routes();


Route::resource('/admin/product', 'Admin\ProductController');
Route::resource('/admin/category', 'Admin\CategoryController');
Route::resource('/admin/bank', 'Admin\BankController');
Route::resource('/admin/diskon', 'Admin\DiskonController');
Route::resource('/admin/voucher', 'Admin\VoucherController');
Route::get('/admin/transactions','Admin\TransactionController@index');
Route::post('/admin/transaction','Admin\TransactionController@change')->name('change.transaction');
Route::get('/admin/transaction','Admin\TransactionController@search')->name('search.transaction');


Route::get('/','MainController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart','MainController@cart');



Route::get('/buy/{product}','MainController@buy');
Route::post('/add-to-cart','MainController@addToCart')->name('add.cart');
Route::post('/save-cart','MainController@saveCart')->name('save.cart');
Route::get('/removeCart/{id}','MainController@removeCart')->name('remove.cart');
Route::get('/cart-detail','MainController@cart_detail')->name('detail.cart');
Route::get('/success/{data}','MainController@success');
Route::get('/profile','MainController@profile');


Route::get('/profile/transactions','MainController@list_transaction');
Route::get('/transaction/{transaction}','MainController@detailTransaction');
Route::post('/search/','MainController@wrap_search')->name('getsearch.product');
Route::get('/search/{query}','MainController@search')->name('search.product');

Route::get('/{category}','MainController@category');


Route::get('/{category}/{product}','MainController@detail');


Route::get('/profile/change',function(){
	return view('user/change-profile');
});


Route::post('/buy','MainController@buyTransaction')->name('buy.transaction');
Route::post('/cart-detail','MainController@saveTransaction')->name('save.transaction');



Route::post('/profile/change','MainController@change_profile')->name('change.profile');

