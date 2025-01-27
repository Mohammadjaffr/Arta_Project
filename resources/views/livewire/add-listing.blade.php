<div>
    <form wire:submit.prevent="createListing">
        <!-- اختر القسم الرئيسي -->
        <div class="mb-3">
            <label class="form-label py-3">اختر القسم الرئيسي</label>
            <select wire:model="category" class="form-select border-2 text-end" style="border-color: #62A1BE">
                <option value="العقارات">العقارات</option>
                <option value="السيارات">السيارات</option>
                <option value="الملابس">الملابس</option>
            </select>
        </div>

        <!-- المدينة -->
        <div class="mb-3">
            <label class="form-label py-3">المدينة</label>
            <select wire:model="city" class="form-select border-2 text-end" style="border-color: #62A1BE">
                <option value="سيئون">سيئون</option>
                <option value="القطن">القطن</option>
                <option value="تريم">تريم</option>
            </select>
        </div>

        <!-- اسم الإعلان -->
        <div class="mb-3">
            <h6 class="form-label py-3">اسم الإعلان</h6>
            <input wire:model="title" class="form-control border-2" type="text" style="border-color: #62A1BE">
        </div>

        <!-- تفاصيل الإعلان -->
        <div class="mb-3">
            <h6 class="form-label py-3">تفاصيل الإعلان</h6>
            <textarea wire:model="description" class="form-control border-2" style="border-color: #62A1BE" rows="4"></textarea>
        </div>

        <!-- سعر الإعلان -->
        <div class="mb-3">
            <h6 class="form-label py-3">سعر الإعلان</h6>
            <input wire:model="price" class="form-control border-2" type="number" style="border-color: #62A1BE">
        </div>

        <!-- حالة المنتج -->
        <div class="mb-3">
            <h6 class="form-label py-3">حالة المنتج</h6>
            <div class="d-flex justify-content-start">
                <div class="form-check px-3">
                    <input class="form-check-input" style="border-color: #62A1BE" type="radio" name="status" value="جديد" wire:model="status">
                    <label class="form-check-label">جديد</label>
                </div>
                <div class="form-check px-3">
                    <input class="form-check-input" style="border-color: #62A1BE" type="radio" name="status" value="مستعمل" wire:model="status">
                    <label class="form-check-label">مستعمل</label>
                </div>
                <div class="form-check px-3">
                    <input class="form-check-input" style="border-color: #62A1BE" type="radio" name="status" value="شبه جديد" wire:model="status">
                    <label class="form-check-label">شبه جديد</label>
                </div>
            </div>

            <!-- عرض الحالة المحددة (اختياري) -->
            <div class="mt-3">
                <strong>الحالة المحددة:</strong> {{ $status ?? 'لم يتم التحديد' }}
            </div>
        </div>

        <!-- مكون تحميل الصور -->
        @livewire('image-uploader')

        <!-- زر الحفظ والنشر -->
        <div class="row justify-content-center my-5">
            <div class="col-12 text-center">
                <button type="submit" class="btn w-25 rounded-4 py-3 text-white" style="background-color: #01496B;">حفظ ونشر الإعلان</button>
            </div>
        </div>
    </form>
</div>
