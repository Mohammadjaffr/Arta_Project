<div>

<div class="d-flex">
    <button wire:click="share" href="#" class="btn btn-light border rounded-3 p-2 d-flex m-2 justify-content-center" style="background-color: #559FC1">
        <div class="mx-2"><img src="{{ asset('assets/images/share.png') }}" style="width: 30px; height: 30px;"></div>
        <label>مشاركة الاعلان</label>
    </button>
    <button class="btn btn-light border rounded-3 p-2 d-flex m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color: #559FC1">
        <div class="mx-2"><img src="{{ asset('assets/images/Dislike.png') }}" style="width: 30px; height: 30px;"></div>
        التبليغ عن الاعلان
    </button>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">التبليغ عن الاعلان</h1>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" wire:model="content"  placeholder="اكتب الشكوه هنا ..."></textarea>
                </div>
                @error('content')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغا</button>
                    <button wire:click.prevent="send"  type="button" class="btn btn-primary">ارسال</button>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger mt-3">
            {{ session('$error') }}
        </div>
    @endif
    <button
        wire:click="redirectToWhatsApp({{ $listings->id }})"  class="btn btn-light border rounded-3 p-2 d-flex m-2" style="background-color: #559FC1" >
        <div class="mx-2">
            <img src="{{ asset('assets/images/whatsapp.png') }}" style="width: 30px; height: 30px;">
        </div>
        <div >التواصل واتساب</div>
    </button>
    <button onclick="toggleWhatsAppNumber(this)" class="btn btn-light border rounded-3 p-2 d-flex m-2 " style="background-color: #559FC1">
        <div class="mx-2">
            <i class="fa-solid fa-phone fa-2x"></i>       </div>
        <div id="whatsappNumber" style="display: none;">{{ $listings->user->whatsapp_number }}</div>
        <div id="partialNumber">{{ substr($listings->user->whatsapp_number, 0, 3) . 'xxxxxx' }}</div>

    </button>

    <script>
        function toggleWhatsAppNumber(button) {
            const whatsappNumber = button.querySelector('#whatsappNumber');
            const partialNumber = button.querySelector('#partialNumber');
            const placeholder = button.querySelector('#placeholder');

            if (whatsappNumber.style.display === 'none') {
                // إذا كان الرقم مخفيًا، قم بعرضه
                whatsappNumber.style.display = 'block'; // عرض الرقم الكامل
                partialNumber.style.display = 'none'; // إخفاء الرقم الجزئي
                placeholder.style.display = 'none'; // إخفاء النص البديل
            } else {
                // إذا كان الرقم مرئيًا، قم بإخفائه
                whatsappNumber.style.display = 'none'; // إخفاء الرقم الكامل
                partialNumber.style.display = 'block'; // عرض الرقم الجزئي
                placeholder.style.display = 'block'; // عرض النص البديل
            }
        }
    </script>
</div>

    @if ($showFallbackOptions)
        <style>
            .social-share-button {
                text-decoration: none;
                display: flex;
                align-items: center;
                gap: 5px;
                padding: 8px 12px;
                border-radius: 5px;
                transition: background-color 0.3s, color 0.3s;
            }

            .social-share-button:hover {
                color: white !important;
            }

            .whatsapp-button {
                color: #25D366;
                border: 1px solid #25D366;
            }

            .whatsapp-button:hover {
                background-color: #25D366;
            }

            .facebook-button {
                color: #1877F2;
                border: 1px solid #1877F2;
            }

            .facebook-button:hover {
                background-color: #1877F2;
            }

            .twitter-button {
                color: #1DA1F2;
                border: 1px solid #1DA1F2;
            }

            .twitter-button:hover {
                background-color: #1DA1F2;
            }
            .instagram-button {
                color: #E1306C;
                border: 1px solid #E1306C;
            }

            .instagram-button:hover {
                background-color: #E1306C;
                color: white;
            }
        </style>

        <div style="margin-top: 20px;">
            <p style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">مشاركة عبر:</p>
            <div style="display: flex; gap: 15px;">
                <!-- زر مشاركة واتساب -->
                <a href="https://wa.me/?text={{ urlencode('🚨 إعلان جديد 🚨' . "\n\n" . '🏷️ العنوان: ' . $listingData['title'] . "\n" . '📝 الوصف: ' . $listingData['text'] . "\n" . '💰 السعر: ' . $listingData['price'] . ' ' . $listingData['currency'] . "\n" . '📍 الموقع: ' . $listingData['location'] . "\n" . '🔗 رابط الإعلان: ' . $listingData['url']) }}" target="_blank" class="social-share-button whatsapp-button">
                    <i class="fab fa-whatsapp" style="font-size: 20px;"></i>
                    <span>مشاركة عبر WhatsApp</span>
                </a>

                <!-- زر مشاركة فيسبوك -->
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($listingData['url']) }}" target="_blank" class="social-share-button facebook-button">
                    <i class="fab fa-facebook"></i>
                    <span>مشاركة على فيسبوك</span>
                </a>

                <!-- زر مشاركة تويتر -->
                <a href="https://twitter.com/intent/tweet?text={{ urlencode('🚨 إعلان جديد: ' . $listingData['title'] . ' - ' . $listingData['text'] . ' 🔗 ' . $listingData['url']) }}" target="_blank" class="social-share-button twitter-button">
                    <i class="fab fa-twitter"></i>
                    <span>مشاركة على تويتر</span>
                </a>

                <a href="https://www.instagram.com/intent/tweet?text={{ urlencode($listingData['url']) }}" target="_blank" class="social-share-button instagram-button">
                    <i class="fab fa-instagram"></i>
                    <span>مشاركة على إنستجرام</span>
                </a>

            </div>
        </div>
    @endif


    <!-- JavaScript لتنفيذ Web Share API -->
    <script>
        Livewire.on('trigger-share', (listingData) => {
            if (navigator.share) {
                navigator.share({
                    title: listingData.title,
                    text: listingData.text,
                    url: listingData.url
                })
                    .then(() => console.log('تمت المشاركة بنجاح!'))
                    .catch((error) => console.error('حدث خطأ أثناء المشاركة:', error));
            }
        });
    </script>
    <script>
        window.addEventListener('close-modal', event => {
            document.getElementById('cancelButton').click();
        });
    </script>
</div>
