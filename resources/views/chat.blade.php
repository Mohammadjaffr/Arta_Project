@extends('layouts.master')
@section('title' ,'الدردشه')
@section('contact')

<div class="container mt-4">
    <div class="border rounded-3 shadow-sm">
        <div class="border rounded  text-white d-flex justify-content-between align-items-center py-2" style="background-color: #046998;">
            <div  class="badge mx-3  {{ Auth::user()->isOnline() ? 'bg-success' : 'bg-secondary' }}">
                {{ Auth::user()->isOnline() ? 'متصل الآن' : 'غير متصل' }}
            </div>
            <h5 class="mx-3 ">
                <i class="bi bi-chat-left-text me-2"></i>
                دردشة مع {{ $receiver->name }}
            </h5>

        </div>

        <div class=" p-0">
            <!-- منطقة الرسائل -->
            <div id="chat-box" class="p-3" style="height: 400px; overflow-y: auto; background-color: #f8f9fa;">
                @if(is_iterable($messages) && count($messages) > 0)
                    @foreach ($messages as $message)
                        <div class="message-wrapper mb-3 d-flex {{ $message->sender_id == auth()->id() ? 'justify-content-end' : 'justify-content-start' }}">
                            <div class="{{ $message->sender_id == auth()->id() ? ' text-white' : 'bg-light text-dark' }}  rounded-4 p-3 shadow-sm" style="max-width: 75%;background-color: #046998">
                                <div class="message-content">
                                    {{ $message->message }}
                                </div>
                                <div class="message-time text-end mt-1" style="font-size: 0.75rem; color: {{ $message->sender_id == auth()->id() ? 'rgba(255,255,255,0.7)' : '#6c757d' }};">
                                    {{ $message->created_at->format('h:i A') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-center">
                            <i class="bi bi-chat-square-text display-5 text-muted mb-3"></i>
                            <p class="text-muted">لا توجد رسائل لعرضها</p>
                            <p class="text-muted small">ابدأ المحادثة بإرسال رسالة...</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- مؤشر الكتابة -->
            <div id="typing-indicator" class="px-3 py-2 bg-light" style="display: none;">
                <div class="d-flex align-items-center">
                    <div class="typing-dots me-2">
                        <span class="dot" style="animation-delay: 0s;"></span>
                        <span class="dot" style="animation-delay: 0.2s;"></span>
                        <span class="dot" style="animation-delay: 0.4s;"></span>
                    </div>
                    <span class="text-muted small">{{ $receiver->name }} يكتب...</span>
                </div>
            </div>

            <!-- نموذج الإرسال -->
            <div class="p-3 border-top">
                <form id="message-form">
                    @csrf
                    <div class="input-group">
                        <button type="submit" class="btn btn-light rounded-end-3" style="background-color: #046998">
                            <i class="bi bi-send-fill"></i> إرسال
                        </button>
                        <input type="text" id="message-input" class="form-control rounded-start-3" placeholder="اكتب رسالتك هنا..." autocomplete="off">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* أنيميشن نقاط الكتابة */
    .typing-dots {
        display: inline-flex;
        align-items: center;
        height: 17px;
    }

    .typing-dots .dot {
        width: 6px;
        height: 6px;
        margin: 0 2px;
        background-color: #6c757d;
        border-radius: 50%;
        display: inline-block;
        animation: bounce 1.4s infinite ease-in-out both;
    }

    @keyframes bounce {
        0%, 80%, 100% { transform: scale(0); }
        40% { transform: scale(1); }
    }

    /* تخصيص شريط التمرير */
    #chat-box::-webkit-scrollbar {
        width: 6px;
    }

    #chat-box::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    #chat-box::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }

    #chat-box::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }

    /* تأثيرات الرسائل */
    .message-wrapper {
        transition: all 0.3s ease;
    }

    .message-wrapper:hover {
        transform: translateX(2px);
    }
</style>



<script>
    document.addEventListener('DOMContentLoaded', function (){

        let receiverId = {{ $receiver->id }};
        let senderId = {{ auth()->id() }};
        let chatBox = document.getElementById('chat-box');
        let messageForm = document.getElementById('message-form');
        let messageInput = document.getElementById('message-input');
        let typingIndicator = document.getElementById('typing-indicator');

        // Set user online
        fetch('/online',
            {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
                }
            }
        );


        // subscribe to chat channel
        window.Echo.private('chat.' + senderId)
            .listen('MessageSent', (e) => {
                // show the message
                const messageDiv = document.createElement('div');
                messageDiv.className = 'mb-2 text-end';
                messageDiv.innerHTML = `<span class="badge bg-secondary">${e.message.message}</span>`;
                chatBox.appendChild(messageDiv);
                chatBox.scrollTop = chatBox.scrollHeight;
            });


        // subscribe to typing channel
        window.Echo.private('typing.' + receiverId)
            .listen('UserTyping', (e) => {
                if(e.typerId === receiverId){
                    typingIndicator.style.display = 'block';
                    setTimeout(() => typingIndicator.style.display = 'none', 3000);
                }
            });


        messageForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const message = messageInput.value;
            if (message) {
                fetch(`/chat/${receiverId}/send`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message })
                });
                const messageDiv = document.createElement('div');
                messageDiv.className = 'mb-2 text-start';
                messageDiv.innerHTML = `<span class="badge " style="background-color: #046998">${message}</span>`;
                chatBox.appendChild(messageDiv);
                chatBox.scrollTop = chatBox.scrollHeight;
                messageInput.value = '';
            }
        });

        let typingTimeOut;
        messageInput.addEventListener('input', function () {
            clearTimeout(typingTimeOut);
            fetch(`/chat/typing`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
            typingTimeOut = setTimeout(() => {typingIndicator.style.display = 'none'}, 1000);
        });

        // Set user offline on window close
        window.addEventListener('beforeunload', function () {
            fetch('/offline', { method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } });
        });

    });
</script>
@endsection
