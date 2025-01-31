<nav class="navbar navbar-expand-lg navbar-light bg-light shadow" style="max-height: 120px; position: relative;" dir="rtl" id="navbar">
    <div class="container-fluid">
        <div class="d-flex flex-column align-items-center justify-content-between mt-1" style="width: 150px; height: 100px;">
            <img alt="icon" style="max-width: 150px; max-height: 200px; height:auto" src="{{asset('assets/images/icon.png')}}">
            <h3 class="fw-bold" style="color: var(--primary-custom-color); font-family: 'Tajawal', sans-serif;" >منصة عرطة</h3>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse bg-light" id="navbarNavDropdown" style="z-index: 1000;">
            <div class="mx-auto text-center">
                <ul class="navbar-nav d-inline-flex">
                    <li>
                        @if(Auth::user())
                            <div class="d-lg-none text-center mb-2">
                                <a class="link fw-bold text-decoration-none" style="color: var(--warning-custom-color);font-weight: bold; font-family: 'Tajawal', sans-serif; font-size: 20px" href="{{route('account_show')}}" style="font-size: 20px">{{Auth::user()->name}}</a>
                            </div>
                        @else
                            <span class="d-lg-none text-center mb-2">
                                <button class="btn btn-primary border" style="font-size: 20px">تسجيل الدخول</button>
                            </span>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-2" @if(request()->is('/')) style="color: var(--primary-custom-color);font-weight: bold;" @endif href="{{ url('/') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-2"@if(request()->is('about')) style="color: var(--primary-custom-color);font-weight: bold;" @endif href="{{ url('about') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-2" @if(request()->is('contact')) style="color: var(--primary-custom-color);font-weight: bold;" @endif  href="{{ url('contact') }}">اتصل بنا</a>
                    </li>
                </ul>
            </div>
        </div>


        @if(Auth::user())

            <div class="dropdown ">
                <a class="btn btn-light mx-4 px-5 text-white " style="background-color: #01496B" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>

                <ul class="dropdown-menu ">
                    <li><a class="dropdown-item" href="{{route('account_show')}}">
                            <img class="ms-2" src="{{asset('assets/images/person.png')}}" alt="" style="width: 40px; height: 40px; border-radius: 50%;">
                                <span>البروفايل</span>
                        </a>
                    </li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                            class="bx bx-log-out"></i> تسجيل خروج</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>

        @else
            <span class="d-none d-lg-flex align-items-center mx-4">
                <a href="{{route('login')}}">
                    <button class="btn btn-primary border" style="font-size: 20px">تسجيل الدخول</button>
                </a>
            </span>
        @endif

    </div>

</nav>
