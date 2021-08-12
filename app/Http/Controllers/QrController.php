<?php

namespace App\Http\Controllers;

use App\Models\OrderServiceOnSite;
use App\Models\Service;
use App\Models\ServiceOnSites;
use App\Models\ServiceOrder;
use Carbon\carbon;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function showStatusOrderService($slug, $folio)
    {
        $order = ServiceOrder::where('folio', $folio)->first();

        $services = Service::where('equipment_id', $order->equipment->service_id)->get();

        $delivery_date = Carbon::parse($order->delivery_date)->format('d/m/Y');

        return view('Qr.show-status-order-service', compact('order', 'services', 'delivery_date'));
    }

    public function showStatusOrderServiceSite($slug, $folio)
    {
        $order = OrderServiceOnSite::where('folio', $folio)->first();

        $services = ServiceOnSites::where('order_service_id', $order->id)->get();

        $date_of_service = Carbon::parse($order->date_of_service)->format('d/m/Y');

        $net_price = $services->pluck('net_price')->sum();

        $total = ($net_price - $order->advance);

        return view('Qr.show-status-order-service-on-site', compact('order', 'services', 'date_of_service', 'net_price', 'total'));
    }
}