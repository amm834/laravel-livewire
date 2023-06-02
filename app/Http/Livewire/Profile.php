<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public string $name;
    public string $email;
    public bool $isSuccess = false;
    public User $user;

    protected $rules = [
        'user.name' => 'required|min:3',
        'user.email' => 'required|email'
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function updateUserInfo(): void
    {
        $validatedData = $this->validate();
        $this->user->save();
        $this->isSuccess = true;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
