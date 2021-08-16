<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employe;
use App\Models\Role;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'role_id'   => $request->role_id,
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        return back()->with('success', 'Empleado creado correctamente');
    }

    public function edit($slug)
    {
        $employee = Employe::where('slug', $slug)->first();

        $roles = Role::all();

        return view('admin.employe.edit', compact('employee', 'roles'));
    }

    public function update(UpdateEmployeeRequest $request, $slug)
    {
        $employee = User::where('slug', $slug)->first();

        $employee->name = $request->name;
        $employee->slug = Str::slug($request->name);
        $employee->email = $request->email;
        $employee->role_id = $request->role_id;

        if($request->password){
            $employee->password = Hash::make($request->password);
        }

        $employee->save();

        return redirect()->route('employe.index')->with('success', 'Empleado editado correctamente');
    }

    public function destroy($id)
    {
        $employee = User::where('id', $id)->first();

        $employee->delete();

        return back()->with('success', 'Empleado eliminado correctamente');
    }
}
