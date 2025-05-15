<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;


class Edit extends Component
{
    public $user;
    public $name, $email,$user_id;
    public $sections = [];

    

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->user_id = $user->id;
        $this->sections = $user->sections()->get(['title', 'value'])->toArray();
    }

    public function addSection() { $this->sections[] = ['title' => '', 'value' => '']; }
    public function removeSection($index) {
        unset($this->sections[$index]);
        $this->sections = array_values($this->sections);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
            'sections.*.title' => 'required|string',
            'sections.*.value' => 'nullable|string',
        ]);
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->password = 'xxxxx';
        $this->user->save();
        $this->user->sections()->delete();
        foreach ($this->sections as $section) {
            $this->user->sections()->create($section);
        }
        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.users.form')->layout('layouts.app');
    }
}
