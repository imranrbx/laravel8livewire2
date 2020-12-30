<?php

namespace App\Http\Livewire\Services;

use Livewire\Component;

class Web extends Component
{
    public $webMessage;
    protected $listeners = ['resultCalculated' => 'calculatedResult'];
    public function calculatedResult()
    {
        $this->webMessage = "I'm Comming from Web Service Component";
        $this->emitUp('checkedAndTested');
    }
    public function render()
    {
        return view('livewire.services.web');
    }
}
