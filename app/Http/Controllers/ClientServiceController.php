<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\OrderServiceOnSite;
use App\Models\SaleOrder;
use App\Models\ServiceOnSites;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class ClientServiceController extends Controller
{
    public function show($slug)
    {
        $client = Client::where('slug', $slug)->first();

        $sales = SaleOrder::where('client_id', $client->id)->count();

        $orderService = ServiceOrder::where('client_id', $client->id)->count();

        $orderServiceSite = OrderServiceOnSite::where('client_id', $client->id)->count();

        return view('admin.clients.services.show', compact('client', 'sales', 'orderService', 'orderServiceSite'));
    }

    public function orderSale($slug)
    {
        $client = Client::where('slug', $slug)->first();

        $orders = SaleOrder::where('client_id', $client->id)->get();

        return view('admin.clients.services.orderSale.index', compact('orders', 'client'));
    }

    public function orderService($slug)
    {
        $client = Client::where('slug', $slug)->first();

        $orders = ServiceOrder::where('client_id', $client->id)->get();

        return view('admin.clients.services.orderService.index', compact('orders', 'client'));
    }

    public function orderServiceSite($slug)
    {
        $client = Client::where('slug', $slug)->first();

        $orders = OrderServiceOnSite::where('client_id', $client->id)->get();

        return view('admin.clients.services.orderServiceSite.index', compact('orders', 'client'));
    }
}
