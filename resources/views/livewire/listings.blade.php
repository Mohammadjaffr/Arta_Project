<div>
    <!-- فئات الإعلانات -->
    <div class="container mt-2 text-center">
        <div class="row align-items-start">
            <div class="col-12">
                <div class="table-responsive categories-scrollable" style="overflow-x: auto;">
                    <table class="table categories-table">
                        <tr>
                            @foreach($categories as $category)
                                <td>
                                    <div class="card category-card" style="border: none;">
                                        <a wire:click="filterByCategory({{$category->id}})" class="text-decoration-none category-link">
                                            <img style="width: 8rem; height: 4rem;" src="{{$category->image}}" class="card-img-top img-fluid category-image" alt="صورة الفئة {{$category->name}}">
                                            <div class="card-body category-body">
                                                <h5 class="category-name" style="font-size: 0.8rem; color: black">{{$category->name}}</h5>
                                            </div>
                                        </a>
                                    </div>
                                </td>
                            @endforeach
                            <td>
                                <div class="card category-card" style="border: none;">
                                    <a wire:click="list_all_listing" class="text-decoration-none all-categories-link">
                                        <img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/AllCategories.png')}}" class="card-img-top img-fluid all-categories-image" alt="عرض جميع الفئات">
                                        <div class="card-body all-categories-body">
                                            <h5 class="all-categories-text" style="font-size: 1.0rem; color: black">الكل</h5>
                                        </div>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- شريط البحث والتصفية -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4 search-filter-bar" style="direction: rtl;">
        <div class="view-toggle-buttons">
            <button wire:click="set_view_stats('list')" class="btn btn-light list-view-button"><i class="fa-solid fa-list"></i></button>
            <button wire:click="set_view_stats('card')" class="btn btn-light grid-view-button"><i class="fa-solid fa-grip"></i></button>
        </div>
        <div>
            <button wire:click="" class="btn btn-light rounded-circle location-button">
                <img class="mx-1 location-icon" style="width: 20px;" src="{{ asset('assets/images/Map Point.png') }}">
            </button>
        </div>
        <form class="flex-grow-1 position-relative search-form">
            <img src="{{ asset('assets/images/search.svg') }}" alt="أيقونة البحث" class="search-icon" style="position: absolute; left: 5px; top: 50%; transform: translateY(-50%);">
            <input wire:model.live="title" class="form-control rounded-4 ps-2 search-input" type="text" placeholder="ابحث هنا...">
        </form>

        @if($children_categories)
            <select wire:model.live="category_child_id" class="form-select w-auto rounded-4 subcategory-select">
                <option value="{{ null }}" selected>اختر النوع</option>
                @foreach($children_categories as $child)
                    <option value="{{ $child->id }}">{{$child->name }}</option>
                @endforeach
            </select>
        @endif

        <!-- تصفية حسب المنطقة -->
        <select wire:model.live="region_parent_id" class="form-select w-auto rounded-4 region-select">
            <option value="{{ null }}" selected>المحافظة</option>
            @foreach ($Parents as $Parent)
                <option value="{{ $Parent->id }}">{{ $Parent->name }}</option>
            @endforeach
        </select>

        @if ($children)
            <select wire:model.live="region_child_id" class="form-select w-auto rounded-4 subregion-select">
                <option selected value="{{ null }}">الكل</option>
                @foreach ($children as $child)
                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                @endforeach
            </select>
        @endif

        <button wire:click="sortByPrice('asc')" class="btn btn-light border-2 rounded-4 price-sort-button price-lowest">
            أقل سعراً
            <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="سعر منخفض" class="ms-2 sort-icon">
        </button>
        <button wire:click="sortByPrice('desc')" class="btn btn-light border-2 rounded-4 price-sort-button price-highest">
            أعلى سعراً
            <img src="{{ asset('assets/images/arrow-up.svg') }}" alt="سعر مرتفع" class="ms-2 sort-icon">
        </button>
    </div>

    <!-- قائمة الإعلانات -->
    <div class="container-fluid my-5 listings-container" style="direction: rtl; background-color: #F7FBFA;">
        @if($view_stats == 'list')
            <!-- عرض بطريقة القائمة -->
            @foreach($listings as $listing)
                <div class="row listing-item px-0 my-4 shadow hover-shadow-lg transition-all" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="col-12 col-lg-2 text-center my-2 d-flex align-items-center justify-content-center position-relative listing-image-container">
                        <img class="img-fluid rounded-3 listing-main-image" src="{{ $listing->primary_image }}" alt="صورة الإعلان {{ $listing->title }}" style="max-height: 150px; min-height: 150px; object-fit: cover;">
                        <div class="position-absolute top-0 bg-dark bg-opacity-75 text-white p-2 rounded-bottom-right rounded-3 listing-status-badge" style="left: 12px;">
                            {{ $listing->status }}
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 my-2 listing-details">
                        <h4 class="text-xxl-end text-xl-end text-lg-end text-center fw-bold listing-title">{{ $listing->title }}</h4>
                        <table class="table table-responsive listing-meta-table">
                            <tr>
                                <td class="listing-region">
                                    <img class="mx-1 region-icon" style="width: 20px;" src="{{ asset('assets/images/Map Point.png') }}">
                                    <span>{{ $listing->region->name }}</span>
                                </td>
                                <td class="listing-date">
                                    <img class="mx-1 date-icon" style="width: 20px;" src="{{ asset('assets/images/time.png') }}">
                                    <span>{{ $listing->created_at->diffForHumans() }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="listing-owner">
                                    <img class="mx-1 user-icon" style="width: 20px;" src="{{ asset('assets/images/User Rounded.png') }}">
                                    <span>{{ $listing->user->name }}</span>
                                </td>
                                <td class="listing-price">
                                    <img class="mx-1 price-icon" style="width: 20px;" src="{{ asset('assets/images/Dollar Minimalistic.png') }}">
                                    <span>{{ $listing->price }} ({{ $listing->currency->abbr }})</span>
                                </td>
                                <td class="listing-category">
                                    <span class="badge rounded-pill text-dark category-badge" style="background-color: var(--warning-custom-color); font-size: 0.875rem; padding: 0.25rem 0.5rem;">{{ $listing->category->name }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center mb-2 mb-lg-0 listing-actions">
                        <a href="{{ url('listing/' . $listing->id) }}" class="btn btn-primary rounded-4 d-flex justify-content-center align-items-center view-details-button" style="width: 100%; height: 45px; background-color: #046998;">
                            <h5 class="text-align-center m-0">عرض التفاصيل</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <!-- عرض بطريقة البطاقات -->
            <div class="row row-cols-1 row-cols-md-3 g-4 grid-view">
                @foreach($listings as $listing)
                    <div class="my-2">
                        <div class="border rounded-2 shadow-sm hover-shadow-lg transition-all listing-card" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="position-relative listing-image-wrapper">
                                <img src="{{ $listing->primary_image }}" class="img-fluid rounded-3 mb-2 listing-image" style="object-fit: cover; height: 200px; width: 100%;" alt="صورة الإعلان {{ $listing->title }}">
                                <div class="position-absolute top-0 start-0 bg-dark bg-opacity-75 text-white p-2 rounded-bottom-right rounded-3 listing-status">
                                    {{ $listing->status }}
                                </div>
                            </div>

                            <div class="mx-3 mt-3 listing-content">
                                <h5 class="fw-bold listing-title">{{ $listing->title }}</h5>
                            </div>

                            <table class="table table-responsive listing-price-table">
                                <tr>
                                    <td class="listing-price">
                                        <img class="mx-1 price-icon" style="width: 20px;" src="{{ asset('assets/images/Dollar Minimalistic.png') }}">
                                        <span>{{ $listing->price }} ({{ $listing->currency->abbr }})</span>
                                    </td>
                                </tr>
                            </table>

                            <div class="d-flex justify-content-between mx-3 mb-3 listing-meta">
                                <div class="listing-region">
                                    <img class="mx-1 region-icon" style="width: 20px;" src="{{ asset('assets/images/Map Point.png') }}">
                                    <span>{{ $listing->region->name }}</span>
                                </div>
                                <div class="listing-date">
                                    <img class="mx-1 date-icon" style="width: 20px;" src="{{ asset('assets/images/time.png') }}">
                                    <span>{{ $listing->created_at->diffForHumans() }}</span>
                                </div>
                            </div>

                            <a href="{{ url('listing/' . $listing->id) }}" class="btn btn-primary rounded-2 d-flex justify-content-center align-items-center mx-3 mb-3 view-details-button" style="height: 45px;background-color: #046998;">
                                <h5 class="text-align-center m-0">عرض التفاصيل</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @if($listing_more)
        <div class="my-4 d-flex justify-content-center load-more-container">
            <button wire:click="loadMore" class="btn btn-light border text-white rounded-4 load-more-button" style="width: 200px; background-color: #046998; height: 45px;">
                مشاهدة المزيد
                <img class="float-start load-more-icon" src="{{ asset('assets/images/arrow-left1.svg') }}">
            </button>
        </div>
    @endif
</div>
