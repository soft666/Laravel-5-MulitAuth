<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => 'web'], function () {

	Route::get('/', function() {
		return View('home');
	});


	/*
		Auth Admin
	 */
	Route::get('admin', ['as' => 'LoginAdminGet', 'uses' => 'Admin\AdminController@AdminLoginGet']);
	Route::post('admin', ['as' => 'LoginAdminPost', 'uses' => 'Admin\AdminController@AdminLoginPost']);
	Route::get('logout', ['as' => 'LogOutAdmin', 'uses' => 'Admin\AdminController@AdminLogout']);

	Route::group(['middleware' => ['auth:web_admins']], function () {

		Route::get('AdminDetail', function() {
			return View('admins.admin');
		});

	});

	/*
		Auth Customer
	 */
	
	Route::get('customer', ['as' => 'LoginCustomerGet', 'uses' => 'Customer\CustomerController@CustomerLoginGet']);
	Route::post('customer', ['as' => 'LoginCustomerPost', 'uses' => 'Customer\CustomerController@CustomerLoginPost']);
	Route::get('logoutCustomer', ['as' => 'LogoutCustomer', 'uses' => 'Customer\CustomerController@CustomerLogout']);

	Route::group(['middleware' => ['auth:web_customers']], function () {

		Route::get('CustomerDetail', function() {
			return View('customers.customer');
		});

	});

});



