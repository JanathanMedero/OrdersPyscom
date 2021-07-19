<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['user_id', 'slug', 'name', 'rfc', 'phone', 'street', 'suburb', 'number', 'postal_code'];

    use HasFactory;

    public function SaleOrders()
    {
        return $this->hasMany(SaleOrder::class);
    }

    // public function ServiceOrders()
    // {
    //     return $this->hasMany(ServiceOrder::class);
    // }

    // public function OrderServideOnSites()
    // {
    //     return $this->hasMany(OrderServiceOnSite::class);
    // }
}
