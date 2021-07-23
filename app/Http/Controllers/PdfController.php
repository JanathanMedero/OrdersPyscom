<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SaleOrder;
use Illuminate\Http\Request;
use PDF;

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
}
