@extends('layouts.master')
@section('title', 'حسابي')
@section('contact')
        <div dir="rtl" class="container">

                <h3>تعديل الملف الشخصي</h3>
                <div class="border rounded-3">
                    <div class="d-block  ">
                        <a href="{{url('edit_name')}}"  class="border justify-content-between btn btn-light  w-100  p-2 d-flex" style="position: relative">
                            <h5 class="text-center">تعديل الاسم</h5>
                            <img class="text-center" src="{{asset('assets/images/arrow-left1.svg')}}">
                        </a>
                    </div>
                    <div class="d-block  ">
                        <a href="{{url('edit_email')}}"  class="border justify-content-between btn btn-light  w-100  p-2 d-flex" style="position: relative">
                            <h5 class="text-center">تعديل البريد الاكتروني</h5>
                            <img class="text-center" src="{{asset('assets/images/arrow-left1.svg')}}">
                        </a>
                    </div>
                    <div class="d-block  ">
                        <a href="{{url('edit_password')}}"  class="border justify-content-between btn btn-light  w-100  p-2 d-flex" style="position: relative">
                            <h5 class="text-center">تعديل كلمة المرور</h5>
                            <img class="text-center" src="{{asset('assets/images/arrow-left1.svg')}}">
                        </a>
                    </div>
                    <div class="d-block  ">
                        <a href="{{url('edit_number')}}"  class="border justify-content-between btn btn-light  w-100  p-2 d-flex" style="position: relative">
                            <h5 class="text-center">تعديل ارقام التواصل</h5>
                            <img class="text-center" src="{{asset('assets/images/arrow-left1.svg')}}">
                        </a>
                    </div>
            </div>
    </div>
@endsection



