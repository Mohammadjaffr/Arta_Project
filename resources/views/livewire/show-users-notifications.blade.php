@php use Psy\Util\Str; @endphp
<div>

    <div class="notifications-container py-5 px-3 px-md-5">
        <div class=" border-0 shadow-lg rounded-3 overflow-hidden">
            <div class=" bg-white py-3 border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold text-center w-100">
                        <i class="bi bi-bell-fill me-2 text-primary"></i> الإشعارات
                    </h5>
                    @if(Auth::user()->unreadNotifications->count() > 0)
                        <span class="badge bg-danger rounded-pill position-absolute top-0 end-0 translate-middle">
                        {{ Auth::user()->unreadNotifications->count() }}
                        <span class="visually-hidden">إشعارات جديدة</span>
                    </span>
                    @endif
                </div>
            </div>

            <div class=" p-0">
                @if(Auth::user()->unreadNotifications->count() > 0)

                    <ul class="list-group list-group-flush">
                        @foreach($notifications as $item)
                            <li class="list-group-item list-group-item-action p-3 border-0 hover-bg-light">
                                <a href="{{ route('chat', ['receiverId' => $item['notification']->data['user_id']]) }}"
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
                                            <h6 class="mb-0 fw-semibold">{{ $item['user']->name ?? 'مستخدم غير معروف' }}</h6>
                                            <div class="d-flex align-items-center">
                                                <small class="text-muted ms-1">
                                                    {{ $item['notification']->created_at->diffForHumans() }}
                                                </small>
                                                @if($item['count'] > 1)
                                                    <span class="badge bg-danger rounded-pill">
                                                    {{ $item['count'] }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <p class="mb-0 text-muted me-3">
                                            <span class="text-primary">قام بتعليق جديد:</span>
                                            {{ $item['message'] }}
                                        </p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="empty-state text-center py-5">
                        <i class="bi bi-bell-slash fs-1 text-muted opacity-50"></i>
                        <h6 class="text-muted mt-3">لا توجد إشعارات جديدة</h6>
                        <p class="text-muted small">سيظهر هنا أي إشعارات جديدة تتلقاها</p>
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
