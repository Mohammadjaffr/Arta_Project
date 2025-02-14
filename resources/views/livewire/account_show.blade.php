@extends('layouts.master')
@section('title', 'حسابي')
@section('contact')
    <div  class="container my-5">
        <div class="container text-center">
            <!-- صورة الملف الشخصي -->
            <div class="position-relative d-inline-block">
                <div class="border rounded-3" style="width: 150px; height: 150px; background-image: url({{'assets/images/person.png'}}); background-size: cover; background-position: center;">
                    <!-- أيقونة الكاميرا -->
                    <a href="#" class="position-absolute  end-0 translate-middle-y bg-white border rounded-start-pill d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;top: 125px">
                        <img src="{{'assets/images/camera.svg'}}" alt="Camera Icon" class="img-fluid" style="width: 20px; height: 20px;">
                    </a>
                </div>
            </div>

            <!-- اسم المستخدم وأيقونة التعديل -->
            <div class="d-flex justify-content-center align-items-center mt-3">
                <a href="{{url('edit_account')}}" class="me-2">
                    <img src="{{'assets/images/pen.png'}}" alt="Edit Icon" class="img-fluid" style="width: 40px; height: 40px;">
                </a>
                <h5 class="m-0">محمد سالم</h5>
            </div>
        </div>
            @livewire('delete-listing')
{{--        <livewire:delete-listing :listingId="$listings->id" />--}}
        </div>

@endsection
