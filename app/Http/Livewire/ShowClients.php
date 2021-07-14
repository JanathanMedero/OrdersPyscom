<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class ShowClients extends Component
{
    public $search = "";

    public function render()
    {
        $clients = Client::where('name', 'like', '%' . $this->search . '%')
                            // orWhere('folio', 'like', '%' . $this->search . '%')
        ->get();

        return view('livewire.show-clients', compact('clients'));
    }
}
