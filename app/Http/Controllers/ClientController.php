<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('admin.clients.index');
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create([
            'name' => $request->name,
            'rfc' => $request->rfc,
            'phone' => $request->phone,
            'street' => $request->street,
            'suburb' => $request->suburb,
            'number' => $request->number,
            'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('clients.index')->with('success', 'Cliente creado correctamente');
    }
}
