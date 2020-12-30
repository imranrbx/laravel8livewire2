<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $search;
    public $readyToload = false;
    protected $queryString = ['search'];
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function loadUsers()
    {
        $this->readyToload = true;
    }
    public function render()
    {
        $users = $this->readyToload ? User::where('name', 'like', "%{$this->search}%")->paginate(10) : [];

        return view('livewire.users', ['users' => $users]);
    }
}
