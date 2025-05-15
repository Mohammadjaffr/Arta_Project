<?php

namespace App\Livewire;

use App\Models\Complaint;
use App\Models\listing;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ShareListing extends Component
{
    public $listingId;
    public $listingData = [];
    #[Rule('required')]
    public $content;


    public $showFallbackOptions = false;

    public function mount($listingId)
    {
        $this->listingId = $listingId;
        $this->loadlistingData();
    }

    // سحب بيانات الإعلان من قاعدة البيانات
    private function loadlistingData()
    {
        $listing = listing::query()->find($this->listingId);
        if ($listing) {
            $this->listingData = [
                'title' => $listing->title,
                'text' => $listing->description,
                'price' => $listing->price,
                'currency' => $listing->currency_id,
                'status' => $listing->status,
                'category_id' => $listing->category_id,
                'region_id' => $listing->region_id,
                'primary_image' => $listing->primary_image,
                'url' => route('listing.show', $listing->id),
                'location' => $listing->location,
                'additional_images' => $listing->images,
                'published_at' => $listing->created_at,
                'views' => $listing->views,
            ];
        }
    }

    public function share()
    {
        if (isset($this->listingData['url'])) {
            if ($this->canShare()) {
                $this->dispatchBrowserEvent('trigger-share', $this->listingData);
            } else {
                $this->showFallbackOptions = true;
            }
        }


    }

    private function canShare()
    {
        return method_exists('navigator' ,'share');
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
        session()->flash('success', 'تم انشاء الشكوى بنجاح');
        return redirect()->to('/listing/' . $this->listingId);
    }
    public function redirectToWhatsApp($listingId)
    {
        $listing = listing::query()->find($listingId);

        if ($listing && $listing->user->whatsapp_number) {

            $phoneNumber = $listing->user->whatsapp_number;

            // إنشاء رابط واتساب
            $whatsappUrl = "https://wa.me/+967{$phoneNumber}";

            // توجيه المستخدم إلى واتساب
            return redirect()->away($whatsappUrl);
        }

        // إذا لم يكن هناك رقم هاتف
        session()->flash('error', 'رقم الهاتف غير متوفر.');
        return null;
    }





    public function render()
    {

        $listings = listing::query()->find($this->listingId);
        return view('livewire.share-listing',compact('listings'));
    }
}
