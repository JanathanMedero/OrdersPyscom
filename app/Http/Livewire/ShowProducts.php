<?php

namespace App\Http\Livewire;

use App\Models\SaleOrder;
use Livewire\Component;
use DB;

class ShowProducts extends Component
{

    public $order, $users, $user_id, $sale_id, $name, $quantity, $unit_price, $net_price, $description, $observations, $date_of_sale;

    public function mount($folio)
    {
        $this->order = SaleOrder::where('folio', $folio)->first();
    }

    public function render()
    {
        return view('livewire.show-products');
    }
}
