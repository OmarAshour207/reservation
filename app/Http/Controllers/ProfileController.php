<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\ClientHistory;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showProfile($id)
    {
        $services = Service::orderBy('id', 'desc')->limit('6')->get();
        $user = User::findOrFail($id);
        $histories = ClientHistory::where('user_id', $user->id)->with('doctor')->orderBy('id', 'desc')->get();
        $appointments = Appointment::with('doctor')->where('user_id', auth()->user()->id)->get();

        return view('site.first.profile',
            compact('services', 'user', 'histories', 'appointments'));
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            'old_password'  => 'sometimes|nullable',
            'new_password'  => 'sometimes|nullable|min:6|required_with:password_confirmation|same:password_confirmation',
        ]);

        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);

        if ($request->old_password) {
            if(Hash::check($request->old_password, $user->password)) {
                $user->password = bcrypt($request->new_password);
            }
        }
        $user->name = $request->name;
        $user->update();
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->back();
    }
}
