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
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link fs-5 mx-2" @if(request()->is('users')) style="color: var(--primary-custom-color);font-weight: bold;" @endif  href="{{ url('users') }}">الرسائل</a>--}}
{{--                    </li>--}}
                    @auth
                    <a class="btn position-relative p-2"
                       style="color: var(--primary-custom-color); font-weight: bold;"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false"
                       aria-label="الرسائل مع إشعارات">

                        <i class="fas fa-envelope fs-5"></i>

                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                             {{Auth::user()->unreadNotifications->count()}}
      <span class="visually-hidden">رسائل غير مقروءة</span>
   </span>
                    </a>



                    <li class="nav-item">
                        <div class="nav-item dropdown no-arrow ms-4 d-none d-lg-flex">

                            <div class="dropdown-menu dropdown-menu-right shadow-lg animated--grow-in p-0"
                                 aria-labelledby="alertsDropdown" style="text-align: start; min-width: 350px;">
                                <div class="dropdown-header d-flex justify-content-between align-items-center">
                                    <span>الإشعارات</span>
{{--                                    <small><a href="{{ route('markAllAsRead') }}" class="text-primary">تعيين الكل كمقروء</a></small>--}}
                                </div>
                                <div class="dropdown-divider m-0"></div>
                                <div class="list-group notification-container" style="max-height: 400px; overflow-y: auto;">
                                    @forelse(Auth::user()->unreadNotifications as $notification)
                                        <!-- إشعار مع صورة - غير مقروء -->
                                        <a href="{{ route('notification', ['id' => $notification->data['message_id']]) }}"
                                           class="list-group-item list-group-item-action notification-item notification-unread p-3 border-0">
                                            <div class="d-flex align-items-start">
                                                <img src="{{ asset(Auth::user()->image) }}" class="rounded-circle me-3" width="50" height="50" alt="صورة المستخدم">
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h6 class="mb-1">{{ $notification->data['user_name'] }}</h6>
                                                        <small class="notification-time text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                                    </div>
                                                    <p class="mb-1">قام بتعليق جديد على منشورك: <strong>{{ $notification->data['message'] }}</strong></p>
                                                    <small class="text-muted">اضغط لعرض التعليق</small>
                                                </div>
                                            </div>
                                        </a>
                                    @empty
                                        <div class="p-3 text-center text-muted">لا توجد إشعارات جديدة</div>
                                    @endforelse
                                </div>
                                <div class="dropdown-footer text-center py-2">
{{--                                    <a href="{{ route('allNotifications') }}" class="text-primary">عرض جميع الإشعارات</a>--}}
                                </div>
                            </div>
                        </div>
                    </li>


                </ul>
            </div>
        </div>

        @endauth
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
                <div class="dropdown-item" style="display: flex; flex-direction: column; align-items: center; background-color: rgba(248, 249, 250, 0.8); padding: 10px; border-radius: 5px; background-repeat: repeat; background-size: 20px 20px;">
                    @if(Auth::user()->image == true)
                    <img src="http://127.0.0.1:8000/{{Auth::user()->image}}" alt="User Image"
                         style="width: 90px; height: 90px; border-radius: 50%; margin-top: 5px;">
                    @else
                        <img src="#" alt="User Image"
                             style="width: 90px; height: 90px; border-radius: 50%; margin-top: 5px;">
                    @endif
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
