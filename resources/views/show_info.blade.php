@extends('layouts.master')
@section('title', 'تفاصيل الإعلان')
@section('contact')
    @if(session('success') || session('error'))
        <div class="message-center" style="position: fixed;right: 40%;transform: translate(-50%, -50%);z-index: 9999;padding: 20px;border-radius: 8px;text-align: center;animation: fadeInOut 4s forwards;
        {{ session('success') ? 'background: #4CAF50; color: white;' : 'background: #F44336; color: white;' }}">
            {{ session('success') ?? session('error') }}
        </div>
    @endif
    <style>
        @keyframes fadeInOut {
            0% { opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; visibility: hidden; }
        }
    </style>
        <div dir="rtl" class="mt-5">
            <div class="container my-4 w-50">
                <div class="border rounded-4 w-100 w-md-75 w-lg-50 mx-auto" style="background-color: #f7FBFA">
                    <!-- معرض الصور -->
                    <div class="my-3">
                        <div id="mainListingImageContainer" class="text-center mb-3">
                            <img src="{{ asset($listings->primary_image) }}"
                                 class="img-fluid rounded-3 shadow-lg listing-main-image"
                                 style="height: 400px; object-fit: cover;"
                                 alt="الصورة الرئيسية للإعلان">
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            @foreach($listings->images as $image)
                                <div class="text-center">
                                    <img class="border rounded-3 listing-thumbnail"
                                         style="width: 80px; height: 60px; object-fit: cover; cursor: pointer;"
                                         src="{{ asset($image->path) }}"
                                         alt="معاينة صورة الإعلان"
                                         data-full-image="{{ asset($image->path) }}">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- معلومات الإعلان -->
                    <table class="table border-none listing-details-table">
                        <tr>
                            <td>
                                <img class="mx-1 location-icon" style="width: 20px;" src="{{ asset('assets/images/Map Point.png') }}">
                                <span class="listing-region">{{ $listings->region->name }}</span>
                            </td>
                            <td>
                                <img class="mx-1 time-icon" style="width: 20px;" src="{{ asset('assets/images/time.png') }}">
                                <span class="listing-post-date">{{ $listings->created_at->diffForHumans() }}</span>
                            </td>
                            <td>
                                <img class="mx-1 status-icon" style="width: 20px;" src="{{ asset('assets/images/status_ads.png') }}">
                                <span class="listing-status">{{ $listings->status }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: none">
                                <img class="mx-1 user-icon" style="width: 20px;" src="{{ asset('assets/images/User Rounded.png') }}">
                                <span class="listing-owner">{{ $listings->user->name }}</span>
                            </td>
                            <td style="border: none">
                                <img class="mx-1 price-icon" style="width: 20px;" src="{{ asset('assets/images/Dollar Minimalistic.png') }}">
                                <span class="listing-price">{{ $listings->price }} ({{ $listings->currency->abbr }})</span>
                            </td>
                            <td style="border: none">
                            <span class="badge rounded-pill text-dark listing-category"
                                  style="background-color: var(--warning-custom-color); font-size: 0.875rem; padding: 0.25rem 0.5rem;">
                                {{ $listings->category->name }}
                            </span>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- وصف الإعلان -->
                <div class="p-2 my-3 listing-description-section">
                    <h2 class="mb-2">تفاصيل الإعلان</h2>
                    <p class="listing-description-text">{{$listings->description}}</p>
                </div>

                <!-- أزرار الإجراءات -->
                <div class="d-flex justify-content-evenly listing-actions">
                    <livewire:share-listing :listingId="$listings->id" />
                </div>

                <!-- قسم التعليقات -->
                <livewire:show-comment :listingId="$listings->id" />
                @auth
                    <livewire:add-comment :listingId="$listings->id" />
                @endauth
            </div>
        </div>
    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainListingImage = document.getElementById('mainListingImageContainer').querySelector('img');
            const listingThumbnails = document.querySelectorAll('.listing-thumbnail');

            listingThumbnails.forEach((thumbnail) => {
                thumbnail.addEventListener('click', () => {
                    listingThumbnails.forEach(thumb => thumb.classList.remove('thumbnail-active'));
                    mainListingImage.src = thumbnail.getAttribute('data-full-image');
                    thumbnail.classList.add('thumbnail-active');
                });
            });
        });
    </script>
