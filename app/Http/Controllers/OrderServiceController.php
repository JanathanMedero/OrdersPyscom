<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderServiceRequest;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Http\Request;
use carbon\carbon;
use DB;

class OrderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.serviceOrders.index');
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

        return view('admin.serviceOrders.create', compact('client', 'date', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderServiceRequest $request, $slug)
    {
        $client = Client::where('slug', $slug)->first();

        $date = Carbon::now();
        
        DB::beginTransaction();

        try
        {
            $service = ServiceOrder::create([
                'user_id'   => $request->user_id,
                'client_id' => $client->id,
                'folio'     => rand(1, 99999),
                'date_of_service' => $date,
            ]);

            Equipment::create([
                'service_id' => $service->id,
                'team' => $request->team,
                'brand' => $request->brand,
                'model' => $request->model,
                'accessories' => $request->accesories,
                'features' => $request->features,
                'fault_report' => $request->fault_report,
                'observations' => $request->observations,
                'solicited_service' => $request->solicited_service,
            ]);

            DB::commit();

            return redirect()->route('orderService.index')->with('success', 'Orden de servicio creada correctamente');
        }

        catch(\Exception $e)
        {
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
