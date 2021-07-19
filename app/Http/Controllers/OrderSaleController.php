<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderSaleRequest;
use App\Models\Client;
use App\Models\SaleOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        SaleOrder::create([

            'user_id'       => $request->employee,
            'client_id'     => $client->id,

            'quantity'      => $request->quantity,
            'unit_price'    => $request->unit_price,
            'net_price'     => $request->net_price,
            'description'   => $request->description,
            'observations'  => $request->observations,
            'date_received'  => $request->date_received,

        ]);

        return redirect()->route('clients.index')->with('success', 'Servicio creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
