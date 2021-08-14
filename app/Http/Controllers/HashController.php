<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HashController extends Controller
{
    public function index()
    {
        return Hash::make('administracion.pyscom2021');
    }
}
