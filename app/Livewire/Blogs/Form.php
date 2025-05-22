<?php

namespace App\Livewire\Blogs;

use Livewire\Component;
use App\Models\Post;
use App\Livewire\Forms\PostForm;

class Form extends Component
{
    protected $listeners = ['item_edit' => 'loadPost'];

    public PostForm $form;
    public $id;


    public function loadPost($id = null)
    {
        $this->post = Post::findOrFail($id);
        $this->form->setPost($this->post);
    }
    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        session()->flash('message', 'Post deleted successfully.');
        return redirect()->route('blogs.index');

    }

    public function mount($id = null)
    {
        $this->id = $id;
        $this->post = $id ? Post::findOrFail($id) : new Post();
        $this->form->setPost($this->post);
    }

    public function save()
    {
        $this->form->store($this->id);
        $this->dispatch(event: 'postSaved');
        $this->reset();
    
        session()->flash('message', 'Post saved successfully.');
        $this->dispatch('navigate-to', url: route('blogs.index'));
        return redirect()->route('blogs.index');

    }

    public function render()
    {
        return view('livewire.blogs.form')->layout('layouts.app');
    }
}
