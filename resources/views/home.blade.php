@extends('layouts.master')
@section('title' ,'لصفحة الرئيسية')
@section('contact')
<div class="container">
    {{--contact--}}
    <div style="direction: rtl">
        <div class="d-flex flex-wrap rounded-4 m-3 align-items-center">
            <div class="rounded-start-4 position-relative" style="flex: 1; min-width: 300px; height: 419px; padding: 0;">
                <img class="border rounded-4 rounded-start-0 img-fluid" src="{{asset('assets/images/box_ads.gif')}}" style="width: 100%; height: 100%; object-fit: cover;" alt="...">
                <div class="m-4" style="position: absolute; top: 10px; right: 10px; color:black;">
                    <h1 style="font-family: 'Cairo', sans-serif;">بيع الي ماتحتاجه</h1>
                </div>
            </div>
            <div class="rounded-end-4 position-relative" style="flex: 1; min-width: 300px; height: 419px; padding: 0;">
                <img class="border rounded-4 rounded-end-0 img-fluid" src="{{asset('assets/images/markting.gif')}}"  style="width: 100%; height: 100%; object-fit: cover;" alt="...">
                <div class="m-4"  style="position: absolute; bottom: 10px; right: 10px; color:black;">
                    <h1 style="font-family: 'Cairo', sans-serif;">واشتري الي تحتاجه</h1>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <h1 style="color:var(--primary-custom-color)"> الفئات</h1>
            @if(Auth::user())
                <a href="{{route('listing.index')}}" class="btn btn-blue rounded-start-5 my-3 add-ads-button" style="float: left;background-color: #FECA81">اضافة اعلان<img class="mx-2" src="{{asset('assets/images/plus.png')}}" alt="#"></a>
            @else
            <div></div>
            @endif
        </div>
{{--        <div class="container mt-2 text-center">--}}
{{--            <div class="row align-items-start">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="table-responsive scrollable" style="overflow-x: auto;">--}}
{{--                        <table class="table">--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <div class="card" style="border: none;">--}}
{{--                                        <a  class="text-decoration-none" href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/Autos.png')}}" class="card-img-top img-fluid" alt="...">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <h5 style="font-size: 0.8rem; color: black">السيارات</h5>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="card" style="border: none;">--}}
{{--                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/sports.png')}}" class="card-img-top" alt="..."></a>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 style="font-size: 0.8rem;">رياضه</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="card" style="border: none;">--}}
{{--                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/electronic.png')}}" class="card-img-top" alt="..."></a>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 style="font-size: 0.8rem;">الاكترونيات</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="card" style="border: none;">--}}
{{--                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/furniture.png')}}" class="card-img-top" alt="..."></a>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 style="font-size: 0.8rem;">الاثاث</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="card" style="border: none;">--}}
{{--                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/houses.png')}}" class="card-img-top" alt="..."></a>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 style="font-size: 0.8rem;">عقارات</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="card" style="border: none;">--}}
{{--                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/motor.png')}}" class="card-img-top" alt="..."></a>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 style="font-size: 0.8rem;">مركبات</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="card" style="border: none;">--}}
{{--                                        <a href="#"><img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/women_s_fashion.png')}}" class="card-img-top" alt="..."></a>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 style="font-size: 0.8rem;">ازياء نسائية</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
    {{-- end contact--}}
    @livewire('listings',['lazy'=>true])
</div>

@endsection
