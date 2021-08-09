<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrController extends Controller
{
    public function show()
    {
        return view('Qr.qr');
    }
}
