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

        $prices = $products->only('net_price');

        dd($prices);

        $total = array_sum($prices->toArray());

        $pdf = PDF::loadView('pdf', compact('order', 'products'));
        return $pdf->stream();
    }
}
