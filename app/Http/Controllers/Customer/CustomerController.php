<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware("guest:web_customers", ['except' => ['CustomerLogout']]);
    }

    public function CustomerLoginGet() {

    	return View('Customers.auth');
    }

    public function CustomerLoginPost(Request $request) {

    	$validator = \Validator::make($request->all(), [
    		'email'	=> 'required|exists:customers,email',
			'password'	=>	'required'
    	]);

    	if($validator->fails()) {

			return redirect('customer')->withErrors($validator);

		} else {

			$auth = \Auth::guard('web_customers');

			if($auth->attempt($request->only('email', 'password'))) {

				return redirect('CustomerDetail');

			} else {

				return \Redirect::route('LoginCustomerGet');

			}
		}
    }

    public function CustomerLogout() {

		\Auth::guard('web_customers')->logout();

		return \Redirect::route('LoginCustomerGet');

	}



}	
