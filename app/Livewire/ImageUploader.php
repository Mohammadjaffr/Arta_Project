<?php

namespace App\Livewire;

use App\Models\image;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUploader extends Component
{
    use WithFileUploads;

    #[Rule('required|image|max:1024')]
    public $mainImage;
    public $images = [];

    public function updatedMainImage()
    {
       $val= $this->validate();
        if ($this->mainImage) {
            $val['mainImage'] = $this->mainImage->store('images', 'public');
        }
        image::query()->create($val);
    $this->reset('mainImage');
    }

    public function updatedImages()
    {
        $this->validate([
            'images.*' => 'image|max:1024', // 1MB Max لكل صورة
        ]);
    }

    public function render()
    {
        return view('livewire.image-uploader');
    }
}
