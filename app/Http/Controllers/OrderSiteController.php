<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderServiceOnSiteRequest;
use App\Models\Client;
use App\Models\Office;
use App\Models\OrderServiceOnSite;
use App\Models\ServiceOnSites;
use App\Models\User;
use Carbon\carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str; 

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

        $offices = Office::all();

        return view('admin.siteOrder.create', compact('client', 'date', 'users', 'offices'));
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
                'user_id'           => $request->employee_id,
                'client_id'         => $client->id,
                'office_id'         => $request->office_id,
                'folio'             => rand(1, 99999),
                'date_of_service'   => $request->date_of_service,
                'observations'      => $request->observations,
                'advance'           => $request->advance,
            ]);

             preg_replace('/[^A-Za-z0-9-]+/','-',$request->name).'-'.rand(1, 99999);

            ServiceOnSites::create([
                'order_service_id'  => $order->id,
                'name'              => $request->name,
                // 'slug'              => Str::slug($request->name, '-').'-'.rand(1, 99999),
                'slug'              => preg_replace('/[^A-Za-z0-9-]+/','-',$request->name).'-'.rand(1, 99999),
                'quantity'          => $request->quantity,
                'iva_price'         => $request->iva_price,
                'net_price'         => $request->net_price,
                'description'       => $request->description,
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
    public function show($folio)
    {
        $order = OrderServiceOnSite::where('folio', $folio)->first();

        $users = User::all();

        return view('admin.siteOrder.show', compact('order', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($folio)
    {
        $order = OrderServiceOnSite::where('folio', $folio)->first();

        $offices = Office::all();

        return view('admin.siteOrder.edit', compact('order', 'offices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAdvance(Request $request, $folio)
    {
        $order = OrderServiceOnSite::where('folio', $folio)->first();

        $order->advance = $request->advance;

        $order->save();

        return back()->with('success', 'Anticipo actualizado correctamente');
    }

    public function updateObservations(Request $request, $folio)
    {
        $observation = OrderServiceOnSite::where('folio', $folio)->first();

        $observation->observations = $request->observation;

        $observation->save();

        return back()->with('success', 'Observaciones actualizadas correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($folio)
    {
        $order = OrderServiceOnSite::where('folio', $folio)->first();

        if (File::exists(public_path('qrcodes/qrcode-'.$order->folio.'.svg'))) {
            File::delete(public_path('qrcodes/qrcode-'.$order->folio.'.svg'));
        }

        $order->delete();

        return back()->with('success', 'Orden de sitio eliminada correctamente');
    }
}
