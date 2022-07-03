<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    public $posts, $title, $body, $post_id;
    public $update_mode = false;

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.posts');
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->body = '';
    }

    public function store()
    {
        $validate = $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        Post::query()->create($validate);

        session()->flash('message', 'Post created successfully!');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Post::query()->findOrFail($id);

        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->body = $post->body;

        $this->update_mode = true;
    }

    public function cancel()
    {
        $this->update_mode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::query()->findOrFail($this->post_id);

        $post->update([
            'title' => $this->title,
            'body' => $this->body
        ]);

        $this->update_mode = false;

        session()->flash('message', 'Post updated successfully!');
        $this->resetInputFields();
    }

    public function destroy($id)
    {
        Post::query()->find($id)->delete();
        session()->flash('message', 'Post deleted successfully!');
    }
}
