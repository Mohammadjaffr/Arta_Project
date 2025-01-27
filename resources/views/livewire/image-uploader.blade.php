<div>
    <div class="d-flex justify-content-center my-4">
        <div class="col-12 col-md-8 rounded-5 p-3" style="background-color: #046998C9;width: 100%;height: 100%;">
            <div class="text-end">
                <h6 style="font-size: large">رفع الصورة</h6>
                <div class="border border-dark rounded-3" style="width: 100px; height: 80px; position: relative;background-color: #C3C3C3;">
                    <!-- الصورة الأساسية إذا كانت موجودة -->
                    @if(isset($mainImage))
                        <img id="mainImagePreview" class="" style="width: 100px; height: 80px; cursor: pointer;"
                             src="{{ $mainImage->temporaryUrl() }}" alt="صورة أساسية"
                             onclick="document.getElementById('fileInput').click();">
                    @else
                        <img id="mainImagePreview" class="" style="width: 50px; height: 50px; cursor: pointer;margin: 10% 22%;"
                             src="{{ asset('assets/images/add-photo.png') }}" alt="صورة افتراضية"
                             onclick="document.getElementById('fileInput').click();">
                    @endif

                    <!-- حقل رفع الملف المخفي -->
                    <input id="fileInput" wire:model="mainImage" type="file" accept="image/*" style="display: none;"
                           onchange="previewImage(event)">

                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-evenly mt-3">
                <!-- مربعات رفع الصور -->
                @for ($i = 0; $i < 4; $i++)
                    <div class="text-center" style="width: 120px; height: 100px;">
                        <!-- عرض الصورة المرفوعة -->
                        @if (isset($images[$i]) && $images[$i])
                            <img class="border rounded-3 image-preview" style="width: 120px; height: 100px; object-fit: cover;" src="{{ $images[$i]->temporaryUrl() }}" alt="صورة مرفوعة">
                        @else
                            <!-- مربع فارغ مع أيقونة إضافة الصور في المربع الأول فقط -->
                            <div class="border rounded-3" style="width: 120px; height: 100px; background-color: #C3C3C3; cursor: pointer;" onclick="document.getElementById('image-input-{{ $i }}').click();">
                                @if ($i === 0)
                                    <!-- أيقونة إضافة الصور (تظهر فقط في المربع الأول) -->
                                    <img  src="{{ asset('assets/images/add-photo.png') }}" alt="إضافة صورة" style="width: 70px; height: 70px;margin-top: 10%; ">
                                @endif
                            </div>
                        @endif

                        <!-- حقل رفع الملف -->
                        <input wire:model="images.{{ $i }}" type="file" accept="image/*" style="display: none;" id="image-input-{{ $i }}">
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const file = input.files[0];
        const preview = document.getElementById('mainImagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    // إضافة أحداث لمربعات رفع الصور
    document.querySelectorAll('.image-preview').forEach((preview, index) => {
        preview.addEventListener('click', function () {
            const fileInput = this.nextElementSibling; // الحصول على حقل رفع الملف المجاور
            fileInput.click(); // فتح حقل رفع الملف
        });
    });
</script>
