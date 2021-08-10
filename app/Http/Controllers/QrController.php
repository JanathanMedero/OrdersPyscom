<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\carbon;

class QrController extends Controller
{
    public function showStatusOrderService($slug, $folio)
    {
        $order = ServiceOrder::where('folio', $folio)->first();

        $services = Service::where('equipment_id', $order->equipment->service_id)->get();

        $delivery_date = Carbon::parse($order->delivery_date)->format('d/m/Y');

        return view('Qr.show-status-order-service', compact('order', 'services', 'delivery_date'));
    }
}
