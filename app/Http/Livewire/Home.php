<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Home extends Component
{
    use AuthorizesRequests;
    private $title = "Home Page";
    public $num1 = 0;
    public $num2 = 0;
    public $result = 0;
    public $open = false;
    public $message = "";
    protected $listeners = ['checkedAndTested'];
    public function mount()
    {
        $this->authorize('isAdmin', auth()->user());
    }
    public function checkedAndTested()
    {
        $this->message = "Checked and Tested";
    }
    public function updatedNum1()
    {
        $this->emit('num1Changed');
    }
    public function updatedNum2()
    {
        $this->emit('num2Changed');
    }
    public function add()
    {
        $this->result = $this->num1 + $this->num2;
        $this->open = false;
        $this->emit('resultCalculated');
    }
    public function multiply()
    {
        $this->result = $this->num1 * $this->num2;
        $this->open = false;
        $this->emit('resultCalculated');
    }
    public function calculatedResult()
    {
        if ($this->num1 > $this->num2) {
            $this->message = "Num1 is Greater Than Num2";
        } elseif ($this->num1 < $this->num2) {
            $this->message = "Num1 is Less Than Num2";
        } else {
            $this->message = "Num1 is Equal To Num2";
        }
    }
    public function render()
    {
        return view('home')->layout('layouts.app', ['title' => $this->title]);
    }
}
