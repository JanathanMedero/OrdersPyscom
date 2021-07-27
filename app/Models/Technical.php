<?php

namespace App\Models;

use App\Models\ServiceOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technical extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class);
    }
}

