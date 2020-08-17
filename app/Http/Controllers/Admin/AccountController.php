<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{

    public function index()
    {
        $accounts = Admin::where('role', '!=', '0')->paginate(10);
        return view('dashboard.accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('dashboard.accounts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string',
            'email'         => 'required|email|unique:admins',
            'password'      => 'required|string|min:6',
            'role'          => 'required|numeric'
        ]);

        $data['image'] = $request->image;
        $data['password'] = bcrypt($request->password);

        Admin::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('accounts.index');
    }

    public function show(Admin $admin)
    {
        return view('dashboard.accounts.edit', $admin);
    }

    public function edit(Admin $account)
    {
        return view('dashboard.accounts.edit', compact('account'));
    }

    public function update(Request $request, Admin $account)
    {
        $data = $request->validate([
            'name'          => 'required|string',
            'email'         => Rule::unique('admins')->ignore($account->id),
            'role'          => 'required|numeric'
        ]);
        $data['image'] = $request->image;
        $account->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('accounts.index');
    }

    public function destroy(Admin $account)
    {
        if ($account->image) {
            Storage::disk('local')->delete('public/accounts/' . $account->image);
        }
        $account->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('accounts.index');
    }
}
