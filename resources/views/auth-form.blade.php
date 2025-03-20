<!DOCTYPE html>
<html lang="ar">
@extends('layouts.head')
<body>
    <div class="col-md-5 row custom-position ">
        <div class="col-2  d-none d-md-flex d-lg-inline">  <img style="width:100dvh ;min-height: 100vh;max-height: 120vh " src="{{asset('assets/images/backgroundlogin.png')}}"></div>
        <div class="col-lg-4 d-none d-lg-flex mt-1">    <img height="100px" width="200px" style="margin-right: 110px" src="{{asset('assets/images/icon.png')}}"></div>
        <h5 class="col-5 text-center mt-0 ms-4 d-xl-flex d-none" style="padding-top: 35%" >لا تفوت الفرصة، كن جزءًا  <br>من مجتمع المتسوقين الأذكياء</h5>
    </div>
    <div class="col-10 col-lg-5 custom-position container my-5 p-3 rounded-5 custom-shadow" style="background-color: #E7E7E7;min-width: 469px; max-width: 500px; max-height: fit-content;right: 15%">
        @livewire('auth-form')
        <hr>
            {{-- start login with apple and google --}}
            <div class="row text-center d-flex justify-content-center">
                {{-- start login with apple --}}
                <div class="col-5 mx-2 btn border shadow rounded-4 custom-button">
                    <img src="{{asset('assets/images/apple-icon.png')}}" alt="Apple">
                    <span>المواصلة مع أبل</span>
                </div>
                {{-- end login with apple --}}

                {{-- start login with google --}}
                <a href="http://127.0.0.1:8000/auth/google/redirect" class="col-5 mx-2 btn border shadow rounded-4 custom-button">
                    <img src="{{asset('assets/images/google.svg')}}" alt="Google">
                    <span>المواصلة مع قوقل</span>
                </a>
                {{-- end login with google --}}
            </div>
            {{-- end login with apple and google --}}
    </div>
    <div class="col-sm-2 col-md-1 d-none d-sm-flex me-2 p-3 col-1 px-4 float-end" style="top: 2%">
        <a href="{{ url('/') }}" style="height: 45px; width: 45px;">
            <button class="rounded-circle" style="height: 45px; border: none; background-color: #D2E1E8; width: 45px;">
                <img src="{{ asset('assets/images/chevron-right.svg') }}">
            </button>
        </a>
    </div>
    @livewireScripts
    <script src="{{asset('assets/Js/custom-Js.js')}}"></script>
    <script>
    window.onload = updateTitleBasedOnUrl;
    </script>
</body>
</html>
