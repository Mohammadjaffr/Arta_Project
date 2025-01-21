@extends('layouts.master')
@section('title' ,'لصفحة الرئيسية')

@section('contact')
<div class="container text-center">
    {{--contact--}}
    <div style="direction: rtl">
        <div class="d-flex flex-wrap rounded-4 m-3 align-items-center justify-content-between" style="background-color: #FFCF55;" >
            <div class="rounded-end-4 " style="flex-grow: 2;height: 419px;">
                <h2 class="my-4 d-flex justify-content-start mx-4" >بيع الي ماتحتاجه</h2>
                <img style="width: fit-content;height: fit-content;" src="{{asset('assets/images/box_ads.gif')}}" class="card-img-top d-flex justify-content-start" alt="..."></div>
            <div class="rounded-start-4  " style=""><img class="rounded-start-4 " style="width: fit-content;flex-grow: 1; height: 419px;" src="{{asset('assets/images/markting.gif')}}"></div>
        </div>
        @if(Auth::user()->name)
            <a href="{{route('category.index')}}" class="btn btn-blue rounded-start-5 my-3" style="float: left;background-color: #FECA81">اضافة اعلان<img class="mx-2" src="{{asset('assets/images/plus.png')}}" alt="#"></a>
        @else

        @endif
        <br>
        <h5 class="float-end"> الفئات</h5>
        <div class="container mt-5">
            <div class="row align-items-start">
                <div class="col-12 col-md-9">
                    <div class="table-responsive" style="overflow-x: auto;">
                        <table class="table">
                            <tr>
                                <td>
                                    <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                        <a href="#"><img style="width: 10rem;height: 6rem;" src="{{asset('assets/images/Autos.png')}} " class="card-img-top img-fluid" alt="..."></a>
                                        <div class="card-body">
                                            <h5 class="card-title">السيارات</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                        <a href="#"><img style="width: 10rem;height: 6rem;" src="{{asset('assets/images/sports.png')}}" class="card-img-top" alt="..."></a>
                                        <div class="card-body">
                                            <h5 class="card-title">رياضه</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                        <a href="#"><img  style="width: 10rem;height: 6rem;"  src="{{asset('assets/images/electronic.png')}}" class="card-img-top" alt="..."></a>
                                        <div class="card-body">
                                            <h5 class="card-title">الاكترونيات</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                        <a href="#"><img  style="width: 10rem;height: 6rem;" src="{{asset('assets/images/furniture.png')}}" class="card-img-top" alt="..."></a>
                                        <div class="card-body">
                                            <h5 class="card-title">الاثاث</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                        <a href="#"><img style="width: 10rem;height: 6rem;" src="{{asset('assets/images/houses.png')}}" class="card-img-top" alt="..."></a>
                                        <div class="card-body">
                                            <h5 class="card-title">عقارات</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                        <a href="#"><img style="width: 10rem;height: 6rem;" src="{{asset('assets/images/motor.png')}}" class="card-img-top" alt="..."></a>
                                        <div class="card-body">
                                            <h5 class="card-title">مركبات</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                        <a href="#"><img style="width: 10rem;height: 6rem;" src="{{asset('assets/images/women_s_fashion.png')}}" class="card-img-top" alt="..."></a>
                                        <div class="card-body">
                                            <h5 class="card-title">ازياء نسائية</h5>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-md-3 d-flex justify-content-center flex-column align-items-center">
                    <div class="card" style="width: 100%; max-width: 10rem; height: 12rem; border:none;">
                        <a href="#"><img style="width: 10rem;height: 6rem;" src="{{asset('assets/images/more_ads.png')}}" class="card-img-top border rounded-circle" alt="..."></a>
                        <div class="card-body">
                            <h5 class="card-title">الكل</h5>
                        </div>
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


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
