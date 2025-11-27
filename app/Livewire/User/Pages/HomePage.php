<?php

namespace App\Livewire\User\Pages;

use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.user.pages.home-page')
        ->extends('layouts.user')
        ->section('content');
    }
}
