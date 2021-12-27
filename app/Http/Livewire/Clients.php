<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class Clients extends Component
{
    public function render()
    {
        return view('clients.clients', ['clients' => Client::latest()->paginate(4)]);
    }
}
