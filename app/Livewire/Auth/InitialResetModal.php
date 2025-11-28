<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\On;

class InitialResetModal extends Component
{
    public $showModal = false;
    public $email = '';
    // 'request' = Formulario (Imagen 6), 'status' = Mensaje éxito (Imagen 5)
    public $step = 'request'; 
    public $statusMessage = '';

    #[On('open-reset-modal')]
    public function openResetModal()
    {
        $this->reset(['email', 'statusMessage']);
        $this->step = 'request';
        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function sendLink(AuthService $authService)
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'No encontramos una cuenta con ese correo.'
        ]);

        // Usamos el servicio
        $status = $authService->sendResetLink($this->email);

        if ($status === Password::RESET_LINK_SENT) {
            // Si se envió bien, cambiamos al paso 2 (Imagen 5)
            $this->step = 'status';
        } else {
            // Si hubo un error técnico (raro)
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.auth.initial-reset-modal');
    }
}
