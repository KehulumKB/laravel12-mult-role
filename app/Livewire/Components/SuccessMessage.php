<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SuccessMessage extends Component
{
    public $message;

    public function mount($message = null)
    {
        $this->message = $message;
    }
    
    public function render()
    {
        return view('livewire.components.success-message');
    }
}
