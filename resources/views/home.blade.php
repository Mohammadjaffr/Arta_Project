@extends('layouts.master')
@section('title' ,'لصفحة الرئيسية')
@section('contact')
<div class="container text-center">
    {{--contact--}}
    <div style="direction: rtl">
        <!-- Code for large screens:
        - Displays images with text overlay using absolute positioning. -->
        <div class="d-none d-lg-flex flex-wrap rounded-4 m-3 align-items-center">
            <div class="rounded-start-4 position-relative" style="flex: 1; min-width: 300px; height: 419px; padding: 0;">
                <img class="border rounded-4 rounded-start-0 " src="{{asset('assets/images/box_ads.gif')}}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;" alt="...">
                <div class="m-4" style="position: absolute; top: 10px; right: 10px; color:black;">
                    <h1 style="font-family: 'Cairo', sans-serif;">بيع الي ماتحتاجه</h1>
                </div>
            </div>
            <div class="rounded-end-4 position-relative" style="flex: 1; min-width: 300px; height: 419px; padding: 0;">
                <img class="border rounded-4 rounded-end-0" src="{{asset('assets/images/markting.gif')}}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;" alt="...">
                <div class="m-4"  style="position: absolute; bottom: 10px; right: 10px; color:black;">
                    <h1 style="font-family: 'Cairo', sans-serif;">واشتري الي تحتاجه</h1>
                </div>
            </div>
        </div>
        <!-- Code for small screens:
        - Displays images with text below each image for better readability. -->
        <div class="d-flex flex-wrap mt-3 align-items-center">
            <div class="d-block d-lg-none d-flex flex-column align-items-center" style="flex: 1; min-width: 300px; height: 419px; padding: 0;">
                <img class="border rounded-4 img-fluid" src="{{asset('assets/images/box_ads.gif')}}" style="width: 100%; height: auto; object-fit: cover;" alt="...">
                <h1 class="" style="color: black; font-family: 'Cairo', sans-serif;">بيع الي ماتحتاجه</h1>
            </div>
            <div class="d-block d-lg-none mt-3 d-flex flex-column align-items-center" style="flex: 1; min-width: 300px; height: 419px; padding: 0;">
                <img class="border rounded-4  img-fluid" src="{{asset('assets/images/markting.gif')}}" style="width: 100%; height: auto; object-fit: cover;" alt="...">
                <h1 class="m-2" style="color: black; font-family: 'Cairo', sans-serif;">واشتري الي تحتاجه</h1>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <h1 style="color:var(--primary-custom-color)"> الفئات</h1>
            @if(Auth::user())
                <a href="{{route('category.index')}}" class="btn btn-blue rounded-start-5 my-3" style="float: left;background-color: #FECA81">اضافة اعلان<img class="mx-2" src="{{asset('assets/images/plus.png')}}" alt="#"></a>
            @else
            <div></div>
            @endif
        </div>
        <div class="container mt-2">
            <div class="row align-items-start">
                <div class="col-12">
                    <div class="table-responsive scrollable" style="overflow-x: auto;">
                        <table class="table">

                            <tr>
                                @foreach($cat as $c)
                                <td>
                                    <div class="card" style="width: 8rem; height: 8rem; border: none;"> <!-- Reduced card size -->
                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/Autos.png')}}" class="card-img-top img-fluid" alt="..."></a>
                                        <div class="card-body">
                                            <h5 style="font-size: 0.8rem;">{{$c->name}}</h5>
                                        </div>
                                    </div>
                                </td>

{{--                                <td>--}}
{{--                                    <div class="card" style="width: 8rem; height: 8rem; border: none;"> <!-- Reduced card size -->--}}
{{--                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/sports.png')}}" class="card-img-top" alt="..."></a>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 style="font-size: 0.8rem;">رياضه</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="card" style="width: 8rem; height: 8rem; border: none;"> <!-- Reduced card size -->--}}
{{--                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/electronic.png')}}" class="card-img-top" alt="..."></a>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 style="font-size: 0.8rem;">الاكترونيات</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="card" style="width: 8rem; height: 8rem; border: none;"> <!-- Reduced card size -->--}}
{{--                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/furniture.png')}}" class="card-img-top" alt="..."></a>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 style="font-size: 0.8rem;">الاثاث</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="card" style="width: 8rem; height: 8rem; border: none;"> <!-- Reduced card size -->--}}
{{--                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/houses.png')}}" class="card-img-top" alt="..."></a>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 style="font-size: 0.8rem;">عقارات</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="card" style="width: 8rem; height: 8rem; border: none;"> <!-- Reduced card size -->--}}
{{--                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/motor.png')}}" class="card-img-top" alt="..."></a>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 style="font-size: 0.8rem;">مركبات</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="card" style="width: 8rem; height: 8rem; border: none;"> <!-- Reduced card size -->--}}
{{--                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/women_s_fashion.png')}}" class="card-img-top" alt="..."></a>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 style="font-size: 0.8rem;">ازياء نسائية</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
                                @endforeach
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{--search--}}
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4" style="direction: rtl;">
            <form class="flex-grow-1 position-relative">
                <img src="{{ asset('assets/images/search.svg') }}" alt="Search Icon" style="position: absolute; left: 5px; top: 50%; transform: translateY(-50%);">
                <input class="form-control rounded-4 ps-2" type="text" placeholder="ابحث هنا...">
            </form>
            <select class="form-select w-auto rounded-4">
                <option>المدينة</option>
                <option>القطن</option>
                <option>سيئون</option>
            </select>
            <select class="form-select w-auto rounded-4">
                <option>المنطقة</option>
                <option>القطن</option>
                <option>سيئون</option>
            </select>
            <a href="#" class="btn btn-light border-2 rounded-4" style="background-color: #046998;">
                أقل سعراً
                <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="#" class="ms-2">
            </a>
            <a href="#" class="btn btn-light border-2 rounded-4" style="background-color: #046998;">
                أعلى سعراً
                <img src="{{ asset('assets/images/arrow-up.svg') }}" alt="#" class="ms-2">
            </a>
        </div>
        {{-- end search--}}
    </div>
    {{-- end contact--}}
    @livewire('listings')
</div>

@endsection































