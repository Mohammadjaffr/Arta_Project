@extends('layouts.master')
@section('title' ,'لصفحة الرئيسية')
@section('contact')
<div class="container">
    @if(session('success') || session('error'))
        <div class="message-center" style="position: fixed;left: 50%;transform: translate(-50%, -50%);z-index: 9999;padding: 20px;border-radius: 8px;text-align: center;animation: fadeInOut 4s forwards;
        {{ session('success') ? 'background: #4CAF50; color: white;' : 'background: #F44336; color: white;' }}">
            {{ session('success') ?? session('error') }}
        </div>
    @endif

    <style>
        @keyframes fadeInOut {
            0% { opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; visibility: hidden; }
        }
    </style>
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
        <div class=""></div>
    </div>

    {{-- end contact--}}
    @livewire('listings',['lazy'=>true])
</div>

@endsection
