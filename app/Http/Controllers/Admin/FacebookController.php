<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacebookController extends Controller
{
    public function showPage()
    {
//        dd(setting('facebook_token'));
        return view('dashboard.facebook.facebook');
    }

    public function store(Request $request)
    {
        Setting::set([
            'facebook_token'    => $request->facebook_token,
        ]);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->back();
    }
}
