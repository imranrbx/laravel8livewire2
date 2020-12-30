<?php

namespace App\Http\Livewire\Services;

use Livewire\Component;

class Home extends Component
{
    public $homeMessage;
    protected $listeners = ['resultCalculated' => 'calculatedResult'];
    public function calculatedResult()
    {
        $this->homeMessage = "I'm from Services Home";
    }
    public function render()
    {
        return view('livewire.services.home');
    }
}
