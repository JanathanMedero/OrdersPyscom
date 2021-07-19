<?php

namespace App\Models;

use App\Models\SaleOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function OrderSale()
    {
        retunr $this->hasOne(SaleOrder::class);
    }
}
