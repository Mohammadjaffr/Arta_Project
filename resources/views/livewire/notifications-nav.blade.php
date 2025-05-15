<div>

    <li class="nav-item d-none d-lg-block">
        <a class="nav-link position-relative p-2"
           wire:click.prevent="toggleDropdown"
           role="button">
            <i class="fas fa-bell fs-5" style="color: #046998;"></i>
            @if($totalUnread > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $totalUnread }}
                </span>
            @endif
        </a>

        <!-- Desktop Notifications Dropdown -->
        <div class="dropdown-menu dropdown-menu-end  shadow-lg p-0" style="min-width: 350px; display: {{ $isDropdownOpen ? 'block' : 'none' }};">
            <div class="dropdown-header d-flex justify-content-between">
                <span>الإشعارات</span>
                @if(!$showAll && $totalUnread > 4)
                    <button wire:click.prevent="showAllNotifications" class="nav-link " >عرض الكل</button>
                @endif
            </div>
            <div class="dropdown-divider m-0"></div>
            <div class="list-group" style="max-height: 400px; overflow-y: auto;">
                @if($totalUnread > 0)
                    @foreach($notifications as $item)
                        <a href="{{ route('show_users_notifications') }}"
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
            <hr>
            @if($hasMore)
                <div class="dropdown-footer  py-2">
                    <button  wire:click.prevent="loadMore" style="margin-right: 35%;" class=" nav-link " >تحميل المزيد</button>
                </div>
            @endif
        </div>
    </li>
</div>
