<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDetailComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-detail-component')->layout('layouts.base');
    }
}
