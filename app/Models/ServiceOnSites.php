<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOnSites extends Model
{
    use HasFactory;

    protected $table = 'service_on_sites';

    protected $fillable = ['order_service_id', 'name', 'slug', 'quantity', 'net_price', 'description'];

}
