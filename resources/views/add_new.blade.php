@extends('layouts.master')
@section('title', 'اضافة اعلان')
@section('contact')
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
    <div class="border border-dark rounded-5 text-end p-3" style="background-color:rgba(1, 73, 107, 0.68);margin: 0px 500px;">
        <div class="container p-3">
            <h6>رفع الصوره</h6>
            <div><label class="px-3">حدد الصوره الاساسيه</label><img class="border  border-amber-600 rounded-2 " style="width: 70px;height: 70px" src="{{asset('assets/images/facebook.svg')}}"></div>
        </div>
        <div class="d-flex justify-content-md-evenly ">
            <div class="text-center"><input class="border  rounded-3 p-3 " src="{{asset('assets/images/add-photo.png')}}" style="width: 100px; height: 100px;background-color: #C3C3C3C3" type="file" alt="" ></div>
            <div class=""><input class="border rounded-3" style="width: 120px; height: 100px;background-color: #C3C3C3C3" type="image" alt="" ></div>
            <div class=""><input class="border rounded-3" style="width: 120px; height: 100px;background-color: #C3C3C3C3" type="file" alt="" ></div>
            <div class=""><input class="border rounded-3" style="width: 120px; height: 100px;background-color: #C3C3C3C3" type="file" alt="" ></div>
        </div>
    </div>
    <div class="container text-center my-5">
        <input class="w-25 border rounded-4 py-3 text-center text-white" type="submit" style="background-color: #01496B" value="حفظ ونشر الاعلان">

    </div>
    <hr>
@endsection
