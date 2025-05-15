<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class Create extends Component
{
    public $user;
    public $name, $email;
    public $sections = [ ['title' => '', 'value' => ''] ];

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'sections.*.title' => 'required|string',
        'sections.*.value' => 'nullable|string',
    ];

    public function mount()
    {
        $this->user = new User();
    }

    public function addSection() { $this->sections[] = ['title' => '', 'value' => '']; }
    public function removeSection($index) {
        unset($this->sections[$index]);
        $this->sections = array_values($this->sections);
    }

    public function save()
    {

        $this->validate();
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->password = 'xxxxx';
        $this->user->save();

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
