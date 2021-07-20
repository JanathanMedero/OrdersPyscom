<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SaleOrder;

class ShowOrderSale extends Component
{

    public $order;

    public function mount($folio)
    {
        $this->order = SaleOrder::where('folio', $folio)->first();
    }

    public function render()
    {
        // $order = SaleOrder::where('folio', $folio)->first();

        return view('livewire.show-order-sale');
    }
}
