<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use App\Models\OrderServiceOnSite;
use App\Models\SaleOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use DB;


class ClientController extends Controller
{
    public function index()
    {
        return view('admin.clients.index');
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create([
            'slug'          => 'client-'.rand(1,99999),
            'name'          => $request->name,
            'rfc'           => $request->rfc,
            'phone'         => $request->phone,
            'street'        => $request->street,
            'suburb'        => $request->suburb,
            'number'        => $request->number,
            'postal_code'   => $request->postal_code,
        ]);

        return redirect()->route('clients.index')->with('success', 'Cliente creado correctamente');
    }

    public function edit($slug)
    {   
        $client = Client::where('slug', $slug)->first();

        return view('admin.clients.edit', compact('client'));
    }

    public function update(StoreClientRequest $request, $slug)
    {
    
        $client = Client::where('slug', $slug)->first();

        $order = SaleOrder::where('client_id', $client->id)->first();

        $client->slug = $client->slug; 
        $client->name = $request->name;
        $client->rfc = $request->rfc;
        $client->phone = $request->phone;
        $client->street = $request->street;
        $client->suburb = $request->suburb;
        $client->number = $request->number;
        $client->postal_code = $request->postal_code;

        $client->save();

        $route = url()->previous();

        if (Str::contains($route, 'edit-client')) {

            $client->slug = $client->slug; 
            $client->name = $request->name;
            $client->rfc = $request->rfc;
            $client->phone = $request->phone;
            $client->street = $request->street;
            $client->suburb = $request->suburb;
            $client->number = $request->number;
            $client->postal_code = $request->postal_code;

            $client->save();


            return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente');

        }elseif (Str::contains($route, 'Order-sale')) {

            DB::beginTransaction();

            try {

                $client = Client::where('slug', $slug)->first();

                $order = SaleOrder::where('client_id', $client->id)->first();

                $client->slug = $client->slug; 
                $client->name = $request->name;
                $client->rfc = $request->rfc;
                $client->phone = $request->phone;
                $client->street = $request->street;
                $client->suburb = $request->suburb;
                $client->number = $request->number;
                $client->postal_code = $request->postal_code;

                $order->office_id = $request->office_id;

                $client->save();
                $order->save();

                DB::commit();
                
            } catch (Exception $e) {
                DB::rollback();
            }

            return redirect()->route('products.index', $order->folio)->with('success', 'Orden actualizada correctamente');

        }elseif (Str::contains($route, 'Order-service-in-site')) {

            try {

                $client = Client::where('slug', $slug)->first();

                $order = OrderServiceOnSite::where('client_id', $client->id)->first();

                $client->slug = $client->slug; 
                $client->name = $request->name;
                $client->rfc = $request->rfc;
                $client->phone = $request->phone;
                $client->street = $request->street;
                $client->suburb = $request->suburb;
                $client->number = $request->number;
                $client->postal_code = $request->postal_code;

                $order->office_id = $request->office_id;

                $client->save();
                $order->save();

                DB::commit();
                
                } catch (Exception $e) {
                    DB::rollback();
                }


            return redirect()->route('orderSite.show', $order->folio)->with('success', 'Orden actualizada correctamente');
        }


    }

    public function destroy($slug)
    {

        $client = Client::where('slug', $slug)->first();

        $client->delete();

        return back()->with('delete', 'Cliente eliminado correctamente');
    }
}
