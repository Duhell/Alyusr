<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;

class GalleryPage extends Component
{
    public $tag;

    public function mount($tag){
        $this->tag = $tag;
    }
    public function render()
    {
        return view('livewire.gallery-page')->with(['images'=>Gallery::where('tag',$this->tag)->get()]);
    }
}
