@extends('layouts.master')
@section('title', 'حسابي')
@section('contact')
    <div  class="container my-5">

        <div class="container text-center">

            <!-- صورة الملف الشخصي -->
            <div class="position-relative d-inline-block">

                <div class="border rounded-3" style="width: 150px; height: 150px; background-image: url({{Auth::user()->image}}); background-size: cover; background-position: center;">                </div>

            </div>

            <!-- اسم المستخدم وأيقونة التعديل -->
            <div class="d-flex justify-content-center align-items-center mt-3">
                <a href="{{url('edit_account/'. Auth::user()->id)}}" class="me-2">
                    <img src="{{'assets/images/pen.png'}}" alt="Edit Icon" class="img-fluid" style="width: 40px; height: 40px;">
                </a>
                <h5 class="m-0">{{Auth::user()->name}}</h5>
            </div>
        </div>
        @if($listings != null)
        @foreach($listings as $listing)
        <div class="row listing px-0 my-4 shadow">
            <div class="col-12 col-lg-2 text-center my-2">
                <img class="img-fluid" src="{{ $listing->primary_image }}" alt="#" style="max-height: 150px; min-height: 150px;">
            </div>
            <div class="col-12 col-lg-7 my-2">
                <h4 class="text-xxl-end text-xl-end text-lg-end text-center">{{ $listing->title }}</h4>
                <table class="table table-responsive">
                    <tr>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/Map Point.png') }}">
                            <label>{{ $listing->region->name }}</label>
                        </td>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/time.png') }}">
                            <label>{{ $listing->created_at->diffForHumans() }}</label>
                        </td>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/status_ads.png') }}">
                            <label>{{ $listing->status }}</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/User Rounded.png') }}">
                            <label>{{ $listing->user->name }}</label>
                        </td>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/Dollar Minimalistic.png') }}">
                            <label>{{ $listing->price }} ({{ $listing->currency->abbr }})</label>
                        </td>
                        <td>
                            <span class="badge rounded-pill text-dark" style="background-color: var(--warning-custom-color); font-size: 0.875rem; padding: 0.25rem 0.5rem;">{{ $listing->category->name }}</span>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center mb-2 mb-lg-0">
                <a href="{{$listing->id}}" class="btn btn-light border text-white rounded-4 d-flex justify-content-center align-items-center"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 100%; background-color: #97282A; height: 45px;">
                    <h5 class="text-align-center m-0">حذف الاعلان</h5>
                </a>
            </div>
        </div>
                <livewire:delete-listing :listingId="$listing->id"/>
        @endforeach

        @endif


   </div>
@endsection
