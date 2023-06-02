<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public string $name;
    public string $email;
    public bool $isSuccess = false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email'
    ];

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function updateUserInfo(): void
    {
        $validatedData = $this->validate();
        auth()->user()->update($validatedData);
        $this->isSuccess = true;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
