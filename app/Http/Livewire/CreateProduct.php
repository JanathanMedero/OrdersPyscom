<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class CreateProduct extends Component
{
    // public $date;

    // public function mount($date)
    // {
    //     $this->date = Carbon::now();
    // }

    public $users;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
