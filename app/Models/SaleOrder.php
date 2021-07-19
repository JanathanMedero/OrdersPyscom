<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    protected $fillable = ['user_id', 'client_id', 'folio', 'date_of_sale'];

    use HasFactory;


    public function Products()
    {
        return $this->hasMany(Product::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
