@extends('layouts.master')
@section('title', 'تعديل الاسم')
@section('contact')
    <div class="container  w-75">
        <form dir="rtl" class="border rounded-4 p-3 w-50" style="position: relative;left: 35vh;margin: 20px;">
            <label><b>الاسم القديم</b></label>
            <input class="form-control  m-2" type="text">
            <label><b>الاسم الجديد</b></label>
            <input class="form-control  m-2" type="text">

            <button class="btn  w-50 mt-3 w-50 text-white" style="margin-right: 160px;background-color: #01496B">حفظ
                التغير
            </button>
        </form>
    </div>
@endsection
