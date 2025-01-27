<?php

namespace App\Livewire;

use App\Models\listing;
use App\Repositories\ListingRepository;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddListing extends Component
{
    #[Rule('required|min:30|max:30')]
    public $status;
    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $description;
    #[Rule('required')]
    public $price;

    private ListingRepository $ListingRepository;

    public function  mount(ListingRepository $ListingRepository)
    {
        $this->ListingRepository = $ListingRepository;
    }
    protected $rules = [
        'status' => 'required|in:new,used,semi-new',
    ];
    public function createListing()
    {
        $this->validate();
        listing::query()->create([
            'status' => $this->status,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
        ]);
        $this->reset(['category', 'city', 'title', 'description', 'price', 'status']);

        // إرسال رسالة نجاح
        session()->flash('message', 'تم نشر الإعلان بنجاح!');
    }


    public function render()
    {
        return view('livewire.add-listing');
    }
}
