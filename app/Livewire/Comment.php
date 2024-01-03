<?php

namespace App\Livewire;

use App\Models\Comment as ModelsComment;
use Livewire\Component;

class Comment extends Component

{


    public $post;
    public $user;

    public $comment;
    public $comments;
    public function mount($post)
    {
        $this->post = $post;
        $this->user = auth()->user();
        $this->comments = $post->comments;
    }


    public function onSubmit()
    {



        $this->validate([
            'comment' => ['required', 'min:6', 'max:255']
        ]);


        ModelsComment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comment' => $this->comment,
        ]);

        session()->flash('message', 'comment has posted succesfull');
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
