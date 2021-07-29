<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOnSites extends Model
{
    protected $table = 'service_on_sites';

    protected $fillable = ['order_service_id', 'name', 'slug', 'quantity', 'iva_price', 'net_price', 'description', 'observations', 'advance'];

    use HasFactory;
}
