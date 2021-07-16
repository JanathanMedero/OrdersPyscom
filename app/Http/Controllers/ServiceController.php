<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __invoke($slug)
    {
        $client = Client::where('slug', $slug)->first();

        return view('admin.orders', compact('client'));
    }
}
