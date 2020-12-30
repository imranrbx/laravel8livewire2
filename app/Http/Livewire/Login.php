<?php

namespace App\Http\Livewire;

use Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remeber = false;
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];
    public function login()
    {
        $this->validate();
        if (Auth::attempt(['email'=> $this->email, 'password'=>$this->password])) {
            session()->flash('status', 'Successfully Logged in');
            return redirect()->route('home');
        }
         throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
         ]);
    }
    public function render()
    {
        return view('auth.login')->layout('layouts.app', ['title' => 'Login']);
    }
}
