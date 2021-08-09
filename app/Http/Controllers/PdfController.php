<?php

namespace App\Http\Controllers;

use App\Models\OrderServiceOnSite;
use App\Models\Product;
use App\Models\SaleOrder;
use App\Models\ServiceOnSites;
use App\Models\ServiceOrder;
use App\Models\User;
use Carbon\carbon;
use Illuminate\Http\Request;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfController extends Controller
{
    public function pdfOrder($folio)
    {
        $order = SaleOrder::where('folio', $folio)->first();

        $products = Product::where('sale_id', $order->id)->get();

        $total = $products->pluck('net_price')->sum();

        $pdf = PDF::loadView('pdf', compact('order', 'products', 'total'));
        return $pdf->stream();
    }

    public function pdfService($folio)
    {
        $order = ServiceOrder::where('folio', $folio)->first();

        $date = Carbon::parse($order->date_of_service)->format('d-m-Y');

        $employee = User::where('id', $order->user_id)->first();

        $qr = QrCode::size(150)->generate('Make me into a QrCode!', '../public/qrcodes/qrcode-'.$order->folio.'.svg');

        $pdf = PDF::loadView('pdfService', compact('order', 'date', 'employee', 'qr'));
        return $pdf->stream();
    }

    public function pdfServiceSite($folio)
    {
        $order = OrderServiceOnSite::where('folio', $folio)->first();

        $date = Carbon::parse($order->date_of_service)->format('d-m-Y');

        $employee = User::where('id', $order->user_id)->first();

        $services = ServiceOnSites::where('order_service_id', $order->id)->get();

        $net_price = $services->pluck('net_price')->sum();

        $total = ($net_price - $order->advance);

        $pdf = PDF::loadView('pdfServiceOnSite', compact('order', 'date', 'employee', 'services', 'total', 'net_price'));
        return $pdf->stream();
    }

    public function test()
    {
        $pdf = PDF::loadView('pdftest');

        return $pdf->stream();
    }
}
