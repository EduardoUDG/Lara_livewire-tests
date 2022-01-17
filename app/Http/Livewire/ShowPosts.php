<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class ShowPosts extends Component
{

    // Input of search
    public $search = '';

    // Inputs for post filter
    public $sort = 'id';
    public $direction = 'desc';

    // listening events
    protected $listeners = ['render' => 'render'];
    public function render()
    {
        $posts = Post::where('title', 'like', '%' . $this->search . '%')
                   ->orWhere('content', 'like', '%' . $this->search . '%')
                   ->orderBy( $this->sort, $this->direction )->get();
        return view('livewire.show-posts', compact('posts'));
    }

    public function sort($sort) {

        if( $this->sort == $sort ) {
            if( $this->direction == 'desc' ) {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort == 'asc';
        }

        $this->sort = $sort;
    }

}
