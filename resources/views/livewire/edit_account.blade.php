@extends('layouts.master')
@section('title', 'معلومات الحساب')
@section('contact')
    <div class="my-5" dir="rtl">
        <div>
            <div class="container border">
                <h1 class="my-3">تفاصيل الحساب</h1>
                <h3 class="my-3">اسم المستخدم: <span>{{$users->name}}</span></h3>
                <form autocomplete="off" method="POST" action="{{ route('update', $users->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">الاسم</label>
                            <input value="{{$users->name}}" class="form-control" type="text" name="name">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">اسم المستخدم</label>
                            <input value="{{$users->username}}" class="form-control" type="text" name="username">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">الايميل</label>
                            <input value="{{$users->email}}" class="form-control" type="email" name="email">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">رقم الوتس</label>
                            <input value="{{$users->whatsapp_number}}" class="form-control" type="text" name="whatsapp_number">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">رقم الجوال</label>
                            <input value="{{$users->contact_number}}" class="form-control" type="text" name="contact_number">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">الموقع</label>
                            <input value="{{$users->location}}" class="form-control" type="text" name="location">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">كلمة المرور الجديدة</label>
                            <input value="{{$users->password}}" class="form-control" type="password" name="password">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">تاكيد كلمة المرور</label>
                            <input class="form-control" type="password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">المنطقة</label>
                            <select class="form-select" name="region">
                                <option value="">المنطقة</option>
                                <option value="صنعاء" {{ $users->region == 'صنعاء' ? 'selected' : '' }}>صنعاء</option>
                                <option value="حضرموت" {{ $users->region == 'حضرموت' ? 'selected' : '' }}>حضرموت</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">الموقع</label>
                            <input value="{{$users->location}}" class="form-control" type="text" name="location">
                        </div>
                    </div>
                    <h2>حسابات التواصل الاجتماعي</h2>
                    <div class="row my-4">
                        <div class="col-lg-4 col-md-4">

                            <input  class="form-control" type="text" placeholder="twitter" name="twitter">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <input  class="form-control" type="text"placeholder="facebook"  name="facebook">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <input  class="form-control" type="text" placeholder="instagram"  name="instagram">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-lg-4 col-md-4">
                            <input  class="form-control" type="text" placeholder="linkedin" name="linkedin">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <input  class="form-control" type="text" placeholder="youtube" name="youtube">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <input  class="form-control" type="text" placeholder="snapchat" name="snapchat">
                        </div>
                    </div>
                    <h2>صورة البروفايل</h2>
                    <div class="row my-4">
                        <div class="border rounded-3 mx-3" style="width: 150px; height: 150px; background-image: url({{ Auth::user()->image }}); background-size: cover; background-position: center; cursor: pointer;" onclick="document.getElementById('fileInput').click();">
                            <input name="image" id="fileInput" class="form-control" type="file" style="display: none;" onchange="updateImage(event)">
                        </div>
                    </div>
                    <div class="row">
                        <button class="col-lg col-md btn btn-primary m-2" type="submit">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    function updateImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                // تحديث خلفية الـ div بالصورة الجديدة
                const div = document.querySelector('.border.rounded-3');
                div.style.backgroundImage = `url(${e.target.result})`;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
