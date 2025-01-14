@extends('layouts.master')
@section('title', 'تعديل البريد الاكتروني')
@section('contact')
     @include('layouts.header')
        <div  class="container">
            <form dir="rtl" class="border rounded-4 p-3 w-50" style="position: relative;left: 35vh;margin: 20px;">
                <label><b> البريد الاكتروني القديم</b></label>
                <input class="form-control  m-2" type="text">
                <label><b> البريد الاكتروني الجديد</b></label>
                <input class="form-control  m-2" type="text">
                <button class="btn  w-50 mt-3 w-50 text-white" style="margin-right: 160px;background-color: #01496B">حفظ التغير</button>
            </form>
        </div>
        @include('layouts.footer')
@endsection
