@extends('layouts.master')
@section('title', 'تعديل الاسم')
@section('contact')
    <div class="container p-3">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="border rounded-4 p-3" style="margin: 100px 0;">
                    <form method="post" action="{{route('change_password')}}" class="my-1 mx-3 p-2">
                        @csrf
                        <div class="text-end my-3 me-3">
                            <h2>ادخل كلمة المرور</h2>
                        </div>
                        <div class="text-end my-3 me-3 fw-bold text-black-50">
                            لا تقلق، أدخل كلمة المرور القديمة أدناه لعمل كلمة مرور جديده
                        </div>

                        <div class="form-group text-end my-2">
                            <!-- كلمة المرور القديمة -->
                            <div style="position: relative;">
                                <label class="form-label">كلمة المرور القديمة</label>
                                @error('old_password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input class="form-control py-2 rounded-4 custom-input my-2"
                                       style="width: 100%;padding: 10px 10px;color: #555;max-font-size: 33px"
                                       id="old_password" name="old_password" required type="password"
                                       value="{{ old('old_password') }}" placeholder="كلمة المرور القديمة">
                                <span class="toggle-password"
                                      style="position: absolute; left: 10px; top: 75%; transform: translateY(-50%); cursor: pointer;">
                <i class="fas fa-eye"></i>
            </span>
                            </div>

                            <!-- كلمة المرور الجديدة -->
                            <div style="position: relative;">
                                <label class="form-label me-3">كلمة المرور الجديدة</label>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input class="form-control py-2 rounded-4 custom-input"
                                       style="width: 100%;padding: 10px 10px;color: #555;max-font-size: 33px"
                                       id="password" name="password" required type="password"
                                       value="{{ old('password') }}" placeholder="كلمة المرور الجديدة">
                                <span class="toggle-password"
                                      style="position: absolute; left: 10px; top: 72%; transform: translateY(-50%); cursor: pointer;">
                <i class="fas fa-eye"></i>
            </span>
                            </div>

                            <!-- تأكيد كلمة المرور -->
                            <div style="position: relative;">
                                <label class="form-label me-3">تأكيد كلمة المرور</label>
                                @error('confirm_password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input class="form-control py-2 rounded-4 custom-input"
                                       style="width: 100%;padding: 10px 10px;color: #555;max-font-size: 33px"
                                       id="confirm_password" name="confirm_password" required type="password"
                                       value="{{ old('confirm_password') }}" placeholder="تاكيد كلمة المرور ">
                                <span class="toggle-password"
                                      style="position: absolute; left: 10px; top: 72%; transform: translateY(-50%); cursor: pointer;">
                <i class="fas fa-eye"></i>
            </span>
                            </div>
                        </div>

                        <div class="text-center">
                            <input class="btn w-75 mt-4 py-3 rounded-4 text-white"
                                   style="background-color: #01496B" type="submit" value="تحقق">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggleButtons = document.querySelectorAll('.toggle-password');

                toggleButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const input = this.parentElement.querySelector('input');
                        const icon = this.querySelector('i');

                        if (input.type === 'password') {
                            input.type = 'text';
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');
                        } else {
                            input.type = 'password';
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                        }
                    });
                });
            });
        </script>
    </div>
@endsection
