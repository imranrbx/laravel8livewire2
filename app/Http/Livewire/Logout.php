<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;

class Logout extends Component
{
    public function mount()
    {
        Auth::logout();
        session()->flash('status', 'Loggedout Successfully!');
        return redirect()->route('login');
    }
    public function render()
    {
        Auth::logout();
        return view('auth.login')->layout('layouts.app', ['title' => 'login']);
    }
}
