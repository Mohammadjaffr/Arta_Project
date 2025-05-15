<li class="nav-item d-none d-lg-block">
    <a class="nav-link position-relative p-2" href="#"  role="button" data-bs-toggle="dropdown">
        <i class="fas fa-bell fs-5 " style="color: #046998;"></i>
        @if(Auth::user()->unreadNotifications->count() > 0)
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ Auth::user()->unreadNotifications->count() }}
                                    </span>
        @endif
    </a>

    <!-- Desktop Notifications Dropdown -->
    <div class="dropdown-menu dropdown-menu-end shadow-lg p-0" style="min-width: 350px;">
        <div class="dropdown-header d-flex justify-content-between">
            <span>الإشعارات</span>
            <a href="{{ route('show_users_notifications') }}" class="text-primary">عرض الكل</a>
        </div>
        <div class="dropdown-divider m-0"></div>
        <div class="list-group" style="max-height: 400px; overflow-y: auto;">
            @if(Auth::user()->unreadNotifications->count() > 0)
                @foreach($notifications as $item)
                    <a href="{{ route('mark_as_read', ['notificationId' => $item['notification']->id, 'redirectUrl' => route('chat', ['receiverId' => $item['user']->id])]) }}"
                       class="list-group-item list-group-item-action p-3 border-0">
                        <div class="d-flex align-items-start mx-2">
                            <img src="{{ asset($item['user']->image ?? 'assets/images/default-user.png') }}"
                                 class="rounded-circle" width="40" height="40"
                                 alt="{{ $item['user']->name ?? 'صورة المستخدم' }}">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-1 me-4">{{ $item['user']->name ?? 'مستخدم غير معروف' }}</h6>
                                    <small class="text-muted">{{ $item['notification']->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1 text-truncate">قام بتعليق جديد على منشورك: {{ $item['notification']->data['message'] ?? 'إشعار جديد' }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="p-3 text-center text-muted">لا توجد إشعارات جديدة</div>
            @endif
        </div>
        @if(Auth::user()->unreadNotifications->count() > 5)
            <div class="dropdown-footer text-center py-2">
                <a href="{{ route('show_users_notifications') }}" class="text-primary">تحميل المزيد</a>
            </div>
        @endif
    </div>
</li>
