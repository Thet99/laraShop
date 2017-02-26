<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('macros', 'FrontendController@macros')->name('macros');
Route::get("/products","FrontendController@products")->name('products');
Route::get("/shoppingcart","CartController@index")->name('shoppingcart');
Route::get("/addtocart/{id}","CartController@add")->name('addtocart');
Route::get("/products/detail/{id}","FrontendController@product_detail")->name('product_detail');
Route::get("/contact",'FrontendController@contact')->name('contact');
Route::get("/faq","FrontendController@faq")->name('faq');
Route::post("/sent_message","FrontendController@sent_message")->name('sent_message');



/**
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {

	Route::post('/checkout_process',"CartController@checkout_process")->name('checkout_process');

	Route::get("/checkout","CartController@checkout")->name('checkout');
	Route::get("/thankyou","CartController@thankyou")->name('thankyou');

	Route::group(['namespace' => 'User', 'as' => 'user.'], function() {
		/**
		 * User Dashboard Specific
		 */
		Route::get('dashboard', 'DashboardController@index')->name('dashboard');

		/**
		 * User Account Specific
		 */
		Route::get('account', 'AccountController@index')->name('account');

		/**
		 * User Profile Specific
		 */
		Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
	});
});