<?php

namespace App\Http\Livewire;

use App\Models\ServiceOrder;
use Livewire\Component;

class ShowOrdersService extends Component
{
    public $search = "";
    
    public function render()
    {
        $orders = ServiceOrder::where('folio', 'LIKE', '%' . $this->search . '%')->get();

        return view('livewire.show-orders-service', compact('orders'));
    }
}
