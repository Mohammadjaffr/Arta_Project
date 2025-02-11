<?php

namespace App\Livewire;

use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddComplaint extends Component
{
    #[Rule('required')]
    public $content;
    public $listingId;


    public function mount($listingId)
    {
        $this->listingId = $listingId;
    }

    public function send()
    {
        $this->validate();
        Complaint::create([
            'content' => $this->content,
            'user_id' => Auth::id(),
            'listing_id' => $this->listingId,
        ]);
        $this->reset('content');
        session()->flash('message', 'Complaint created successfully.');
        return redirect()->to('/show_info/' . $this->listingId);
    }
    public function render()
    {
        return view('livewire.add-complaint');
    }
}
