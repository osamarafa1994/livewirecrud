<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    #[Validate('required|min:5|string|max:255')]
    public $title = '';
 
    #[Validate('nullable|min:5')]
    public $content = '';



    public function setPost(Post $post)
    {
        $this->post = $post;
 
        $this->title = $post->title;
 
        $this->content = $post->content;
    }

    public function store($id) 
    {
        $this->validate();

        Post::updateOrCreate(['id'=>$id],
        $this->all()
         );
 
    }
}
