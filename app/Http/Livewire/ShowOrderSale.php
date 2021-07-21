<?php

namespace App\Http\Livewire;

use App\Models\SaleOrder;
use App\Models\User;
use Livewire\Component;

class ShowOrderSale extends Component
{

    public $order, $users;

    public function mount($folio)
    {

        $this->users = User::all();

        $this->order = SaleOrder::where('folio', $folio)->first();
    }

    public function render()
    {
        // $order = SaleOrder::where('folio', $folio)->first();

        return view('livewire.show-order-sale');
    }
}
