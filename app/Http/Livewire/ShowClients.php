<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ShowClients extends Component
{

    use WithPagination;

    public function render()
    {
        public $search = "";
        
        $clients = Client::where('name', 'like', '%' . $this->search . '%')
                            // orWhere('folio', 'like', '%' . $this->search . '%')
        ->paginate(15);

        return view('livewire.show-clients', compact('clients'));
    }
}
