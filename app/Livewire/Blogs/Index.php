<?php

namespace App\Livewire\Blogs;

use App\Livewire\Forms\PostForm;
use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme='bootstrap';
    protected $listeners = ['postSaved' => '$refresh'];
    public Post $post;
    public $id;
    public $count;

    public PostForm $form;

    public $title,$content,$showFormModal = false;

    public function mount(){
        $this->count = 0;
    }

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



    public function edit($id = null){
        $this->showFormModal = true;
        $this->dispatch('item_edit', $id);
    }

    public function render()
    {
        return view('livewire.blogs.index', [
            'posts' => Post::latest()->paginate(5),
        ])->layout('layouts.app');
    }
   
}
