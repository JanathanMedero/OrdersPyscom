<?php

namespace App\Http\Livewire;

use App\Models\ServiceOrder;
use Livewire\Component;

class ShowOrdersService extends Component
{
    public $search = "";
    
    public function render()
    {
        $orders = ServiceOrder::where('id', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate(15);

        return view('livewire.show-orders-service', compact('orders'));
    }
}
