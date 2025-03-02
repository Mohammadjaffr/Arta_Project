<?php

namespace App\Livewire;

use App\Models\image;
use App\Models\listing;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUploader extends Component
{
    use WithFileUploads;

    #[Rule('required|image|max:1024')]
    public $primary_image;
    public $images = [];


    public function render()
    {
        return view('livewire.image-uploader');
    }
}
