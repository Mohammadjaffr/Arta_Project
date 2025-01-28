<!DOCTYPE html>
<html lang="ar">
@extends('layouts.head')
<body>
    <div class="col-md-5 row custom-position ">
        <div class="col-2 d-none d-md-flex d-lg-inline">  <img style="width:100dvh ;min-height: 100vh;max-height: 120vh " src="{{asset('assets/images/backgroundlogin.png')}}"></div>
        <div class="col-lg-4 d-none d-lg-flex mt-1">    <img height="100px" width="200px" style="margin-right: 110px" src="{{asset('assets/images/icon.png')}}"></div>
        <h5 class="col-5 text-center mt-0 ms-4 d-xl-flex d-none" style="padding-top: 35%" >لا تفوت الفرصة، كن جزءًا  <br>من مجتمع المتسوقين الأذكياء</h5>
    </div>
    <div class="col-10 col-lg-5 custom-position container my-5 p-3 rounded-5 custom-shadow" style="background-color: #E7E7E7;min-width: 469px; max-width: 500px; max-height: fit-content;right: 15%">
            <form class="my-1 mx-3 p-2">

                <div class="text-end my-3 me-3 "> <h2>هل نسيت كلمة المرور؟</h2></div>
                <div class="text-end my-3 me-3 fw-bold text-black-50">لا تقلق، أدخل بريدك الإلكتروني أدناه لاستعادة كلمة المرور الخاصة بك </div>
                <div class="form-group text-end my-2" >
                    <label class="form-label me-3">البريد الاكتروني</label>
                    <input class="form-control py-2 rounded-4 custom-input" style="width: 100%;padding: 10px 10px;color: #555;max-font-size: 33px"  name="email" id="email" type="email" >
                </div>

                <div class="text-center"><input class="btn  w-75 mt-4 py-3 rounded-4 text-white" style="background-color: #01496B" type="submit" value="ارسال"></div>
            </form>
            <hr>
            <div class="row text-center d-flex justify-content-center">
                <div class="col-5 mx-2 btn border shadow rounded-4 custom-button">
                    <img src="{{asset('assets/images/apple-icon.png')}}" alt="Apple">
                    <span>المواصلة مع أبل</span>
                </div>
                <div class="col-5 mx-2 btn border shadow rounded-4 custom-button">
                    <img src="{{asset('assets/images/google.svg')}}" alt="Google">
                    <span>المواصلة مع قوقل</span>
                </div>
            </div>

        </div>
        <div class="col-sm-2 col-lg-1 d-none d-sm-flex me-2 p-3 col-1 px-4 float-end" style="top: 2%">
            <a href="{{ url('/') }}" style="height: 45px; width: 45px;">
                <button class="rounded-circle" style="height: 45px; border: none; background-color: #D2E1E8; width: 45px;">
                    <img src="{{ asset('assets/images/chevron-right.svg') }}">
                </button>
            </a>
        </div>
</body>
</html>



