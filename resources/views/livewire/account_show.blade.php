@extends('layouts.master')
@section('title', 'حسابي')
@section('contact')
    <header>    {{-- navbar add new listing --}}
        <div class="d-flex  my-3 justify-content-md-between"  style="position: relative;">
            <div class="mx-2 ">
                <img class="py-3" style="width: 130px;right: 50vh; height: 130px;"  src="{{asset('assets/img/icon.png')}}">
            </div>
            <div class="mt-4 "  style="position: relative">
                <h2>حسابي</h2>
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
    <div class="container">
<div >
    <div class="border rounded " style="width: 150px;margin-left: 64vh; background-image: url({{'assets/images/'}}); height: 150px;position: relative;">
        <a href="#" class="border bg-white text-center rounded-top-5 rounded-start-5 " style="position:absolute;width: 50px;height: 50px;left: 98px;top: 99px;" ><img class="mt-2" style="width: 20px;height: 30px;" src="{{asset('assets/images/camera.svg')}}"></a>
    </div>
    <div class="d-flex" style="margin-left: 66vh">
        <a href="{{url('account')}}" class="mt-2 "><img style="width: 40px;height: 40px;" src="{{asset('assets/images/pen.png')}}"></a>
        <h5 class="mt-3 mx-2">محمد سالم</h5>
    </div>

</div>

        <div class="border rounded-3 m-4 py-2 d-flex" style="direction: rtl;background-color: #D2E1E8">
            <div class="text-end m-2 "><img class="" style="width: 100px;height: 100px;" src="{{asset('assets/images/Rectangle 87.png')}}"></div>
            <div class="text-end m-2 d-block">
                سياره تيوتا موديل 2006
                <div class="d-flex ">
                    <div class="" ><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Map Point.png')}}"><label>المكلا</label></div>
                    <div class="" style="margin-right: 40px"><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/time.png')}}"><label>منذ 30 دقيقة</label></div>
                </div>
                <div class="d-flex">
                    <div class=""><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/User Rounded.png')}}"><label>ابرهيم علي</label></div>
                    <div class="mx-2"><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Dollar Minimalistic.png')}}"><label>25000ريال سعودي</label></div>
                </div>
            </div>

            <button class="text-center mt-5 text-white rounded-4 border " style="width: 200px;background-color: #97282A; margin-right: 650px; height: 60px;">
                ازالة الاعلان
            </button>
        </div>
       <div class="border rounded-3 m-4 py-2 d-flex" style="direction: rtl;background-color: #D2E1E8">
           <div class="text-end m-2 "><img class="" style="width: 100px;height: 100px;" src="{{asset('assets/images/Rectangle 87.png')}}"></div>
           <div class="text-end m-2 d-block">
               سياره تيوتا موديل 2006
               <div class="d-flex ">
                   <div class="" ><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Map Point.png')}}"><label>المكلا</label></div>
                   <div class="" style="margin-right: 40px"><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/time.png')}}"><label>منذ 30 دقيقة</label></div>
               </div>
               <div class="d-flex">
                   <div class=""><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/User Rounded.png')}}"><label>ابرهيم علي</label></div>
                   <div class="mx-2"><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Dollar Minimalistic.png')}}"><label>25000ريال سعودي</label></div>
               </div>
           </div>

           <button class="text-center mt-5 text-white rounded-4 border " style="width: 200px;background-color: #97282A; margin-right: 650px; height: 60px;">
               ازالة الاعلان
           </button>
       </div>
        <div class="border rounded-3 m-4 py-2 d-flex" style="direction: rtl;background-color: #D2E1E8">
            <div class="text-end m-2 "><img class="" style="width: 100px;height: 100px;" src="{{asset('assets/images/Rectangle 87.png')}}"></div>
            <div class="text-end m-2 d-block">
                سياره تيوتا موديل 2006
                <div class="d-flex ">
                    <div class="" ><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Map Point.png')}}"><label>المكلا</label></div>
                    <div class="" style="margin-right: 40px"><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/time.png')}}"><label>منذ 30 دقيقة</label></div>
                </div>
                <div class="d-flex">
                    <div class=""><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/User Rounded.png')}}"><label>ابرهيم علي</label></div>
                    <div class="mx-2"><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Dollar Minimalistic.png')}}"><label>25000ريال سعودي</label></div>
                </div>
            </div>

            <button class="text-center mt-5 text-white rounded-4 border " style="width: 200px;background-color: #97282A; margin-right: 650px; height: 60px;">
                ازالة الاعلان
            </button>
        </div>
        <div class="border rounded-3 m-4 py-2 d-flex" style="direction: rtl;background-color: #D2E1E8">
            <div class="text-end m-2 "><img class="" style="width: 100px;height: 100px;" src="{{asset('assets/images/Rectangle 87.png')}}"></div>
            <div class="text-end m-2 d-block">
                سياره تيوتا موديل 2006
                <div class="d-flex ">
                    <div class="" ><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Map Point.png')}}"><label>المكلا</label></div>
                    <div class="" style="margin-right: 40px"><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/time.png')}}"><label>منذ 30 دقيقة</label></div>
                </div>
                <div class="d-flex">
                    <div class=""><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/User Rounded.png')}}"><label>ابرهيم علي</label></div>
                    <div class="mx-2"><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Dollar Minimalistic.png')}}"><label>25000ريال سعودي</label></div>
                </div>
            </div>

            <button class="text-center mt-5 text-white rounded-4 border " style="width: 200px;background-color: #97282A; margin-right: 650px; height: 60px;">
                ازالة الاعلان
            </button>
        </div>
   </div>
    @include('layouts.footer')
@endsection
