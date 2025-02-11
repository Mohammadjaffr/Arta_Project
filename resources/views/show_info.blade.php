@extends('layouts.master')
@section('title', 'المعلومات')
@section('contact')
    <div dir="rtl" class=" mt-5">
        <div class="container my-4 w-50 ">
            <div class="border rounded-4 w-100 w-md-75 w-lg-50 mx-auto " style="background-color: #f7FBFA">
                <!-- Carousel Section -->
                <div class="m-3 border rounded-3 ">
                    <div id="info_slid" class="carousel slide position-relative">
                        <!-- Carousel Indicators -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#info_slid" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#info_slid" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#info_slid" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>

                        <!-- Carousel Inner -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="#" class="d-block w-100 img-fluid" style="height: 400px; object-fit: cover;" alt="...">

                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/women_s_fashion.png') }}" class="d-block w-100 img-fluid" style="height: 400px; object-fit: cover;" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/car.jpg') }}" class="d-block w-100 img-fluid" style="height: 400px; object-fit: cover;" alt="...">
                            </div>
                        </div>

                        <!-- Image Previews -->
                        <div class="position-absolute d-flex justify-content-center" style="bottom: 10px; right:-12%; transform: translateX(-50%); gap: 10px;">
                            <div class="text-center">
                                <img class="border rounded-3 image-preview" style="width: 80px; height: 60px; object-fit: cover;" src="{{ asset('assets/images/car.jpg') }}" alt="Preview 1" data-bs-target="#info_slid" data-bs-slide-to="0">
                            </div>
                            <div class="text-center">
                                <img class="border rounded-3 image-preview" style="width: 80px; height: 60px; object-fit: cover; " src="{{ asset('assets/images/women_s_fashion.png') }}" alt="Preview 2" data-bs-target="#info_slid" data-bs-slide-to="1">
                            </div>
                            <div class="text-center">
                                <img class="border rounded-3 image-preview" style="width: 80px; height: 60px; object-fit: cover;" src="{{ asset('assets/images/car.jpg') }}" alt="Preview 3" data-bs-target="#info_slid" data-bs-slide-to="2">
                            </div>
                        </div>

                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#info_slid" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#info_slid" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>                </div>

                <!-- Ad Details Section -->
                <table class="table border-none">
                    <tr >
                        <td >
                            <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Map Point.png')}}">
                            <label>{{$listings->region->name}}</label>
                        </td>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/time.png')}}">
                            <label>{{ $listings->created_at->diffForHumans() }}</label>
                        </td>
                        <td>
                            <img  class="mx-1" style="width: 20px;" src="{{asset('assets/images/status_ads.png')}}">
                            <label>{{$listings->status}} </label>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: none">
                            <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/User Rounded.png')}}">
                            <label>{{$listings->user->name}}</label>
                        </td>
                        <td style="border: none">
                            <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Dollar Minimalistic.png')}}">
                            <label>{{$listings->price}} ( {{$listings->currency->abbr}} )</label>
                        </td>
                        <td style="border: none" >
                            <span class="badge rounded-pill text-dark" style="background-color:var(--warning-custom-color); font-size: 0.875rem; padding: 0.25rem 0.5rem;">{{$listings->category->name}}</span>
                        </td>
                    </tr>
                </table>            </div>

            <!-- Ad Description Section -->
            <div class="p-2 my-3">
                <h2 class="mb-2">تفاصيل الاعلان</h2>
                <p>{{$listings->description}}</p>
            </div>
             <!-- End Ad Description Section -->

            <!-- Action Buttons Section -->
            <div class="d-flex flex-wrap justify-content-center">
                <a href="#" class="btn btn-light border rounded-3 d-flex p-2 m-2" style="background-color: #559FC1;">
                    <div class="mx-2"><img src="{{ asset('assets/images/Vector.png') }}" style="width: 30px; height: 30px;"></div>
                    <div>{{$listings->user->contact_number}}</div>
                </a>
                <a href="#" class="btn btn-light border rounded-3 p-2 d-flex m-2" style="background-color: #559FC1">
                    <div class="mx-2"><img src="{{ asset('assets/images/Share.png') }}" style="width: 30px; height: 30px;"></div>
                    <div>مشاركة الاعلان</div>
                </a>
                <a href="#" class="btn btn-light border rounded-3 p-2 d-flex m-2" style="background-color: #559FC1">
                    <div class="mx-2"><img src="{{ asset('assets/images/whatsapp.png') }}" style="width: 30px; height: 30px;"></div>
                    <div>{{$listings->user->whatsapp_number}}</div>
                </a>
                <livewire:add-complaint :listingId="$listings->id" />

            </div>

            <!-- Comment Section -->
            <livewire:show-comment :listingId="$listings->id" />
                @if(Auth::user())
                    <livewire:add-comment :listingId="$listings->id" />
                @endif
            <!-- End Comment Section -->
            

    </div>
@endsection

<style>
    .comment-box {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .shadow-hover {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .comment-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
</style>
