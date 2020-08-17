<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::paginate(20);
        return view('dashboard.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('dashboard.clients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_name'       => 'required|string',
            'en_name'       => 'required|string'
        ]);

        Client::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('clients.index');
    }

    public function show(Client $client)
    {
//        return view('dashboard.clients.edit', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('dashboard.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'ar_name'       => 'required|string',
            'en_name'       => 'required|string',
        ]);

        $client->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('clients.index');
    }
}
