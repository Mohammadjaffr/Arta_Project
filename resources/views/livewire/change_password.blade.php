@extends('layouts.master')
@section('title', 'تعديل الاسم')
@section('contact')

        <div  class="container p-3"style="margin: 50px 250px 0px 0px;" >

            <form action="{{url('/change_password')}}" method="post" dir="rtl" class="border rounded-4 d-block p-3 mx-5">
                @csrf
                <label>كلمة المرور القديمة</label>
                <input class="form-control  my-2" name="old_password" type="password">
                <label>كلمة المرور الجديده</label>
                <input class="form-control my-2 " name="password" type="password">


                <button class="btn btn-light w-100 my-2  text-white" type="submit" style="background-color: #01496B">حفظ التغير</button>
            </form>

</div>
@endsection
