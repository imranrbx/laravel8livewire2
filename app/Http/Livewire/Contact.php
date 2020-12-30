<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Contact extends Component
{
    use WithFileUploads;
    public $num1;
    public $num2;
    public $photo;
    public $result;
    public $message = "";
    protected $rules = [
        'num1' => 'required|min:2|max:4',
        'num2' => 'required|min:2|max:4',
    ];
    // protected $messages = [
    //     'num1.required' => 'Hey! :attribute this is a required Field',
    //     'num2.required' => 'Hey! :attribute this is a required Field',
    // ];
    protected $listeners = ['resultCalculated' => 'calculatedResult'];
    public function updatedPhoto()
    {
        $this->validate([
             'photo' => 'image|max:1024'
        ]);
    }
    public function downloadFile()
    {
        return response()->streamDownload(function () {
            echo "CS Contents are Downloading...";
        }, 'exported.csv');
    }
    public function add()
    {
        $this->validate();
        sleep(3);
        // $this->photo->store('photos');

        $this->result = $this->num1 + $this->num2;
        $this->emit('resultCalculated');
        // session()->flash('message', 'Record Succesfully Calculated!');
        // return redirect()->to('/home');
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
        return view('livewire.contact');
    }
}
