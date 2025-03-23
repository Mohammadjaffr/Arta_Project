@extends('layouts.master')
@section('title', 'المعلومات')
@section('contact')
    <div dir="rtl" class=" mt-5">
        <div class="container my-4 w-50 ">
            <div class="border rounded-4 w-100 w-md-75 w-lg-50 mx-auto" style="background-color: #f7FBFA">
                <!-- Carousel Section -->
                <div class="my-3">
                    <div id="main-image" class="text-center mb-3">

                        <img src="http://127.0.0.1:8000/{{ $listings->primary_image }}" class="img-fluid rounded-3 shadow-lg " style="height: 400px; object-fit: cover;" alt="Main Image">
                    </div>
                    <div class="d-flex justify-content-center gap-2">
                        @foreach($listings->images as $listing)

                            <div class="text-center">
                                <img class="border rounded-3 image-preview"
                                     style="width: 80px; height: 60px; object-fit: cover; cursor: pointer;"
                                     src="http://127.0.0.1:8000/{{ $listing->path }}"
                                     alt="Preview"
                                     data-full-image="http://127.0.0.1:8000/{{ $listing->path }}">
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Ad Details Section -->
                <table class="table border-none">
                    <tr>
                        <td>
                            <img class="mx-1 " style="width: 20px;" src="{{ asset('assets/images/Map Point.png') }}">
                            <label>{{ $listings->region->name }}</label>

                        </td>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/time.png') }}">
                            <label>{{ $listings->created_at->diffForHumans() }}</label>
                        </td>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/status_ads.png') }}">
                            <label>{{ $listings->status }}</label>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: none">
                            <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/User Rounded.png') }}">
                            <label>{{ $listings->user->name }}</label>
                        </td>
                        <td style="border: none">
                            <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/Dollar Minimalistic.png') }}">
                            <label>{{ $listings->price }} ({{ $listings->currency->abbr }})</label>
                        </td>
                        <td style="border: none">
                            <span class="badge rounded-pill text-dark" style="background-color: var(--warning-custom-color); font-size: 0.875rem; padding: 0.25rem 0.5rem;">{{ $listings->category->name }}</span>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Ad Description Section -->
            <div class="p-2 my-3">
                <h2 class="mb-2">تفاصيل الاعلان</h2>
                <p>{{$listings->description}}</p>
            </div>
             <!-- End Ad Description Section -->
            <!-- Action Buttons Section -->
            <div class="d-flex justify-content-evenly">
                <livewire:share-listing :listingId="$listings->id" />
<<<<<<< Updated upstream
            </div>
            <div class="d-flex justify-content-evenly">
{{--                <livewire:chat :listing_id="$listings->id" />--}}
=======

            </div>
            <div class="d-flex justify-content-evenly">
                <livewire:chat :listingId="$listings->id" :receiverId="$listings->user_id" />
>>>>>>> Stashed changes
            </div>

            <!-- Comment Section -->
            <livewire:show-comment :listingId="$listings->id" />
                @if(Auth::user())
                    <livewire:add-comment :listingId="$listings->id" />
                @endif
            <!-- End Comment Section -->


    </div>
@endsection

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const mainImage = document.getElementById('main-image').querySelector('img');
    const previewImages = document.querySelectorAll('.image-preview');
    previewImages.forEach((img) => {
        img.addEventListener('click', () => {
            previewImages.forEach(preview => preview.classList.remove('hidden'));
            mainImage.src = img.getAttribute('data-full-image');
            img.classList.add('hidden');
        });
    });
});
</script>
