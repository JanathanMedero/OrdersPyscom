<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderSaleRequest;
use App\Models\Client;
use App\Models\Product;
use App\Models\SaleOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.TableOrdersSale');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $date = Carbon::now();

        $client = Client::where('slug', $slug)->first();

        $users = User::all();

        return view('admin.saleOrders.create', compact('client', 'date', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderSaleRequest $request, $slug)
    {   

        $client = Client::where('slug', $slug)->first();

        DB::beginTransaction();

        try
        {
            $sale = SaleOrder::create([

                        'user_id'       => $request->employee,
                        'client_id'     => $client->id,
                        'folio'         => rand(1, 99999),
                        'date_of_sale'  => $request->date_of_sale,

                    ]);

            Product::create([

                'sale_id'       => $sale->id,
                'name'          => $request->name,
                'slug'          => Str::slug($request->name, '-').'-'.rand(1, 99999),
                'quantity'      => $request->quantity,
                'unit_price'    => $request->unit_price,
                'net_price'     => $request->net_price,
                'description'   => $request->description,
                'warranty'      => $request->warranty,
                'observations'  => $request->observations,

            ]);

            DB::commit();

            return redirect()->route('orders.index')->with('success', 'Orden de venta creada correctamente');

        }catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($folio)
    {
        $order = SaleOrder::where('folio', $folio)->first();

        return view('admin.saleOrders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($folio)
    {
        $order = SaleOrder::where('folio', $folio)->first();

        return view('admin.saleOrders.edit-order', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($folio)
    {
        $order = SaleOrder::where('folio', $folio)->first();

        $order->delete();

        return back()->with('delete', 'Orden eliminada correctamente');
    }
}
