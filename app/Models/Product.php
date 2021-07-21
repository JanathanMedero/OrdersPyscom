<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['sale_id', 'name', 'slug', 'quantity', 'unit_price', 'net_price', 'description', 'observations'];

    public function SaleOrder()
    {
        return $this->belongsTo(SaleOrder::class, 'id');
    }

}
