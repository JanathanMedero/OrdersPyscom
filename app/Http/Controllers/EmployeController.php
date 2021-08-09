<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployee;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeController extends Controller
{
    public function index()
    {
        return view('admin.employe.index');
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
}
