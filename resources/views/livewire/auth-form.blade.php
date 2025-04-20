<div>
    <div class="rounded-5 d-flex" style="background-color: rgba(1, 73, 107, 0.68)">
        <button onclick="changeUrl('/register');" wire:click="toggleForm(false)" class="btn w-50 text-white my-2 ms-2 rounded-5 {{ $showLogin ? '' : 'custom-bg-primary' }}">انشاء حساب</button>
        <button onclick="changeUrl('/login');" wire:click="toggleForm(true)" class="btn w-50 text-white  my-2 me-2 rounded-5 {{ $showLogin ? 'custom-bg-primary' : '' }}">تسجيل الدخول</button>
    </div>
    @if($showLogin)
        <div class="text-end my-3 me-5 text-black-50">
            <span style="color: rgba(1, 83, 73, 1);">!!اهلا بعودتك مجددا استمتع معنا في تجربة مميزة</span>
        </div>
        {{-- form Login --}}
        <form class="my-3 mx-2" method="POST" action="{{ route('login') }}">
            @csrf
            {{-- input Username OR Email --}}
            <div class="form-group text-end my-2">
                <label class="form-label me-3">اسم المستخدم أو البريد الإلكتروني</label>
                <input class="form-control py-2 rounded-4 custom-input  @error('login') border-red @else custom-input @enderror  " type="text" name="login" value="{{ old('login') }}" >
                @error('login')
                    <span class="me-2 custom-validation-error">
                        <strong>{{ $message }}</strong>
                        <img src="{{asset('assets/images/Vector.svg')}}" alt="">
                    </span>
                @enderror
            </div>
            {{-- input Password --}}
            <div class="form-group text-end my-2">
                <label class="form-label me-3">كلمة المرور</label>
                    <input class="form-control rounded-4 py-2 custom-input  @error('password') is-invalid @else custom-input @enderror" type="{{$type}}" name="password" id="password"   autocomplete="current-password">
                    @error('password')
                    <span class="custom-validation-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>
            {{-- rememberMe AND forget password --}}
            <div class="d-flex align-items-center mx-3 mb-2">
                <input class="form-check-input custom-input me-2" style=" width: 20px;height: 20px; cursor: pointer;" name="remember" id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-label me-auto fw-bold pt-2" for="rememberMe">تذكرني</label>
                <a href="{{ route('password.request') }}" class="link fw-bold text-decoration-none" style="color:rgba(1, 73, 107, 0.68);">هل نسيت كلمة المرور؟</a>
            </div>
            {{-- inout submit --}}
            <div class="text-center">
                <input class="btn w-100 py-3 rounded-4 text-white" style="background-color:rgba(0, 91, 134, 0.88)" type="submit" value="تسجيل الدخول">
            </div>
        </form>
                {{-- End form login --}}
        @else
        <div class="text-end my-3 me-5 text-black-50">
            <span style="color: rgba(1, 83, 73, 1);">!نرحب بوجودك معنا استمتع بخدمات مميزة</span>
        </div>
                {{-- start form register --}}
                <form class="my-3 mx-2" method="POST" action="{{ route('register') }}">
                    @csrf
                    {{-- start name input --}}
                    <div class="form-group text-end my-2">
                        <label class="form-label me-3">الاسم بالكامل</label>
                        <input class="form-control py-2 rounded-4 @error('name') border-red @else custom-input @enderror " value="{{ old('name') }}" type="text" name="name"  style=" direction: rtl" >
                        @error('name')
                            <span class="me-2 custom-validation-error">
                                <strong>{{ $message }}</strong>
                                <img src="{{asset('assets/images/Vector.svg')}}" alt="">
                            </span>
                        @enderror
                    </div>
                    {{-- end name input --}}

                    {{-- start email input --}}
                    <div class="form-group text-end my-2">
                        <label class="form-label me-3">البريد الإلكتروني</label>
                        <input class="form-control py-2 rounded-4 @error('email') border-red @else custom-input @enderror" name="email" value="{{ old('email') }}" type="email" >
                        <a ></a>
                        @error('email')
                            <span class="me-2 custom-validation-error">
                                <strong>{{ $message }}</strong>
                                <img src="{{asset('assets/images/Vector.svg')}}" alt="">
                            </span>
                        @enderror
                    </div>
                    {{-- end email input --}}

                    {{-- start password input --}}
                    <div class="row">
                        <div class="form-group text-end my-2 col-6">
                            <label class="form-label me-3">إعادة كتابة كلمة المرور</label>
                            <div class="d-flex align-items-center position-relative">
                                <input class="form-control rounded-4 py-2 @error('password') border-red @else custom-input @enderror" name="password_confirmation" type="{{$typeConfirmePassword}}" >
                                <img wire:click="togglePassword('password_confirmation')" style="position: absolute; right: 15px; cursor: pointer;" src="{{ asset('assets/images/'. $iconConfirmePassword .'.svg') }}" alt="{{ $iconConfirmePassword }} icon">
                            </div>
                            @error('password_confirmation')
                            <span class="me-2 custom-validation-error">
                                <strong>{{ $message }}</strong>
                                <img src="{{asset('assets/images/Vector.svg')}}" alt="">
                            </span>
                            @enderror
                        </div>
                        <div class="form-group text-end my-2 col-6">
                            <label class="form-label me-3">كلمة المرور </label>
                            <div class="d-flex align-items-center position-relative">
                                <input class="form-control rounded-4 py-2 @error('password') border-red @else custom-input @enderror" name="password" type="{{$type}}" >
                                <img wire:click="togglePassword('password')" style="position: absolute; right: 15px; cursor: pointer;" src="{{ asset('assets/images/'. $icon .'.svg') }}" alt="{{ $icon }} icon">
                            </div>
                            @error('password')
                            <span class="me-2 custom-validation-error">
                                <strong>{{ $message }}</strong>
                                <img src="{{asset('assets/images/Vector.svg')}}" alt="">
                            </span>
                            @enderror
                        </div>

                    </div>
                    {{-- end password input --}}

                    {{-- start number inputs --}}
                    <div class="row">
                        {{-- start whatsapp_number input --}}
                        <div class="form-group text-end my-2 col-6">
                            <label class="form-label me-3">رقم الواتساب</label>
                            <input class="form-control py-2 rounded-4 @error('whatsapp_number') border-red @else custom-input @enderror" value="{{ old('whatsapp_number') }}" name="whatsapp_number" type="number" >
                            @error('whatsapp_number')
                                <span class="me-2 custom-validation-error">
                                    <strong>{{ $message }}</strong>
                                    <img src="{{asset('assets/images/Vector.svg')}}" alt="">
                                </span>
                            @enderror
                        </div>
                        {{-- end whatsapp_number input --}}

                        {{-- start contact_number input --}}
                        <div class="form-group text-end my-2 col-6">
                            <label class="form-label me-3">رقم التواصل</label>
                            <input class="form-control py-2 rounded-4 @error('contact_number') border-red @else custom-input @enderror"  value="{{ old('contact_number') }}" name="contact_number" type="number" >
                            @error('contact_number')
                                <span class="me-2 custom-validation-error">
                                    <strong>{{ $message }}</strong>
                                    <img src="{{asset('assets/images/Vector.svg')}}" alt="">
                                </span>
                            @enderror
                        </div>
                        {{-- end contact_number input --}}
                    </div>
                    {{-- end number inputs --}}

                    {{-- start submit button register --}}
                    <div class="text-center">
                        <input class="btn w-100 py-3 rounded-4 text-white" style="background-color:rgba(0, 91, 134, 0.88)" type="submit" value="إنشاء حساب">
                    </div>
                    {{-- end submit button register --}}

                </form>
                {{-- End form register --}}

            @endif
</div>
