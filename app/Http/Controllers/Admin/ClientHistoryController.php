<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\ClientHistory;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientHistoryController extends Controller
{
    public function index()
    {
        $clients_histories = ClientHistory::with('user', 'doctor')->paginate(10);
        return view('dashboard.histories.index', compact('clients_histories'));
    }

    public function create()
    {
        $doctors = '';
        if (admin()->user()->role == 0) {
            $doctors = Admin::where('role', '!=', 0)->get();
        }
        $users = User::all();
        return view('dashboard.histories.create', compact('doctors', 'users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_case'           => 'required|string',
            'en_case'           => 'required|string',
            'ar_description'    => 'sometimes|nullable|string',
            'en_description'    => 'sometimes|nullable|string',
            'user_id'           => 'required|numeric',
        ]);
        $data['image'] = $request->image;
        $data['doctor_id'] = admin()->user()->role == 0 ? $request->doctor_id : admin()->user()->id;


        ClientHistory::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('clients-histories.index');
    }

    public function edit(ClientHistory $clients_history)
    {
        $doctors = admin()->user()->role == 0 ? Admin::where('role', '!=', 0)->get() : '';
        $users = User::all();

        return view('dashboard.histories.edit', compact('clients_history', 'users', 'doctors'));
    }

    public function update(Request $request, ClientHistory $clients_history)
    {
        $data = $request->validate([
            'ar_case'           => 'required|string',
            'en_case'           => 'required|string',
            'ar_description'    => 'sometimes|nullable|string',
            'en_description'    => 'sometimes|nullable|string',
            'user_id'           => 'required|numeric'
        ]);
        $data['image'] = $request->image;

        $clients_history->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('clients-histories.index');
    }

    public function destroy(ClientHistory $clients_history)
    {
        if ($clients_history->image != null) {
            Storage::disk('local')->delete('public/clients-histories/' . $clients_history->image);
        }
        $clients_history->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('clients-histories.index');
    }

}
