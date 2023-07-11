<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FailedComponent extends Component
{
    public function render()
    {
        return view('livewire.failed-component')->layout('layouts.base');
    }
}
