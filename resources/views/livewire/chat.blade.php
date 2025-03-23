<<<<<<< Updated upstream
<<<<<<< Updated upstream
@extends('layouts.master')

@section('title', 'المحادثه')

@section('contact')
    <div class="container mt-5">
        <div class="chat-container shadow" style="max-width: 800px; margin: 0 auto; border: 1px solid #ddd; border-radius: 10px; background-color: #fff;">
            <!-- Header -->
            <div class="d-flex flex-column align-items-center justify-content-center  position-relative mt-1" style="width: 150px; height: 100px;right: 38%; ">
                <img  alt="icon" style="max-width: 150px; max-height: 200px; height:auto" src="{{asset('assets/images/icon.png')}}">
                <h3 class="fw-bold" style="color: var(--primary-custom-color); font-family: 'Tajawal', sans-serif;" >منصة عرطة</h3>
            </div>
            <hr class="">
            <!-- Chat Messages -->
            <div class="chat-messages p-3" style="height: 400px; overflow-y: auto; border-bottom: 1px solid #ddd;" id="chatMessages">
                <div class="d-flex flex-column gap-2">
                    <!-- رسالة واردة -->
                    <div class="bg-light p-3 rounded" style="max-width: 70%; align-self: flex-start;">
                        مرحبا! كيف يمكنني مساعدتك اليوم؟
                    </div>
                    <!-- رسالة مرسلة -->
                    <div class="bg-primary text-white p-3 rounded" style="max-width: 70%; align-self: flex-end;">
                        أريد الاستفسار عن المنتج الذي أعلنت عنه.
                    </div>
                    <!-- رسالة واردة -->
                    <div class="bg-light p-3 rounded" style="max-width: 70%; align-self: flex-start;">
                        بالطبع، المنتج متوفر وسعره 500 ريال.
                    </div>
                </div>
            </div>

            <!-- Chat Input -->
            <div class="chat-input p-3" style="background-color: #f8f9fa; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                <form id="chatForm" class="d-flex w-100 gap-2">
                    <input type="text" id="messageInput" class="form-control" placeholder="اكتب رسالتك...">
                    <input type="file" id="imageInput" class="form-control" accept="image/*" style="display: none;">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('imageInput').click()">📷</button>
                    <button type="submit" class="btn btn-primary">إرسال</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript لإدارة المحادثة -->
    <script>
        document.getElementById('chatForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const messageInput = document.getElementById('messageInput');
            const imageInput = document.getElementById('imageInput');
            const chatMessages = document.getElementById('chatMessages');

            if (messageInput.value.trim() !== '') {
                // إضافة رسالة نصية
                const messageDiv = document.createElement('div');
                messageDiv.className = 'bg-light text-black p-3 my-2 rounded';
                messageDiv.style.maxWidth = '45%';
                messageDiv.style.alignSelf = 'flex-end';
                messageDiv.textContent = messageInput.value;
                chatMessages.appendChild(messageDiv);
                messageInput.value = '';
            }

            if (imageInput.files.length > 0) {
                // إضافة صورة
                const imageFile = imageInput.files[0];
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100%';
                    img.style.height = 'auto';
                    img.style.borderRadius = '10px';
                    const imageDiv = document.createElement('div');
                    imageDiv.className = 'bg-primary p-3 my-2  rounded';
                    imageDiv.style.maxWidth = '70%';
                    imageDiv.style.alignSelf = 'flex-end';
                    imageDiv.appendChild(img);
                    chatMessages.appendChild(imageDiv);
                };
                reader.readAsDataURL(imageFile);
                imageInput.value = '';
            }

            // التمرير لأسفل لعرض الرسالة الجديدة
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });
    </script>
@endsection
=======
=======
>>>>>>> Stashed changes
<div>
    <div class="chat-container">
        <div class="messages border p-3" style="height: 300px; overflow-y: scroll;">
            @foreach ($messages as $msg)
                <div class="message mb-2 {{ $msg['sender_id'] == auth()->id() ? 'text-end' : 'text-start' }}">
                <span class="badge {{ $msg['sender_id'] == auth()->id() ? 'bg-primary' : 'bg-secondary' }}">
                    {{ $msg['message'] }}
                </span>
                </div>
            @endforeach
        </div>

        <form wire:submit.prevent="sendMessage" class="mt-3">
            <div class="input-group">
                <input type="text" wire:model="message" class="form-control" placeholder="اكتب رسالتك هنا...">
                <button class="btn btn-primary" type="submit">إرسال</button>
            </div>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </form>
    </div>

</div>
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
