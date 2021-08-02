<?php

namespace App\Http\Livewire;

use App\Models\OrderServiceOnSite;
use Livewire\Component;

class ShowOrdersSite extends Component
{
    public $search = "";

    public function render()
    {
         $orders = OrderServiceOnSite::where('folio', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate(15);

        return view('livewire.show-orders-site', compact('orders'));
    }
}
