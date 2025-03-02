<!doctype html>
<html dir="rtl" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اضافة اعلان</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('assets/css/custom-style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/css2.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
</head>

<body>
<div class="d-flex ">
    <!-- الصورة الخلفية -->
    <img class="w-100" style="height: 25vh; object-fit: cover;" src="{{asset('assets/images/navbar_add_ads.png')}}">

    <!-- زر الرجوع -->
    <div class="position-absolute p-3 ">
        <a href="{{route('home')}}" class="btn btn-light p-2 " style="border-radius: 50%; ">
            <img src="{{asset('assets/images/chevron-right.svg')}}" class="" alt="back" style="width: 40px; height: 40px;">
        </a>
    </div>

    <!-- العنوان -->
    <div class="position-absolute mt-5" style="left: 50%; transform: translateX(-50%);">
        <h2 class="mb-0" style="color:black; font-weight: bold; font-family: 'Tajawal', sans-serif; font-size: 2rem; ">إضافة إعلان</h2>
    </div>

    <!-- الشعار والاسم -->
    <div class="position-absolute my-3 my-md-4 d-none d-sm-inline" style="width: 25vh; height: auto; left: 1%;">
        <img alt="icon" style="max-width: 100%; height: auto;" src="{{asset('assets/images/icon.png')}}">
        <h3 style="color:black; font-weight: bold; font-family: 'Tajawal', sans-serif; font-size: 2rem; ">منصة عرطة</h3>
    </div>
</div>

<div class="container">
    <!-- النموذج -->
    <div dir="rtl" class="row justify-content-center">
        <div class="col-12 col-lg-6 p-lg-5">


            @livewire('add-listing')

        </div>
    </div>

    <!-- رفع الصورة -->



    <!-- زر حفظ ونشر الإعلان -->

</div>
@livewireScripts
<script src="{{asset('assets/Js/custom-Js.js')}}"></script>
<hr>
@include('layouts.footer')
</body>
</html>
