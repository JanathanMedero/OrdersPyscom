<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderServiceReportRequest;
use App\Http\Requests\StoreOrderServiceRequest;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use carbon\carbon;

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

    public function storeEquipment(StoreOrderServiceReportRequest $request, $folio, $id)
    {
        Service::create([
            'equipment_id'              => $id,
            'complete_maintenance'      => $request->get('complete_maintenance') == 'on' ? true : false,
            'preventive_maintenance'    => $request->get('preventive_maintenance') == 'on' ? true : false,
            'bios'                      => $request->get('bios') == 'on' ? true : false,
            'virus'                     => $request->get('virus') == 'on' ? true : false,
            'software_reinstallation'   => $request->get('software_reinstallation') == 'on' ? true : false,
            'special_software'          => $request->get('special_software') == 'on' ? true : false,
            'clean'                     => $request->get('clean') == 'on' ? true : false,
            'printer_cleaning'          => $request->get('printer_cleaning') == 'on' ? true : false,
            'head_maintenance'          => $request->get('head_maintenance') == 'on' ? true : false,
            'hardware'                  => $request->get('hardware') == 'on' ? true : false,

            'technical_report'          => $request->technical_report,
            'special_remarks'           => $request->special_remarks,
            'technical_name'            => $request->technical_name,
            'price'                     => $request->price,
            'delivery_date'             => $request->delivery_date
        ]);

        return redirect()->route('orderService.index')->with('success', 'Reporte agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($folio)
    {
        $order = ServiceOrder::where('folio', $folio)->first();

        $users = User::all();

        $date = Carbon::now();

        return view('admin.serviceOrders.show', compact('order', 'users', 'date'));
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
