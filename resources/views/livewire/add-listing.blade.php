<div>
    <form wire:submit="createListing"  method="post">
        @csrf
        {{--  show parent categoties --}}
        <div class="mb-3">
            <label class="form-label py-3" style="font-size: 30px">اختر القسم الرئيسي</label>
            <select wire:model.live="category_parent_id" name="category_parent_id" class=" form-select border-2 text-end" style="border-color: #62A1BE;font-size: 20px">
                <option value="{{null}}">اختر الفئه</option>
                @foreach($parent_category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            @error('category_parent_id') <span class="alert alert-danger form-control">{{ $message }}</span> @enderror
        </div>
            {{-- end show parent categoties --}}

            {{-- start show children categoties --}}
            @if($children_categories)
                <div class="mb-3">
                    <label class="form-label py-3" style="font-size: 30px">اختر القسم الفرعي</label>
                    <select wire:model.live="category_child_id" name="category_child_id" class="form-select border-2 text-end" style="border-color: #62A1BE;font-size: 20px">
                        <option >اختر الفئه الفرعية</option>
                        @foreach( $children_categories as  $child)
                            <option value="{{ $child->id }}">{{$child->name }}</option>
                        @endforeach
                    </select>
                    @error('category_child_id') <span class="alert alert-danger form-control">{{ $message }}</span> @enderror

                </div>
            @endif
            {{-- end show parent categoties --}}

            {{-- start show parent regions --}}
        <div class="mb-3">
            <label class="form-label py-3" style="font-size: 30px">المحافظات</label>
            <select wire:model.live="region_parent_id" name="region_parent_id" class="form-select border-2 text-end" style="border-color: #62A1BE;font-size: 20px">
                <option value="{{null}}">اختر المحافظه</option>
                @foreach($parent_regions as $rag)
                    <option value="{{$rag->id}}">{{$rag->name}}</option>
                @endforeach
            </select>
            @error('region_parent_id') <span class="alert alert-danger form-control">{{ $message }}</span> @enderror

        </div>
            {{-- end show parent regions --}}

            {{-- start show children regions --}}
            @if($children_regions)
                <div class="mb-3">
                    <label class="form-label py-3" style="font-size: 30px">اختر المديرية</label>
                    <select wire:model.live="region_child_id" name="region_child_id" class="form-select border-2 text-end" style="border-color: #62A1BE;font-size: 20px">
                        <option value="{{null}}">اختر المديرية</option>
                        @foreach( $children_regions as $child)
                            <option value="{{ $child->id }}">{{$child->name }}</option>
                        @endforeach
                    </select>
                    @error('region_child_id') <span class="alert alert-danger form-control">{{ $message }}</span> @enderror

                </div>
            @endif
            {{-- end show children regions --}}

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
        @error('currency_id') <span class="alert alert-danger form-control " >{{ $message }}</span> @enderror

        <!-- اسم الإعلان -->
        <div class="mb-3">
            <h6 class="form-label py-3"style="font-size: 25px">اسم الإعلان</h6>
            <input wire:model="title" name="title" class="form-control border-2" type="text" style="border-color: #62A1BE;font-size: 20px">
        </div>
            @error('title') <span class="alert alert-danger form-control">{{ $message }}</span> @enderror


            <!-- تفاصيل الإعلان -->
        <div class="mb-3">
            <h6 class="form-label py-3"style="font-size: 25px">تفاصيل الإعلان</h6>
            <textarea wire:model="description" name="description" class="form-control border-2" style="border-color: #62A1BE;font-size: 20px" rows="4"></textarea>
        </div>
            @error('description') <span class="alert alert-danger form-control">{{ $message }}</span> @enderror

        <!-- سعر الإعلان -->
        <div class="mb-3">
            <h6 class="form-label py-3"style="font-size: 25px">سعر الإعلان</h6>
            <input wire:model="price" name="price" class="form-control border-2" type="number" style="border-color: #62A1BE;font-size: 20px">
        </div>
            @error('price') <span class="alert alert-danger form-control">{{ $message }}</span> @enderror

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

        <div class="d-flex justify-content-center my-4">
            <div class="col-12 col-md-8 rounded-5 p-3" style="background-color: #046998C9;width: 100%;height: 100%;">
                <div class="text-end">
                    <h6 style="font-size: large;">رفع الصورة</h6>

                    <!-- مربع رفع الصورة -->
                    <div class="border border-dark rounded-3"
                         style="width: 100px; height: 80px; position: relative; background-color: #C3C3C3; cursor: pointer;"
                         onclick="document.getElementById('primary-image-upload').click()">

                        <!-- عرض الصورة داخل المربع إذا تم رفعها -->
                        @if($primary_image)
                            <img src="{{ $primary_image->temporaryUrl() }}"
                                 alt="الصورة الأساسية"
                                 class="rounded-3"
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <!-- نص أو أيقونة عندما لا توجد صورة -->
                            <div class="text-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                <img src="{{ asset('assets/images/add-photo.png') }}"
                                     alt="إضافة صورة"
                                     style="width: 50px; height: 50px; margin-top: 10%;">
                            </div>
                        @endif

                        <!-- حقل رفع الملف المخفي -->
                        <input wire:model="primary_image" type="file" id="primary-image-upload" accept="image/*" style="display: none;">
                    </div>
                </div>

                <div class="d-flex flex-wrap justify-content-evenly mt-3">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="text-center" style="width: 120px; height: 100px;">
                            <!-- عرض الصورة المرفوعة -->
                            @if(isset($images[$i]) && $images[$i])
                                <img class="border rounded-3 image-preview"
                                     style="width: 120px; height: 100px; object-fit: cover;"
                                     src="{{ $images[$i]->temporaryUrl() }}"
                                     alt="صورة مرفوعة">
                            @else
                                <!-- مربع فارغ مع أيقونة إضافة الصور في المربع الأول فقط -->
                                <div class="border rounded-3"
                                     style="width: 120px; height: 100px; background-color: #C3C3C3; cursor: pointer;"
                                     onclick="document.getElementById('image-upload-{{ $i }}').click()">
                                    @if ($i === 0)
                                        <!-- أيقونة إضافة الصور (تظهر فقط في المربع الأول) -->
                                        <img src="{{ asset('assets/images/add-photo.png') }}"
                                             alt="إضافة صورة"
                                             style="width: 70px; height: 70px; margin-top: 10%;">
                                    @endif
                                </div>
                            @endif

                            <!-- حقل رفع الملف -->
                            <input wire:model="images.{{ $i }}"
                                   type="file"
                                   accept="image/*"
                                   id="image-upload-{{ $i }}"
                                   style="display: none;">
                        </div>
                    @endfor
                </div>
            </div>

        </div>



        <!-- زر الحفظ والنشر -->
        <div class="row justify-content-center my-5">
            <div class="col-12 text-center">
                <button type="submit"  class="btn w-50 rounded-4 py-3 text-white" style="background-color: #01496B;font-size: 25px"  wire:loading.attr="disabled" wire:target="createListing">
                    <span wire:loading.remove wire:target="createListing">نشر الإعلان</span>
                    <span wire:loading wire:target="createListing">جاري النشر...</span>
                </button>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success mt-2">{{ session('message') }}</div>
            @endif
        </div>
    </form>
</div>
