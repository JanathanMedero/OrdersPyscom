<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Equipment;
use App\Models\Technical;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    protected $fillable = ['user_id', 'client_id', 'folio', 'date_of_service'];

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