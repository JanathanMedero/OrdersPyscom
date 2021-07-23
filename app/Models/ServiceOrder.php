<?php

namespace App\Models;

use App\Models\Equipment;
use App\Models\Technical;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;
}


public function technical()
{
    return $this->belongsTo(Technical::class);
}

public function equipment()
{
    return $this->belongsTo(Equipment::class);
}