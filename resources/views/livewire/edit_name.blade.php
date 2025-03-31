@extends('layouts.master')
@section('title', 'تعديل الاسم')
@section('contact')
    <div  style="background-image: url({{'assets/images/'}});background-repeat:repeat">

        <header>    {{-- navbar add new listing --}}
            <div class="d-flex  my-3 justify-content-md-between"  style="position: relative;">
                <div class="mx-2 ">
                    <img class="py-3" style="width: 130px;right: 50vh; height: 130px;"  src="{{asset('assets/img/icon.png')}}">
                </div>
                <div class="mt-4 "  style="position: relative">
                    <h2>تعديل الاسم</h2>
                </div>
                <div class="m-3 " style="position: relative">
                    <a href="{{ url('account') }}" style="height: 45px; width: 45px;">
                        <button class="rounded-circle" style="height: 45px; border: none; background-color: #D2E1E8; width: 45px;">
                            <img src="{{ asset('assets/img/chevron-right.svg') }}">
                        </button>
                    </a>
                </div>
            </div>

            {{-- form for add new listing --}}
        </header>
        <div  class="container  w-75">

            <form dir="rtl" class="border rounded-4 p-3 w-50" style="position: relative;left: 35vh;margin: 20px;">
                <label>الاسم القديم</label>
{{--                @if ($showConfirmePassword)--}}
{{--                    <input class="form-control rounded-4 py-2 @error('password') border-red @else custom-input @enderror" name="password_confirmation" type="text" required>--}}
{{--                @else--}}
                <input class="form-control  m-2" type="password" name="password" id="password" value="{{ old('password') }}">
                <label>الاسم الجديده</label>
                <input class="form-control  m-2" type="password" >

                <button class="btn  w-50 mt-3 w-50 text-white" style="margin-right: 160px;background-color: #01496B">حفظ التغير</button>
            </form>
        </div>



        <footer class="mt-5">
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
                    <div class="col-4  text-end py-3">"نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."</div>

                </div>
            </div>
        </footer>


    </div>




