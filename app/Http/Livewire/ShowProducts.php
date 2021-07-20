<?php

namespace App\Http\Livewire;

use App\Models\SaleOrder;
use Livewire\Component;

class ShowProducts extends Component
{

    public $order;

    public function mount($folio)
    {
        $this->order = SaleOrder::where('folio', $folio)->first();
    }

    public function render()
    {
        return view('livewire.show-products');
    }
}
