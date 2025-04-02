@php use Illuminate\Support\Facades\Auth;use Illuminate\Support\Str; @endphp
<div>
<div class="notifications-container py-5 px-3 px-md-5">
    <div class=" border-0 shadow-lg rounded-3 overflow-hidden">
        <div class=" bg-white py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-center w-100">
                    <i class="bi bi-bell-fill me-2 text-primary"></i> الزبائن
                </h5>
            </div>
        </div>

        <div class="p-0">
            @if(Auth::user())
                @php
                    // جلب المستخدمين مع حالة الاتصال
                    $users = App\Models\User::query()
                        ->where('id', '!=', Auth::id()) // استبعاد المستخدم الحالي
                        ->get()
                        ->map(function ($user) {
                            return [
                                'user' => $user,
                                'is_online' => $user->isOnline()
                            ];
                        });
                @endphp

                <ul class=" list-group-flush">
                    @if($users->count() > 0)
                        @foreach($users as $item)
                            <li class="list-group-item list-group-item-action p-3 border my-1 rounded-1 hover-bg-light">
                                <a href="{{ route('chat', ['receiverId' => $item['user']->id]) }}"
                                   class="text-decoration-none text-dark d-flex align-items-start">
                                    <div class="position-relative me-3 flex-shrink-0">
                                        <img src="{{ asset($item['user']->image ?? 'assets/images/default-user.png') }}"
                                             class="rounded-circle object-fit-cover"
                                             width="48" height="48"
                                             alt="صورة {{ $item['user']->name ?? 'مستخدم' }}"
                                             onerror="this.src='{{ asset('assets/images/default-user.png') }}'">
                                        <span class="position-absolute bottom-0 end-0 p-1 bg-{{ $item['is_online'] ? 'success' : 'secondary' }}
                                               border-2 border-white rounded-circle"></span>
                                    </div>

                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center mb-1 mx-3">
                                            <h6 class="mb-0 fw-semibold">{{ $item['user']->name }}</h6>
                                            <small class="text-{{ $item['is_online'] ? 'success' : 'secondary' }}">
                                                {{ $item['is_online'] ? 'متصل الآن' : 'غير متصل' }}
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @else
                        <div class="empty-state text-center py-5">
                            <i class="bi bi-people fs-1 text-muted opacity-50"></i>
                            <h6 class="text-muted mt-3">لا يوجد مستخدمين آخرين</h6>
                            <p class="text-muted small">سيظهر هنا أي مستخدمين مسجلين في النظام</p>
                        </div>
                    @endif
                </ul>
            @else
                <div class="empty-state text-center py-5">
                    <i class="bi bi-person-x fs-1 text-muted opacity-50"></i>
                    <h6 class="text-muted mt-3">يجب تسجيل الدخول</h6>
                    <p class="text-muted small">لرؤية المستخدمين الآخرين، يرجى تسجيل الدخول أولاً</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .notifications-container {
        min-height: calc(100vh - 120px);
        background-color: #f8f9fa;
    }

    .hover-bg-light:hover {
        background-color: #f8f9fa !important;
    }

    .empty-state {
        max-width: 300px;
        margin: 0 auto;
    }

    .object-fit-cover {
        object-fit: cover;
    }
</style>
</div>
