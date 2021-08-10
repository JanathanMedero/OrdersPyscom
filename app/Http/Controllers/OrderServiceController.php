<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderServiceReportRequest;
use App\Http\Requests\StoreOrderServiceRequest;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\Technical;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use carbon\carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
                'user_id'           => $request->user_id,
                'client_id'         => $client->id,
                'folio'             => rand(1, 99999),
                'date_of_service'   => $date,
            ]);

            Equipment::create([
                'service_id'        => $service->id,
                'team'              => $request->team,
                'brand'             => $request->brand,
                'model'             => $request->model,
                'accessories'       => $request->accesories,
                'features'          => $request->features,
                'fault_report'      => $request->fault_report,
                'observations'      => $request->observations,
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

        DB::beginTransaction();

        try
        {
            $serviceOrder = ServiceOrder::where('folio', $folio)->first();

            $serviceOrder->technical_id     = $request->technical_id;
            $serviceOrder->technical_report = $request->technical_report;
            $serviceOrder->special_remarks  = $request->special_remarks;
            $serviceOrder->price            = $request->price;
            $serviceOrder->delivery_date    = $request->delivery_date;

            $serviceOrder->save();

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

                // 'technical_report'          => $request->technical_report,
                // 'special_remarks'           => $request->special_remarks,
                // 'price'                     => $request->price,
                // 'delivery_date'             => $request->delivery_date
            ]);

            DB::commit();

            return redirect()->route('orderService.index')->with('success', 'Reporte creado correctamente');
        }

        catch(\Exception $e)
        {
            DB::rollback();
            dd($e);
        }

    }

    public function updateEquipment(StoreOrderServiceReportRequest $request, $folio, $id)
    {
        DB::beginTransaction();

        try
        {
            // dd($request->get('printer_cleaning'));

            $serviceOrder = ServiceOrder::where('folio', $folio)->first();

            $serviceOrder->technical_id = $request->technical_id;
            $serviceOrder->technical_report = $request->technical_report;
            $serviceOrder->special_remarks  = $request->special_remarks;
            $serviceOrder->price            = $request->price;
            $serviceOrder->delivery_date    = $request->delivery_date;

            $serviceOrder->save();

            $service = Service::where('equipment_id', $id)->first();

            
            $service->complete_maintenance      = $request->get('complete_maintenance') == 'on' ? true : false;
            $service->preventive_maintenance    = $request->get('preventive_maintenance') == 'on' ? true : false;
            $service->bios                      = $request->get('bios') == 'on' ? true : false;
            $service->virus                     = $request->get('virus') == 'on' ? true : false;
            $service->software_reinstallation   = $request->get('software_reinstallation') == 'on' ? true : false;
            $service->special_software          = $request->get('special_software') == 'on' ? true : false;
            $service->clean                     = $request->get('clean') == 'on' ? true : false;
            $service->printer_cleaning          = $request->get('printer_cleaning') == 'on' ? true : false;
            $service->head_maintenance          = $request->get('head_maintenance') == 'on' ? true : false;
            $service->hardware                  = $request->get('hardware') == 'on' ? true : false;

            $service->save();
           

            DB::commit();

            return redirect()->route('orderService.index')->with('success', 'Reporte actualizado correctamente');
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
    public function show($folio)
    {
        $order = ServiceOrder::where('folio', $folio)->first();

        $users = User::all();

        $date = Carbon::now();

        $technicals = Technical::all();

        $service = Service::where('equipment_id', $order->equipment->id)->first();

        return view('admin.serviceOrders.show', compact('order', 'users', 'date', 'technicals', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($folio)
    {
        $order = ServiceOrder::where('folio', $folio)->first();

        $users = User::all();

        return view('admin.serviceOrders.edit', compact('order', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrderServiceRequest $request, $folio)
    {
        $order = ServiceOrder::where('folio', $folio)->first();
        $equipment = Equipment::where('service_id', $order->id)->first();

        $equipment->team                 = $request->team;
        $equipment->brand                = $request->brand;
        $equipment->model                = $request->model;
        $equipment->accessories          = $request->accesories;
        $equipment->features             = $request->features;
        $equipment->fault_report         = $request->fault_report;
        $equipment->observations         = $request->observations;
        $equipment->solicited_service    = $request->solicited_service;

        $equipment->save();

        return redirect()->route('orderService.index')->with('success', 'Orden actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($folio)
    {
        $order = ServiceOrder::where('folio', $folio)->first();

        $order->delete();

        return back()->with('delete', 'Orden de servicio eliminada correctamente');
    }
}
