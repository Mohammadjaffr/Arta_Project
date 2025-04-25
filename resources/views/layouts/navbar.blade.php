@php use Illuminate\Support\Facades\Auth; @endphp
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow" style="max-height: 120px; position: relative;" dir="rtl" id="navbar">
    <div class="container-fluid">
        <!-- Logo and Brand -->
        <a href="{{ url('/') }}" class="d-flex flex-column align-items-center justify-content-between mt-1 text-decoration-none" style="width: 150px; height: 100px;">
            <img alt="icon" class="img-fluid" style="max-width: 150px; max-height: 80px;" src="{{ asset('assets/images/icon.png') }}">
            <h3 class="fw-bold m-0" style="color: var(--primary-custom-color); font-family: 'Tajawal', sans-serif;">منصة عرطة</h3>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Main Navigation -->
        <div class="collapse navbar-collapse bg-light" id="navbarNavDropdown" style="z-index: 1000;">
            <div class="mx-auto text-center">
                <ul class="navbar-nav d-inline-flex align-items-center">
                    <!-- Mobile User Info -->
                    @auth
                        <li class="d-lg-none text-center mb-2">
                            <a class="link fw-bold text-decoration-none" style="color: var(--warning-custom-color); font-family: 'Tajawal', sans-serif; font-size: 20px" href="{{ route('account_show') }}">
                                {{ Auth::user()->name }}
                            </a>
                        </li>

                        <!-- Mobile Notifications -->
                        <li class="nav-item d-lg-none">
                            <a class="nav-link position-relative p-2" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-bell fs-5 text-primary"></i>
                                @if(Auth::user()->unreadNotifications->count() > 0)
                                    <span class="position-absolute  translate-middle badge rounded-pill bg-danger">
                                        {{ Auth::user()->unreadNotifications->count() }}
                                    </span>
                                @endif
                            </a>

                            <!-- Mobile Notifications Dropdown -->
                            <div class="dropdown-menu dropdown-menu-end shadow-lg p-0" style="min-width: 100%;">
                                <div class="dropdown-header">الإشعارات</div>
                                <div class="dropdown-divider m-0"></div>
                                <div class="list-group" style="max-height: 300px; overflow-y: auto;">
                                    @if(Auth::user()->unreadNotifications->count() > 0)
                                        @php
                                            $notifications = Auth::user()->unreadNotifications
                                                ->where('data.user_id', '!=', null)
                                                ->sortByDesc('created_at')
                                                ->groupBy('data.user_id')
                                                ->map(function ($notifications) {
                                                    $latest = $notifications->first();
                                                    $user = App\Models\User::find($latest->data['user_id']);
                                                    return [
                                                        'notification' => $latest,
                                                        'user' => $user
                                                    ];
                                                });
                                        @endphp

                                        @foreach($notifications as $item)
                                            <a href="{{ route('show_users_notifications')}}" class="list-group-item list-group-item-action p-3 border-0">
                                                <div class="d-flex align-items-start mx-2">
                                                    <img src="{{ asset($item['user']->image ?? 'assets/images/default-user.png') }}" class="rounded-circle " width="40" height="40"
                                                         alt="{{ $item['user']->name ?? 'صورة المستخدم' }}">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <h6 class="mb-1 me-4">{{ $item['user']->name ?? 'مستخدم غير معروف' }}</h6>
                                                            <small class="text-muted">{{ $item['notification']->created_at->diffForHumans() }}</small>
                                                        </div>
                                                        <p class="mb-1 text-truncate">قام بتعليق جديد على منشورك:  {{ $item['notification']->data['message'] ?? 'إشعار جديد' }}</p>

                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @else
                                        <div class="p-3 text-center text-muted">لا توجد إشعارات جديدة</div>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="d-lg-none text-center mb-2">
                            <a href="{{ route('login') }}" class="btn btn-primary w-100" style="font-size: 18px">تسجيل الدخول</a>
                        </li>
                    @endauth

                    <!-- Navigation Links -->
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-2 @if(request()->is('/')) active @endif" href="{{ url('/') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-2 @if(request()->is('about')) active @endif" href="{{ url('about') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-2 @if(request()->is('contact')) active @endif" href="{{ url('contact') }}">اتصل بنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-2 @if(request()->is('users')) active @endif" href="{{ url('users') }}">الدردشات</a>
                    </li>

                    <!-- Desktop Notifications (Authenticated Users) -->
                    @auth
                        @livewire('notifications-nav')
                    @endauth
                </ul>
            </div>
        </div>

        <!-- User Profile (Desktop - Authenticated Users) -->
        @auth
            <div class="nav-item dropdown no-arrow ms-4 d-none d-lg-flex">
                <a class="btn d-flex align-items-center" style="background-color: transparent; border: 2px solid var(--primary-custom-color); color: var(--primary-custom-color); border-radius: 50px; padding: 5px 15px;" href="#" role="button" data-bs-toggle="dropdown">
                    <span class="me-2">{{ Auth::user()->name }}</span>
                    <img src="{{ asset(Auth::user()->image ?? 'assets/images/default-user.png') }}" class="rounded-circle" width="32" height="32" alt="صورة المستخدم">
                </a>

                <!-- User Dropdown Menu -->
                <div class="dropdown-menu  shadow-lg" style="min-width: 200px;">
                    <div class="dropdown-item text-center py-3">
                        <img src="{{ asset(Auth::user()->image ?? 'assets/images/default-user.png') }}" class="rounded-circle mb-2" width="80" height="80" alt="صورة المستخدم">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <small class="text-muted">{{ Auth::user()->email }}</small>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-end" href="{{ route('account_show') }}">
                        <i class="fas fa-user-circle me-2"></i> الملف الشخصي
                    </a>
                    <a class="dropdown-item text-end" href="#">
                        <i class="fas fa-cog me-2"></i> الإعدادات
                    </a>
                    <div class="dropdown-divider "></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-end">
                            <i class="fas fa-sign-out-alt me-2"></i> تسجيل خروج
                        </button>
                    </form>
                </div>
            </div>
        @else
            <!-- Login Button (Desktop) -->
            <div class="d-none d-lg-flex align-items-center ms-4">
                <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2" style="font-size: 18px; border-radius: 50px;">
                    تسجيل الدخول
                </a>
            </div>
        @endauth
    </div>
</nav>
