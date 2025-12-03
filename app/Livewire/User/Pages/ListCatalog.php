<?php

namespace App\Livewire\User\Pages;

use Livewire\Component;

class ListCatalog extends Component
{
    public function render()
    {
        return view('livewire.user.pages.list-catalog')
        ->extends('layouts.user')
        ->section('content');
    }
}
