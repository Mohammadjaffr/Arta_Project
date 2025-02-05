<div>
    <form wire:submit.prevent="createListing" method="post">
        <!-- اختر القسم الرئيسي -->
        <div class="mb-3">
            <label class="form-label py-3" style="font-size: 30px">اختر القسم الرئيسي</label>
            <select wire:model="category_id" name="category_id" class="form-select border-2 text-end" style="border-color: #62A1BE;font-size: 20px">
                <option value="العقارات">اختر الفئه</option>
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label py-3" style="font-size: 30px">المنطقه</label>
            <select wire:model="region_id" name="region_id" class="form-select border-2 text-end" style="border-color: #62A1BE;font-size: 20px">
                <option value="العقارات">اختر المنطقه</option>
                @foreach($Regions as $rag)
                    <option value="{{$rag->id}}">{{$rag->name}}</option>
                @endforeach
            </select>
        </div>

        <div></div>

        <!-- نوع العمله -->
        <div class="mb-3">
            <label class="form-label py-3"style="font-size: 25px">نوع العمله</label>
            <select wire:model="currency_id" name="currency_id" class="form-select border-2 text-end" style="border-color: #62A1BE;font-size: 20px">
                <option>اختر نوع العمله</option>
                @foreach($currencies as $currency)
                    <option value="{{$currency->id}}">{{$currency->name}}</option>
                @endforeach
            </select>
        </div>

        <!-- اسم الإعلان -->
        <div class="mb-3">
            <h6 class="form-label py-3"style="font-size: 25px">اسم الإعلان</h6>
            <input wire:model="title" name="title" class="form-control border-2" type="text" style="border-color: #62A1BE;font-size: 20px">
        </div>

        <!-- تفاصيل الإعلان -->
        <div class="mb-3">
            <h6 class="form-label py-3"style="font-size: 25px">تفاصيل الإعلان</h6>
            <textarea wire:model="description" name="description" class="form-control border-2" style="border-color: #62A1BE;font-size: 20px" rows="4"></textarea>
        </div>

        <!-- سعر الإعلان -->
        <div class="mb-3">
            <h6 class="form-label py-3"style="font-size: 25px">سعر الإعلان</h6>
            <input wire:model="price" name="price" class="form-control border-2" type="number" style="border-color: #62A1BE;font-size: 20px">
        </div>

        <!-- حالة المنتج -->
        <div class="mb-3">
            <h6 class="form-label py-3"style="font-size: 25px">حالة المنتج</h6>
            <div class="d-flex justify-content-start">
                <div class="form-check px-3 ">
                    <input class="form-check-input" style="border-color: #62A1BE;font-size: 20px" type="radio" name="status" value="جديد" wire:model="status">
                    <label class="form-check-label" style="font-size: 20px">جديد</label>
                </div>
                <div class="form-check px-3 mx-2">
                    <input class="form-check-input" style="border-color: #62A1BE;font-size: 20px" type="radio" name="status" value="مستعمل" wire:model="status">
                    <label class="form-check-label" style="font-size: 20px">مستعمل</label>
                </div>
                <div class="form-check px-3">
                    <input class="form-check-input" style="border-color: #62A1BE;font-size: 20px" type="radio" name="status" value="شبه جديد" wire:model="status">
                    <label class="form-check-label" style="font-size: 20px">شبه جديد</label>
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
                <button type="submit"  class="btn w-50 rounded-4 py-3 text-white" style="background-color: #01496B;font-size: 25px">حفظ ونشر الإعلان</button>
            </div>
        </div>
    </form>
</div>
