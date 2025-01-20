@extends('layouts.master')
@section('title', 'تعديل الاسم')
@section('contact')
<div  style="background-image: url({{'assets/images/'}});background-repeat:repeat">
        <div  class="container  w-75">
            <div style="flex-direction: column">
                <div class="border rounded " style="width: 180px;margin-left: 60vh; background-image: url({{'assets/images/'}}); height: 150px;position: relative;">
                    <a href="#" class="border bg-white text-center rounded-top-5 rounded-start-5 " style="position:absolute;width: 50px;height: 50px;left: 127px;top: 97px;" ><img class="mt-2" style="width: 20px;height: 30px;" src="{{asset('assets/images/camera.svg')}}"></a>
                </div>
                <div class="d-flex"style="margin-left: 63vh">
                    <a href="#" class="mt-2 "><img style="width: 40px;height: 40px;" src="{{asset('assets/images/pen.png')}}"></a>
                    <h5 class="mt-3 mx-2">محمد سالم</h5>
                </div>
            </div>

            <form dir="rtl" class="border rounded-4 p-3 w-50" style="position: relative;left: 35vh;margin: 20px;">
                <label>كلمة المرور القديمة</label>
                <input class="form-control  m-2" type="password">
                <label>كلمة المرور الجديده</label>
                <input class="form-control  m-2" type="password">

                <button class="btn  w-50 mt-3 w-50 text-white" style="margin-right: 160px;background-color: #01496B">حفظ التغير</button>
            </form>
        </div>
</div>
@endsection
