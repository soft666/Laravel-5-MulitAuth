<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{	
	public function __construct()
    {
        $this->middleware("guest:web_admins", ['except' => ['AdminLogout']]);
    }
    
	public function AdminLoginGet() {

		return View('admins.auth');

	}

	public function AdminLoginPost(Request $request) {

		$validator = \Validator::make($request->all(), [
			'email'	=> 'required|exists:admins,email',
			'password'	=>	'required'
		]);

		if($validator->fails()) {

			return redirect('admin')->withErrors($validator);

		} else {

			$auth = \Auth::guard('web_admins');

			if($auth->attempt($request->only('email', 'password'))) {

				return redirect('AdminDetail');

			} else {

				return \Redirect::route('LoginAdminGet');

			}
		}
	}

	public function AdminLogout() {

		\Auth::guard('web_admins')->logout();

		return \Redirect::route('LoginAdminGet');

	}

}
