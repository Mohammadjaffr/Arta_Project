<!doctype html>
<html lang="en">
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
<div class="d-flex" dir="rtl">
    <!-- الصورة الخلفية -->
    <img class="w-100" style="height: 25vh; object-fit: cover;" src="{{asset('assets/images/navbar_add_ads.png')}}">

    <!-- زر الرجوع -->
    <div class="position-absolute p-2 p-md-3 py-4">
        <a href="{{route('home')}}" class="btn btn-light p-2" style="border-radius: 50%; border: none; background: none;">
            <img src="{{asset('assets/images/chevron-right.svg')}}" alt="back" style="width: 30px; height: 30px;">
        </a>
    </div>

    <!-- العنوان -->
<<<<<<< Updated upstream
    <div class="position-absolute p-2 p-md-3 mt-3 py-5" style="left: 50%; transform: translateX(-50%);">
=======
    <div class="position-absolute p-2 p-md-3 py-5" style="left: 50%; transform: translateX(-50%);">
>>>>>>> Stashed changes
        <h2 class="mb-0" style="font-size: 1.2rem; font-weight: bold;">إضافة إعلان</h2>
    </div>

    <!-- الشعار والاسم -->
    <div class="position-absolute my-3 my-md-4" style="width: 100px; height: auto; left: 1%;">
<<<<<<< Updated upstream
        <img alt="icon" style="max-width: 100%; height:auto;" src="{{asset('assets/images/icon.png')}}">
        <h3 style="color: black; font-weight: bold; font-family: 'Tajawal', sans-serif; font-size: 1rem;">منصة عرطة</h3>
=======
        <img alt="icon" style="max-width: 100%; height: auto;" src="{{asset('assets/images/icon.png')}}">
        <h3 style="color: var(--primary-custom-color); font-weight: bold; font-family: 'Tajawal', sans-serif; font-size: 1rem;">منصة عرطة</h3>
>>>>>>> Stashed changes
    </div>
</div>

<div class="container">
    <!-- النموذج -->
    <div dir="rtl" class="row justify-content-center">
        <div class="col-12 col-lg-6 p-lg-5">
            <form>
                <!-- اختر القسم الرئيسي -->
                <label class="py-3">اختر القسم الرئيسي</label>
                <select class="form-select border-2 text-end" style="border-color: #62A1BE">
                    <option>العقارات</option>
                    <option>السيارات</option>
                    <option>الملابس</option>
                </select>

                <!-- المدينة -->
                <label class="py-3">المدينة</label>
                <select  class="form-select border-2 text-end" style="border-color: #62A1BE">
                    <option>سيئون</option>
                    <option>القطن</option>
                    <option>تريم</option>
                </select>

                <!-- اسم الإعلان -->
                <h6 class="py-3">اسم الإعلان</h6>
                <input class="form-control border-2" name="title" type="text" style="border-color: #62A1BE">

                <!-- تفاصيل الإعلان -->
                <h6 class="py-3">تفاصيل الإعلان</h6>
                <textarea class="form-control border-2" style="border-color: #62A1BE" rows="4"></textarea>

                <!-- سعر الإعلان -->
                <h6 class="py-3">سعر الإعلان</h6>
                <input class="form-control border-2" type="number" style="border-color: #62A1BE">

                <!-- رقم الجوال -->
                <h6 class="py-3">رقم الجوال</h6>
                <input class="form-control border-2" type="number" style="border-color: #62A1BE">

                <!-- رقم الواتساب -->
                <h6 class="py-3">رقم الواتساب</h6>
                <input class="form-control border-2" type="number" style="border-color: #62A1BE">

                <!-- حالة المنتج -->
                <h6 class="py-3">حالة المنتج</h6>
                <div class="d-flex justify-content-start">
                    <div class="form-check px-3">
                        <input class="form-check-input" style="border-color: #62A1BE" type="radio" name="ads" value="new">
                        <label class="form-check-label">جديد</label>
                    </div>
                    <div class="form-check px-3">
                        <input class="form-check-input" style="border-color: #62A1BE" type="radio" name="ads" value="used">
                        <label class="form-check-label">مستعمل</label>
                    </div>
                    <div class="form-check px-3">
                        <input class="form-check-input" style="border-color: #62A1BE" type="radio" name="ads" value="semi-new">
                        <label class="form-check-label">شبه جديد</label>
                    </div>
                </div>
            </form>
<<<<<<< Updated upstream
        </div>
    </div>

    <!-- رفع الصورة -->
    {{--        @livewire('image-uploader')--}}
    <div class="row justify-content-center my-4">
        <div class="col-12 col-md-8 border border-dark rounded-5 p-3" style="background-color: rgba(1, 73, 107, 0.68);">
            <div class="text-end">
                <h6>رفع الصورة</h6>
                <div>
                    <label class="px-3">حدد الصورة الأساسية</label>
                    <!-- الصورة الأساسية -->
                    <img id="mainImage" class="border border-amber-600 rounded-2" style="width: 70px; height: 70px; cursor: pointer;" src="{{asset('assets/images/facebook.svg')}}" alt="صورة أساسية">
                    <!-- حقل رفع الملف المخفي -->
                    <input id="fileInput" type="file" accept="image/*" style="display: none;">
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-evenly mt-3">
                <!-- مربعات رفع الصور -->
                <div class="text-center">
                    <img class="border rounded-3 p-3 image-preview" style="width: 100px; height: 100px; background-color: #C3C3C3; cursor: pointer;" src="{{asset('assets/images/add-photo.png')}}" alt="إضافة صورة">
                    <input type="file" accept="image/*" style="display: none;">
                </div>
                <div class="text-center">
                    <img class="border rounded-3 image-preview" style="width: 120px; height: 100px; background-color: #C3C3C3; cursor: pointer;" src="{{asset('assets/images/add-photo.png')}}" alt="إضافة صورة">
                    <input type="file" accept="image/*" style="display: none;">
                </div>
                <div class="text-center">
                    <img class="border rounded-3 image-preview" style="width: 120px; height: 100px; background-color: #C3C3C3; cursor: pointer;" src="{{asset('assets/images/add-photo.png')}}" alt="إضافة صورة">
                    <input type="file" accept="image/*" style="display: none;">
                </div>
                <div class="text-center">
                    <img class="border rounded-3 image-preview" style="width: 120px; height: 100px; background-color: #C3C3C3; cursor: pointer;" src="{{asset('assets/images/add-photo.png')}}" alt="إضافة صورة">
                    <input type="file" accept="image/*" style="display: none;">
                </div>
            </div>
        </div>
    </div>

=======
        </div>
    </div>

    <!-- رفع الصورة -->
            @livewire('image-uploader')
   

>>>>>>> Stashed changes
    <!-- زر حفظ ونشر الإعلان -->
    <div class="row justify-content-center my-5">
        <div class="col-12 text-center">
            <input class="btn w-25 rounded-4 py-3 text-white" style="background-color: #01496B;" type="submit" value="حفظ ونشر الإعلان">
        </div>
    </div>
</div>
@livewireScripts
<script src="{{asset('assets/Js/custom-Js.js')}}"></script>
<hr>
@include('layouts.footer')
</body>
</html>
