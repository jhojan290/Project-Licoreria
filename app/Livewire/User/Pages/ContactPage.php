<?php

namespace App\Livewire\User\Pages;

use Livewire\Component;

class ContactPage extends Component
{
    public function render()
    {
        return view('livewire.user.pages.contact-page')
        ->extends('layouts.user')
        ->section('content');
    }
}
