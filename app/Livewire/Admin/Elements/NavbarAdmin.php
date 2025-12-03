<?php

namespace App\Livewire\Admin\Elements;

use Livewire\Component;

class NavbarAdmin extends Component
{
    public function render()
    {
        return view('livewire.admin.elements.navbar-admin')
        ->extends('layouts.user')
        ->section('content');
    }
}
