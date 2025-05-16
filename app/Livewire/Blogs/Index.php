<?php

namespace App\Livewire\Blogs;

use App\Livewire\Forms\PostForm;
use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $listeners = ['postSaved' => '$refresh'];
    public Post $post;
    public $id;

    public PostForm $form;

    public $title,$content,$showFormModal = false;

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        session()->flash('message', 'Post deleted successfully.');
    }

    public function openFormModal()
    {
        $this->reset(['title', 'content']);
        $this->showFormModal = true;
    }

    public function save()
    {
        $this->form->store($this->id);
        $this->dispatch('postSaved');
        $this->reset();
    
        session()->flash('message', 'Post saved successfully.');
        return redirect()->route('blogs.index');

    }


    public function edit($id = null){

       return redirect()->route('blogs.edit',$id);
    }

    public function render()
    {
        return view('livewire.blogs.index', [
            'posts' => Post::latest()->paginate(5),
        ])->layout('layouts.app');
    }
   
}
