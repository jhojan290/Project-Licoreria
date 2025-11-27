<?php

namespace App\Livewire\User\Elements;

use Livewire\Component;

class Sidebar extends Component
{
    public $open = false;
    public $title = '';
    public $partial = null;

    protected $listeners = [
        'openSidebar' => 'open'
    ];

    public function open($title, $partial)
    {
        $this->title = $title;
        $this->partial = $partial;
        $this->open = true;
    }

    public function close()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.user.elements.sidebar');
    }
}
