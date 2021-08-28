<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\ServiceOrder;
use Livewire\Component;

class ShowServicesOrders extends Component
{
    public $search="";
    public $client;

    public function mount($slug)
    {
        $this->client = Client::where('slug', $slug)->first();
    }

    public function render()
    {
        $orders = ServiceOrder::where('client_id', $this->client->id)->where('id', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate(15);

        return view('livewire.show-services-orders', compact('orders'));
    }
}
