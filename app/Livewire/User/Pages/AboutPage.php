<?php

namespace App\Livewire\User\Pages;

use Livewire\Component;

class AboutPage extends Component
{
    public function render()
    {
        return view('livewire.user.pages.about-page')
        ->extends('layouts.user')
        ->section('content');
    }
}
