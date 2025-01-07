@extends('layouts.master')
@section('title', 'حسابي')
@section('contact')
    <div  style="background-image: url({{'assets/images/'}});background-repeat:repeat">

        <header>    {{-- navbar add new listing --}}
            <div class="d-flex  my-3 justify-content-md-between"  style="position: relative;">
                <div class="mx-2 ">
                    <img class="py-3" style="width: 130px;right: 50vh; height: 130px;"  src="{{asset('assets/img/icon.png')}}">
                </div>
                <div class="mt-4 "  style="position: relative">
                    <h2>تعيين كلمة المرور</h2>
                </div>
                <div class="m-3 " style="position: relative">
                    <a href="{{ url('home') }}" style="height: 45px; width: 45px;">
                        <button class="rounded-circle" style="height: 45px; border: none; background-color: #D2E1E8; width: 45px;">
                            <img src="{{ asset('assets/img/chevron-right.svg') }}">
                        </button>
                    </a>
                </div>
            </div>
            {{-- form for add new listing --}}
        </header>
        <div  class="container  w-75">
            <div>
                <div class=" d-flex justify-content-center border rounded-2" style="width: 180px;margin-left: 45%; background-image: url({{'assets/images/person.png'}});background-repeat: no-repeat; height: 150px;">
                    <button href="#" class="border bg-white text-center rounded-top-5 rounded-start-5  " style="position:absolute;width: 50px;right: 44%;top: 28%; height: 50px;" ><img class="mt-2" style="width: 20px;height: 30px;" src="{{asset('assets/images/camera.svg')}}"></button>
                </div>
                <div class="d-flex justify-content-center" >
                    <a href="#" class="mt-2 "><img style="width: 40px;height: 40px;" src="{{asset('assets/images/pen.png')}}"></a>
                    <h5 class="mt-3 mx-2">محمد سالم</h5>
                </div>
            </div>

            <div dir="rtl" class="m-3  " style="">
                <h3>تعديل الكملف الشخصي</h3>
                <div class="border rounded-3">
                    <div class="d-block  ">
                        <button  class="border justify-content-between btn  w-100  p-2 d-flex" style="position: relative">
                            <h5 class="text-center">تعديل الاسم</h5>
                            <a href="{{url('home')}}"><img class="text-center" src="{{asset('assets/images/arrow-left1.svg')}}"></a>
                        </button>
                    </div>
                    <div class="d-block ">
                        <div class="border justify-content-between  p-2 d-flex" style="position: relative">
                            <h5 class="text-center">تعديل كلمة المرور</h5>
                            <a href="#"><img class="text-center" src="{{asset('assets/images/arrow-left1.svg')}}"></a>
                        </div>
                    </div>
                    <div class="d-block ">
                        <div class="border justify-content-between  p-2 d-flex" style="position: relative">
                            <h5 class="text-center">تعديل البريد الاكتروني</h5>
                            <a href="#"><img class="text-center" src="{{asset('assets/images/arrow-left1.svg')}}"></a>
                        </div>
                    </div>
                    <div class="d-block ">
                        <div class="border justify-content-between  p-2 d-flex" style="position: relative">
                            <h5 class="text-center">تعديل ارقام التواصل</h5>
                            <a href="#"><img class="text-center" src="{{asset('assets/images/arrow-left1.svg')}}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

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
@endsection



