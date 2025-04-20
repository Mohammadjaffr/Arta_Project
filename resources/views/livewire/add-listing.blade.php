<div class="listing-form-container">
    @if(session('success') || session('error'))
        <div class="message-center" style="position: fixed;right: 40%;transform: translate(-50%, -50%);z-index: 9999;padding: 20px;border-radius: 8px;text-align: center;animation: fadeInOut 4s forwards;
        {{ session('success') ? 'background: #4CAF50; color: white;' : 'background: #F44336; color: white;' }}">
            {{ session('success') ?? session('error') }}
        </div>
    @endif
    <style>
        @keyframes fadeInOut {
            0% { opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; visibility: hidden; }
        }
    </style>
    <form wire:submit="createListing" method="post" enctype="multipart/form-data" class="listing-form">
        @csrf

        <!-- Categories Section -->
        <div class="form-section">
            <div class="form-group">
                <label class="form-label">القسم الرئيسي</label>
                <select wire:model.live="category_parent_id" name="category_parent_id" class="form-control">
                    <option value="">اختر القسم الرئيسي</option>
                    @foreach($parent_category as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_parent_id') <span class="validation-error">{{ $message }}</span> @enderror
            </div>

            @if($children_categories)
                <div class="form-group">
                    <label class="form-label">القسم الفرعي</label>
                    <select wire:model.live="category_child_id" name="category_child_id" class="form-control">
                        <option value="">اختر القسم الفرعي</option>
                        @foreach($children_categories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{$subcategory->name}}</option>
                        @endforeach
                    </select>
                    @error('category_child_id') <span class="validation-error">{{ $message }}</span> @enderror
                </div>
            @endif
        </div>

        <!-- Location Section -->
        <div class="form-section">
            <div class="form-group">
                <label class="form-label">المحافظة</label>
                <select wire:model.live="region_parent_id" name="region_parent_id" class="form-control">
                    <option value="">اختر المحافظة</option>
                    @foreach($parent_regions as $region)
                        <option value="{{$region->id}}">{{$region->name}}</option>
                    @endforeach
                </select>
                @error('region_parent_id') <span class="validation-error">{{ $message }}</span> @enderror
            </div>

            @if($children_regions)
                <div class="form-group">
                    <label class="form-label">المنطقة/المديرية</label>
                    <select wire:model.live="region_child_id" name="region_child_id" class="form-control">
                        <option value="">اختر المنطقة</option>
                        @foreach($children_regions as $subregion)
                            <option value="{{ $subregion->id }}">{{$subregion->name}}</option>
                        @endforeach
                    </select>
                    @error('region_child_id') <span class="validation-error">{{ $message }}</span> @enderror
                </div>
            @endif
        </div>

        <!-- Listing Details Section -->
        <div class="form-section">
            <div class="form-group">
                <label class="form-label">عملة السعر</label>
                <select wire:model="currency_id" name="currency_id" class="form-control">
                    <option value="">اختر العملة</option>
                    @foreach($currencies as $currency)
                        <option value="{{$currency->id}}">{{$currency->name}}</option>
                    @endforeach
                </select>
                @error('currency_id') <span class="validation-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">عنوان الإعلان</label>
                <input wire:model="title" name="title" class="form-control" type="text" placeholder="أدخل عنوان واضح للإعلان">
                @error('title') <span class="validation-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">تفاصيل الإعلان</label>
                <textarea wire:model="description" name="description" class="form-control" rows="4" placeholder="صف المنتج/الخدمة المقدمة بالتفصيل"></textarea>
                @error('description') <span class="validation-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">السعر</label>
                <input wire:model="price" name="price" class="form-control" type="number" placeholder="أدخل السعر">
                @error('price') <span class="validation-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">حالة المنتج</label>
                <div class="radio-options">
                    <div class="radio-option">
                        <input class="radio-input" type="radio" name="status" value="جديد" wire:model="status" id="status-new">
                        <label class="radio-label" for="status-new">جديد</label>
                    </div>
                    <div class="radio-option">
                        <input class="radio-input" type="radio" name="status" value="مستعمل" wire:model="status" id="status-used">
                        <label class="radio-label" for="status-used">مستعمل</label>
                    </div>
                    <div class="radio-option">
                        <input class="radio-input" type="radio" name="status" value="شبه جديد" wire:model="status" id="status-like-new">
                        <label class="radio-label" for="status-like-new">شبه جديد</label>
                    </div>
                </div>
                @error('status') <span class="validation-error">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Image Gallery Section -->
        <div class="image-gallery-section">
            <div class="gallery-container">
                <div class="gallery-header">
                    <h6 class="gallery-title">معرض الصور</h6>
                    <div class="main-image-upload" onclick="document.getElementById('primary-image-upload').click()">
                        @if($primary_image)
                            <img src="{{ $primary_image->temporaryUrl() }}" alt="الصورة الرئيسية">
                        @else
                            <div class="upload-placeholder">
                                <img src="{{ asset('assets/images/add-photo.png') }}" alt="إضافة صورة رئيسية">
                                <span class="upload-hint">الصورة الرئيسية</span>
                            </div>
                        @endif
                        <input wire:model="primary_image" name="primary_image" type="file" id="primary-image-upload" accept="image/*" style="display: none;">
                    </div>
                    @error('primary_image') <span class="validation-error">{{ $message }}</span> @enderror
                </div>

                <div class="additional-images-grid">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="image-upload-box">
                            @if(isset($images[$i]) && $images[$i])
                                <img src="{{ $images[$i]->temporaryUrl() }}" alt="صورة إضافية {{ $i+1 }}">
                            @else
                                <div class="empty-image-box" onclick="document.getElementById('image-upload-{{ $i }}').click()">
                                    @if ($i === 0)
                                        <img style="width: 50%;height: 50%;" src="{{ asset('assets/images/add-photo.png') }}" alt="إضافة صورة">
                                    @endif
                                </div>
                            @endif
                            <input wire:model="images.{{ $i }}" type="file" accept="image/*" name="images[]" id="image-upload-{{ $i }}" style="display: none;">
                        </div>
                    @endfor
                </div>
                @error('images.*') <span class="validation-error">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <button type="submit" class="submit-button" wire:loading.attr="disabled" wire:target="createListing">
                <span wire:loading.remove wire:target="createListing">
                    <i class="fas fa-paper-plane"></i> نشر الإعلان
                </span>
                <span wire:loading wire:target="createListing">
                    <i class="fas fa-spinner fa-spin"></i> جاري النشر...
                </span>
            </button>


        </div>
    </form>
    <style>
        /* Base Styles */
        .listing-form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Form Sections */
        .form-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 5px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-label {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid #62A1BE;
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 16px;
            width: 100%;
            background-color: #fff;
        }

        /* Validation & Error Messages */
        .validation-error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        /* Radio Options */
        .radio-options {
            display: flex;
            gap: 15px;
        }

        .radio-option {
            display: flex;
            align-items: center;
        }

        .radio-input {
            margin-left: 8px;
        }

        .radio-label {
            font-size: 16px;
        }

        /* Image Gallery */
        .image-gallery-section {
            margin: 25px 0;
        }

        .gallery-container {
            background-color: rgba(4, 105, 152, 0.79);
            border-radius: 16px;
            padding: 15px;
        }

        .gallery-header {
            text-align: right;
            margin-bottom: 15px;
        }

        .gallery-title {
            font-size: 16px;
            color: #fff;
            margin-bottom: 10px;
        }

        .main-image-upload {
            width: 120px;
            height: 100px;
            background-color: #C3C3C3;
            border: 1px solid #000;
            border-radius: 8px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .main-image-upload img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .upload-placeholder img {
            width: 40px;
            height: 40px;
        }

        .upload-hint {
            font-size: 12px;
            color: #333;
            margin-top: 5px;
        }

        .additional-images-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 15px;
        }

        .image-upload-box {
            width: 120px;
            height: 100px;
            position: relative;
        }

        .image-upload-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;

        }

        .empty-image-box {
            width: 100%;
            height: 100%;
            background-color: #C3C3C3;
            border-radius: 8px;
            border: 1px solid #000;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        /* Form Actions */
        .form-actions {
            text-align: center;
            margin-top: 25px;
        }

        .submit-button {
            background-color: #01496B;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .submit-button:hover {
            background-color: #013953;
        }

        /* Success Message */
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px 15px;
            border-radius: 4px;
            margin-top: 15px;
            font-size: 16px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .radio-options {
                flex-direction: column;
                gap: 10px;
            }

            .submit-button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</div>

