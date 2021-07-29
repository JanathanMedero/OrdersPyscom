<?php

namespace App\Http\Controllers;

use App\Models\OrderServiceOnSite;
use App\Models\ServiceOnSites;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceSiteController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $folio)
    {

        $order = OrderServiceOnSite::where('folio', $folio)->first();

        ServiceOnSites::create([
            'order_service_id' => $order->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-').'-'.rand(1, 99999),
            'quantity'      => $request->quantity,
            'net_price'     => $request->net_price,
            'description'   => $request->description,
            'observations'  => $request->observations,
            'advance'  => $request->advance,
        ]);

        return back()->with('success', 'Servicio agregado correctamente');

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
    public function edit($folio, $slug)
    {
        $service = ServiceOnSites::where('slug', $slug)->first();

        return view('admin.siteOrder.services.edit', compact('service'));
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
