<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class Form extends Component
{

    public $add,$postId, $title, $content;
    protected $listeners = ['edit-post' => 'loadPost'];

    public function loadPost($id)
    {

        $post = Post::findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::updateOrCreate(
            ['id' => $this->postId],
            ['title' => $this->title, 'content' => $this->content]
        );

        $this->reset();
        $this->add = false;

        $this->dispatch('post-saved'); 

        session()->flash('message', 'تم الحفظ بنجاح');
    }

    public function render()
    {
        $this->add = true;
        return view('livewire.posts.form');
    }
}
