<div>
    <div class="row justify-content-center my-4">
        <div class="col-12 col-md-8 border border-dark rounded-5 p-3" style="background-color: rgba(1, 73, 107, 0.68);">
            <div class="text-end">
                <h6>رفع الصورة</h6>
                <div>
                    <label class="px-3">حدد الصورة الأساسية</label>
                    <!-- الصورة الأساسية -->
                    <img id="mainImagePreview" class="border border-amber-600 rounded-2" style="width: 70px; height: 70px; cursor: pointer;" src="{{ $mainImage ? $mainImage->temporaryUrl() : asset('assets/images/facebook.svg') }}" alt="صورة أساسية">
                    <!-- حقل رفع الملف المخفي -->
                    <input wire:model="mainImage" type="file" accept="image/*" style="display: none;">
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-evenly mt-3">
                <!-- مربعات رفع الصور -->
                @for ($i = 0; $i < 4; $i++)
                    <div class="text-center">
                        <img class="border rounded-3 image-preview" style="width: 120px; height: 100px; background-color: #C3C3C3; cursor: pointer;" src="{{ isset($images[$i]) ? $images[$i]->temporaryUrl() : asset('assets/images/add-photo.png') }}" alt="إضافة صورة">
                        <input wire:model="images.{{ $i }}" type="file" accept="image/*" style="display: none;">
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>

<script>
    // إضافة حدث النقر للصورة الأساسية
    document.getElementById('mainImagePreview').addEventListener('click', function () {
        this.nextElementSibling.click(); // فتح حقل رفع الملف
    });

    // إضافة أحداث لمربعات رفع الصور
    document.querySelectorAll('.image-preview').forEach((preview, index) => {
        preview.addEventListener('click', function () {
            const fileInput = this.nextElementSibling; // الحصول على حقل رفع الملف المجاور
            fileInput.click(); // فتح حقل رفع الملف
        });
    });
</script>
