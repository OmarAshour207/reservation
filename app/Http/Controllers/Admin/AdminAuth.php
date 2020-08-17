<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth extends Controller
{
    public function login()
    {
        return view('dashboard.login');
    }

    public function doLogin(Request $request)
    {
        $rememberMe = request('remember') == 1 ? true : false;
        $credentials = $request->only('email', 'password');

        if(Auth::guard('admin')->attempt($credentials, $rememberMe)) {
            return redirect('admin/dashboard');
        } else {
            session()->flash('error', trans('admin.incorrect_info_login'));
            return redirect()->route('admin.login');
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
