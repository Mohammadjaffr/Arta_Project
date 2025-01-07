<!DOCTYPE html>
<html lang="ar">
@extends('layouts.head')
<body>
    {{-- navbar add new listing --}}
    <div class="d-flex flex-row justify-content-between" style="max-height: 90px">
        <div class="mt-1">
            <img  width="200px"  src="{{asset('assets/img/icon.png')}}">
        </div>
        <div class="mt-4">
            <h2  >إضافة اعلان جديد</h2>
        </div>
        <div class="m-3">
            <a href="{{ url('login') }}" style="height: 45px; width: 45px;">
                <button class="rounded-circle" style="height: 45px; border: none; background-color: #D2E1E8; width: 45px;">
                    <img src="{{ asset('assets/img/chevron-right.svg') }}">
                </button>
            </a>
        </div>
    </div>
    {{-- form for add new listing --}}
    <div class="row " >
        <div class="col-6 text-end container  p-lg-5 ">
            <form>
                <label class="py-3">اختر القسم الرئيسي</label>
                <select class="form-select  border-2 text-end"  style="border-color: #62A1BE">
                    <option> العقارات</option>
                    <option> السيارات</option>
                    <option> الملابس</option>
                </select>
                <label class="py-3">المدينه</label>
                <select class="form-select  border-2 text-end" style="border-color: #62A1BE">
                    <option> سيئون</option>
                    <option> القطن</option>
                    <option> تريم</option>
                </select>
                <h6 class="py-3"> اسم الاعلان</h6>
                <input class="form-control border-2 " type="text" style="border-color: #62A1BE" >
                <h6 class="py-3">تفاصيل الاعلان</h6>
                <input class="form-control border-2  py-lg-5" type="text" style="border-color: #62A1BE" >
                <h6 class="py-3">سعر الاعلان</h6>
                <input class="form-control border-2  py-2" type="number" style="border-color: #62A1BE" >
                <h6 class="py-3" >رقم الجوال</h6>
                <input class="form-control border-2  py-2" type="number" style="border-color: #62A1BE" >
                <h6 class="py-3">رقم الواتساب</h6>
                <input class="form-control border-2  py-2" type="number"  style="border-color: #62A1BE">
                <h6 class="py-3">حالة المنتج</h6>
                <div class="d-flex float-end">
                    <div class="form-check px-3 ">
                        <input class="form-check-input" style="border-color: #62A1BE" type="radio" value="option1" name="ads">
                        <label class="form-check-label">
                            جديد
                        </label>
                    </div>
                    <div class="form-check px-3">
                        <input class="form-check-input" style="border-color: #62A1BE" type="radio" name="ads" value="option2">
                        <label class="form-check-label">
                            مستعمل
                        </label>
                    </div>
                    <div class="form-check px-3 border-2" >
                        <input class="form-check-input" style="border-color: #62A1BE" type="radio" name="ads" value="option3">
                        <label class="form-check-label">
                            شبه جديد
                        </label>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="container border  col-5 rounded-5 text-end p-3" style="width: auto; height: auto;background-color:rgba(1, 73, 107, 0.68);">
        <div class="container p-3">
            <h6>رفع الصوره</h6>
            <div><label class="px-3">حدد الصوره الاساسيه</label><img class="border  border-amber-600 rounded-2 " style="width: 70px;height: 70px" src="{{asset('assets/images/facebook.svg')}}"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 text-center"><input class="border  rounded-3 p-3 " src="{{asset('assets/images/add-photo.png')}}" style="width: 100px; height: 100px;background-color: #C3C3C3C3" type="image" alt="" ></div>
            <div class="col-lg-3"><input class="border rounded-3" style="width: 120px; height: 100px;background-color: #C3C3C3C3" type="image" alt="" ></div>
            <div class="col-lg-3"><input class="border rounded-3" style="width: 120px; height: 100px;background-color: #C3C3C3C3" type="image" alt="" ></div>
            <div class="col-lg-3"><input class="border rounded-3" style="width: 120px; height: 100px;background-color: #C3C3C3C3" type="image" alt="" ></div>
        </div>
    </div>
    <div class="container text-center my-5">
            <input class="w-25 border rounded-4 py-3 text-center text-white" type="submit" style="background-color: #01496B" value="حفظ ونشر الاعلان">

    </div>
<hr>
    <div class="row">
        <div class="row d-flex  " style="padding-bottom: 0px">
            <div class="col-6 " style="padding: 10px 0px 0px 100px;">
                <button class="rounded-circle" style="height: 45px;border: none;background-color: #BDD6F4;width:45px;"><img src="{{asset('assets/images/facebook.svg')}}"></button>
                <button class="rounded-circle" style="height: 45px;border: none;background-color: #BDD6F4;width:45px;"><img src="{{asset('assets/images/twitter.svg')}}"></button>
                <button class="rounded-circle" style="height: 45px;border: none;background-color: #BDD6F4;width:45px;"><img src="{{asset('assets/images/instagram.svg')}}"></button>
                <button class="rounded-circle " style="height: 45px;border: none;background-color: #BDD6F4;width:45px;"><img style="width: 25px;" src="{{asset('assets/images/whatsapp.svg')}}"></button>
            </div>
            <div class="col-6 text-end" ><img style="width: 200px;height: 200px;" src="{{asset('assets/img/icon.png')}}"></div>
        </div>
        <div class="row ">
            <h4 style="padding: 0px 10px 10px 100px">استكشف التطبيق الخاص بنا</h4>
            <div class="col-4 text-center">
                <button style="border: none;background-color: white"><img  style="width:150px" src="{{asset('assets/images/appstore.png')}}"></button>
                <button style="border: none;background-color: white"><img style="width:150px" src="{{asset('assets/images/googlestore.png')}}"></button>
            </div>
            <div class="col-4 text-center py-3">تواصل معنا: info@company.com <br> جميع الحقوق محفوظة @ 2024. <br></div>
            <div class="col-4 text-center text-end py-3">"نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."</div>

        </div>
    </div>
</div>


</body>
</html>
