<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Equipment;
use App\Models\Technical;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    protected $fillable = ['user_id', 'client_id', 'folio', 'date_of_service', 'technical_report', 'special_remarks', 'price', 'delivery_date'];

    protected $dates = ['delivery_date'];

    use HasFactory;

    public function technical()
    {
        return $this->belongsTo(Technical::class);
    }

    public function equipment()
    {
        return $this->hasOne(Equipment::class, 'service_id');
    }

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
    
}