<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    // To images
    use WithFileUploads;

    public $open = false;
    public $title, $content, $image, $identifier;

    // Constructor
    public function mount() {
        $this->identifier = rand();
    }


    // Validations
    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'image' => 'required|max:2048',
    ];

    public function save() {
        $this->validate();

        $image = $this->image->store('posts');

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image
        ]);

        $this->reset(['open', 'title', 'content', 'image']);
        $this->identifier = rand();

        $this->emitTo('show-posts', 'render');
        // $this->emit('render');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
