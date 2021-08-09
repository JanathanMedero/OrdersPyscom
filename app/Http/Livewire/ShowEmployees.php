<?php

namespace App\Http\Livewire;

use App\Models\Employe;
use App\Models\Role;
use Livewire\Component;

class ShowEmployees extends Component
{
    public $search = "";

    public function render()
    {
        $employees = Employe::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate(15);

        $roles = Role::all();

        return view('livewire.show-employees', compact('employees', 'roles'));
    }
}
