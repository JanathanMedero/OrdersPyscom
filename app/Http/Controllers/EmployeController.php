<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployee;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class EmployeController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id === 1) {
            return view('admin.employe.index');
        }else{
            return view('admin.without_authorization');
        }

    }

    public function store(StoreEmployee $request)
    {
        Employe::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Cliente creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $employee = User::where('id', $id)->first();

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->role_id = $request->role_id;

        $employee->save();

        return back()->with('success', 'Empleado editado correctamente');
    }

    public function destroy($id)
    {
        $employee = User::where('id', $id)->first();

        $employee->delete();

        return back()->with('success', 'Empleado eliminado correctamente');
    }
}
