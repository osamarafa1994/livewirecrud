<?php

namespace App\Livewire\Blogs;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $listeners = ['postSaved' => '$refresh'];
    public Post $post;
    public $title,$content,$showForm = false;

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        session()->flash('message', 'Post deleted successfully.');
    }

    public function save()
    {
        $this->validate();
        
        // $this->post->title = $this->title;
        // $this->post->content = $this->content;
        $this->post->create($this->all());
        $this->dispatch('postSaved');
        $this->reset();
    
        session()->flash('message', 'Post saved successfully.');
        // return redirect()->route('blogs.index');

    }

    public function showFormModal()
    {
        $this->showForm = true;
        $this->reset();
    }

    public function hideFormModal()
    {
        $this->showForm = false;
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
