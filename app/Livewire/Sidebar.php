<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $open = false;
    public $title = '';
    public $content = '';

    protected $listeners = [
        'openSidebar' => 'open'
    ];

    public function open($title, $partial)
    {
        $this->title = $title;
        $this->content = view("partials.$partial")->render();  // carga partial
        $this->open = true;
    }

    public function close()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
