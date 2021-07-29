<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderServiceOnSite extends Model
{

    protected $table = 'order_service_on_sites';

    protected $fillable = ['user_id', 'client_id', 'date_of_service'];

    use HasFactory;
}
