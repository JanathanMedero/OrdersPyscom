<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SaleOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index($folio)
    {
        $users = User::all();

        $order = SaleOrder::where('folio', $folio)->first();

        return view('admin.saleOrders.index', compact('order', 'users'));
    }

    public function store(Request $request, $folio)
    {
        $order = SaleOrder::where('folio', $folio)->first();

        Product::create([

            'sale_id'       => $order->id,
            'name'          => $request->name,
            'slug'          => Str::slug($request->name, '-').'-'.rand(1, 99999),
            'quantity'      => $request->quantity,
            'unit_price'    => $request->unit_price,
            'net_price'     => $request->net_price,
            'description'   => $request->description,
            'observations'  => $request->observations,

        ]);

        return back()->with('success', 'Producto agregado correctamente');
    }
}
