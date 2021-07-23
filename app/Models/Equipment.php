<?php

namespace App\Models;

use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
}

public function ServiceOrder()
{
    return $this->belongsTo(ServiceOrder::class);
}

public function Services()
{
    return $this->hasMany(Service::class);
}