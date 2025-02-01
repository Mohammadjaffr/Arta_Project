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

        <div class="nav-item dropdown no-arrow ms-4 d-none d-lg-flex">
            <a class="btn" 
               style="background-color: transparent; border: 2px solid #0056b3; color: #007BFF; border-radius: 5px; padding: 5px 10px;" 
               href="#" 
               role="button" 
               data-bs-toggle="dropdown" 
               aria-expanded="false">
                <i class="fas fa-user">{{ Auth::user()->name }}</i>
            </a>
            
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow-lg animated--grow-in" 
                 aria-labelledby="userDropdown" style="text-align: start;">
                <div class="dropdown-item" style="display: flex; flex-direction: column; align-items: center; background-color: rgba(248, 249, 250, 0.8); padding: 10px; border-radius: 5px; background-image: url('{{ asset('assets/images/icon.png') }}'); background-repeat: repeat; background-size: 20px 20px;">
                    <img src="{{asset('assets/images/person.png')}}" alt="User Image" 
                         style="width: 50px; height: 50px; border-radius: 50%; margin-top: 5px;">
                </div>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        تسجيل خروج
                    </button>
                </form>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('account_show')}}" >
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    ملفي الشخصي
                </a>
            </div>
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
