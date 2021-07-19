<?php

namespace App\Http\Livewire;

use App\Models\SaleOrder;
use Livewire\Component;

class ShowOrdersSale extends Component
{
    public function render()
    {
        $orders = SaleOrder::all();

        return view('livewire.show-orders-sale', compact('orders'));
    }
}
