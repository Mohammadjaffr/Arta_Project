@extends('layouts.master')
@section('title', 'معلومات الحساب')
@section('contact')
    <div class="my-5" dir="rtl">

        <div class="container border ">
            <h1 class="my-3">تفاصيل الحساب</h1>
            <h3 class="my-3">اسم المستخدم: <span>محمد السعدي</span></h3>
            <form >
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">الاسم الاول</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">الاسم الاخير</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">الايميل</label>
                        <input class="form-control" type="email" name="name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">رقم الوتس</label>
                        <input class="form-control" type="number" name="name">
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">رقم الجوال</label>
                        <input class="form-control" type="number" name="name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">الموقع</label>
                        <input class="form-control" type="email" name="name">
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">كلمة المرور الجديدة</label>
                        <input class="form-control" type="number" name="name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">تاكيد كلمة المرور</label>
                        <input class="form-control" type="email" name="name">
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">المنطقة</label>
                        <select class="form-select">
                            <option>المنطقة</option>
                            <option>صنعاء</option>
                            <option>حضرموت</option>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6 ">
                        <label class="form-label">الموقع</label>
                        <input class="form-control" type="text" name="">
                    </div>
                </div>
                    <h2>حسابات التواصل الاجتماعي</h2>
                <div class="row my-4">
                    <div class="col-lg-4 col-md-4">

                        <input class="form-control" type="number" placeholder="twitter" name="name">
                    </div>
                    <div class="col-lg-4 col-md-4">

                        <input class="form-control" type="number" placeholder="twitter" name="name">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <input class="form-control" type="number" placeholder="twitter" name="name">
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-lg-4 col-md-4">
                        <input class="form-control" type="number" placeholder="twitter" name="name">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <input class="form-control" type="number" placeholder="twitter" name="name">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <input class="form-control" type="number" placeholder="twitter" name="name">
                    </div>
                </div>
                <h2>صورة البروفايل</h2>
                <div class="row my-4">
                <input class="col-lg-1  border rounded-3 m-3" type="file" style=" padding: 2%;">
                </div>
                <div class="row ">
                    <input class="col-lg-1 btn btn-primary border rounded-3 m-3" type="submit" style=" padding: 2%;">
                </div>

            </form>
        </div>


    </div>
@endsection
