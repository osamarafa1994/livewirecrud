<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{

    public $showForm = false;

    protected $listeners = ['post-saved' => '$refresh'];

    
    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function edit($id)
    {
        $this->dispatch('edit-post', id: $id); // إرسال ID للفورم
    }

    
    public function render()
    {
        $data['posts'] = Post::get();
        return view('livewire.posts.posts',$data)->layout('layouts.app');
    }
}
