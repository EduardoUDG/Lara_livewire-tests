<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditPost extends Component
{

    // To images
    use WithFileUploads;

    public $open = false;
    public $post, $image, $identifier;

    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required'
    ];


    public function mount( Post $post ) {
        $this->post = $post;
        $this->identifier = rand();
    }


    public function save() {
        $this->validate();

        // Delete image and updating
        if( $this->image ) {
            Storage::delete([$this->post->image]);
            $url = $this->image->store('posts');
            $this->post->image = $url;
        }
        $this->post->save();


        $this->reset(['open']);
        $this->identifier = rand();
        $this->emitTo('show-posts', 'render');
    }


    public function render() {
        return view('livewire.edit-post');
    }

}
