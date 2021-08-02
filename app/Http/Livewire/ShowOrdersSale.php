<?php

namespace App\Http\Livewire;

use App\Models\SaleOrder;
use Livewire\Component;

class ShowOrdersSale extends Component
{
    public $search = "";

    public function render()
    {

        $orders = SaleOrder::where('folio', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'DESC')
        ->paginate(15);

        return view('livewire.show-orders-sale', compact('orders'));
    }
}
