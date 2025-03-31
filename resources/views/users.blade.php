@extends('layouts.master')
@section('title' ,'لصفحة الرئيسية')
@section('contact')

<div class="container mt-5">
    <h1>Chat Users</h1>
    <ul class="list-group mt-3">
        @foreach ($users as $user)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('chat', $user->id) }}">{{ $user->name }}</a>
                <span class="badge {{ $user->isOnline() ? 'bg-success' : 'bg-secondary' }}">
                        {{ $user->isOnline() ? 'Online' : 'Offline' }}
                    {{Auth::user()->unreadNotifications->count()}}
                    </span>
            </li>
        @endforeach

            @foreach(Auth::user()->unreadNotifications as $notification)
                <!-- إشعار مع أيقونة - مقروء -->
                <a href="{{ route('notification', ['id' => $notification->data['message_id']]) }}" class="list-group-item list-group-item-action notification-item p-3 border-0">
                    <div class="d-flex align-items-start">
                        <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">
                            <i class="bi bi-heart-fill text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-1">{{$notification->data['user_name']}}</h6>
                                <small class="notification-time text-muted">{{$notification->created_at}}</small>
                            </div>
{{--                            <p class="mb-1">أعجب 12 شخصاً بمنشورك الأخير</p>--}}
                        </div>
                    </div>
                </a>
{{--                <li class="notification-box">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-3 col-3 text-center">--}}
{{--                            <img src="#" class="w-50 rounded-circle">--}}
{{--                        </div>--}}
{{--                        <div class="col-8" >--}}
{{--                            <strong class="text-info">{{$notification->data['user_name']}}</strong></div>--}}
{{--                        <div>--}}
{{--                            <a href="{{ route('chat',$notification->data['user_id'] ,$user->id) }}">--}}
{{--                                {{ $notification->data['message'] }}--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <small class="text-warning">{{$notification->created_at}}</small>--}}
{{--                    </div>--}}
{{--                </li>--}}
            @endforeach

    </ul>
</div>
@endsection
{{--                                    <!-- إشعار مع أيقونة - مقروء -->--}}
{{--                                    <a href="#" class="list-group-item list-group-item-action notification-item p-3 border-0">--}}
{{--                                        <div class="d-flex align-items-start">--}}
{{--                                            <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">--}}
{{--                                                <i class="bi bi-heart-fill text-primary" style="font-size: 1.5rem;"></i>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                    <h6 class="mb-1">إعجابات جديدة</h6>--}}
{{--                                                    <small class="notification-time text-muted">منذ ساعة</small>--}}
{{--                                                </div>--}}
{{--                                                <p class="mb-1">أعجب 12 شخصاً بمنشورك الأخير</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}

{{--                                    <!-- إشعار نظامي -->--}}
{{--                                    <a href="#" class="list-group-item list-group-item-action notification-item p-3 border-0">--}}
{{--                                        <div class="d-flex align-items-start">--}}
{{--                                            <div class="bg-info bg-opacity-10 p-2 rounded-circle me-3">--}}
{{--                                                <i class="bi bi-info-circle-fill text-info" style="font-size: 1.5rem;"></i>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <div class="d-flex justify-content-between align-items-center">--}}
{{--                                                    <h6 class="mb-1">تحديث النظام</h6>--}}
{{--                                                    <small class="notification-time text-muted">منذ يومين</small>--}}
{{--                                                </div>--}}
{{--                                                <p class="mb-1">تم إصدار تحديث جديد للنظام. اضغط لمعرفة المزيد.</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}

<!-- يمكن إضافة المزيد من الإشعارات هنا -->
<!-- سيظهر شريط التمرير تلقائيا عند زيادة المحتوى -->
