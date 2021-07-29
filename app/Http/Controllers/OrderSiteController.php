<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderServiceOnSiteRequest;
use App\Models\Client;
use App\Models\OrderServiceOnSite;
use App\Models\ServiceOnSites;
use App\Models\User;
use Carbon\carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.siteOrder.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $client = Client::where('slug', $slug)->first();

        $date = Carbon::now();

        $users = User::all();

        return view('admin.siteOrder.create', compact('client', 'date', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderServiceOnSiteRequest $request, $slug)
    {
        
        $client = Client::where('slug', $slug)->first();

        DB::beginTransaction();

        try
        {
            $order = OrderServiceOnSite::create([
                'user_id' => $request->employee_id,
                'client_id' => $client->id,
                'date_of_service' => $request->date_of_service,
            ]);

            ServiceOnSites::create([
                'order_service_id' => $order->id,
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-').'-'.rand(1, 99999),
                'quantity' => $request->quantity,
                'iva_price' => $request->iva_price,
                'net_price' => $request->net_price,
                'description' => $request->description,
                'observations' => $request->observations,
                'advance' => $request->advance,
            ]);


            DB::commit();

            return redirect()->route('orderSite.index')->with('success', 'Orden de sitio creada correctamente');

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
