@extends('layouts.master')
@section('title', 'تعديل الاسم')
@section('contact')
    <div class="container p-3">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="border rounded-4 p-3" style="margin: 100px 0;">
                    <form action="{{ url('/change_password') }}" method="post" dir="rtl">
                        @csrf
                        <div class="mb-3">
                            <label for="old_password" class="form-label">كلمة المرور القديمة</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور الجديدة</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">تاكيد كلمة المرور</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn w-100 text-white" style="background-color: #01496B;">حفظ التغيير</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
