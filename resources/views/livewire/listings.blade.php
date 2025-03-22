<div>
    <div class="container mt-2 text-center">
        <div class="row align-items-start">
            <div class="col-12">
                <div class="table-responsive scrollable" style="overflow-x: auto;">
                    <table class="table">
                        <tr>
                            @foreach($categories as $category)
                            <td>
                                <div class="card" style="border: none;">
                                    <a wire:click="filterByCategory({{$category->id}})"  class="text-decoration-none" ><img style="width: 8rem; height: 4rem;" src="{{$category->image}}" class="card-img-top img-fluid" alt="...">
                                        <div class="card-body">
                                            <h5 style="font-size: 0.8rem; color: black">{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </td>
                            @endforeach
                                <td>
                                    <div class="card" style="border: none;">
                                        <a wire:click="list_all_listing" class="text-decoration-none">
                                            <img style="width: 8rem; height: 4rem;" src="{{asset('assets/images/AllCategories.png')}}" class="card-img-top img-fluid" alt="...">
                                            <div class="card-body">
                                                <h5 style="font-size: 1.0rem; color: black">الكل</h5>
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
    {{-- Search --}}

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4" style="direction: rtl;">
        <div>
            <button wire:click="set_view_stats('list')" class="btn btn-light"><i class="fa-solid fa-list"></i></button>
            <button wire:click="set_view_stats('card')" class="btn btn-light"><i class="fa-solid fa-grip"></i></button>
        </div>
        <form class="flex-grow-1 position-relative">
            <img src="{{ asset('assets/images/search.svg') }}" alt="Search Icon" style="position: absolute; left: 5px; top: 50%; transform: translateY(-50%);">
            <input wire:model.live="title" class="form-control rounded-4 ps-2" type="text" placeholder="ابحث هنا...">
        </form>
        @if($children_categories)
        <select wire:model.live="category_child_id" class="form-select w-auto rounded-4">
            <option value="{{ null }}" selected>ااختر النوع</option>
            @foreach( $children_categories as  $child)
                <option value="{{ $child->id }}">{{$child->name }}</option>
            @endforeach
        </select>
        @endif
        {{-- Parent Region --}}
        <select wire:model.live="region_parent_id"  class="form-select w-auto rounded-4" >
            <option value="{{ null }}" selected>المحافظة</option>
            @foreach ($Parents as $Parent)
                <option value="{{ $Parent->id }}">{{ $Parent->name }}</option>
            @endforeach
        </select>

        {{-- Children Regions --}}
        @if ($children)
            <select wire:model.live="region_child_id" class="form-select w-auto rounded-4">
                <option selected value="{{ null }}">الكل</option>
                @foreach ($children as $child)
                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                @endforeach
            </select>
        @endif

        <button wire:click="sortByPrice('asc')" class="btn btn-light border-2 rounded-4" style="background-color: #046998;">
            أقل سعراً
            <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="#" class="ms-2">
        </button>
        <button wire:click="sortByPrice('desc')" class="btn btn-light border-2 rounded-4" style="background-color: #046998;">
            أعلى سعراً
            <img src="{{ asset('assets/images/arrow-up.svg') }}" alt="#" class="ms-2">
        </button>
    </div>
    {{-- End Search --}}

    {{-- Listings --}}
    <div class="container-fluid my-5" style="direction: rtl; background-color: #F7FBFA;">
        @if($view_stats == 'list')
            @foreach($listings as $listing)
                <div class="row listing px-0 my-4 shadow hover-shadow-lg transition-all" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="col-12 col-lg-2 text-center my-2 d-flex align-items-center justify-content-center position-relative">
                        <img class="img-fluid rounded-3" src="{{ $listing->primary_image }}" alt="#" style="max-height: 150px; min-height: 150px; object-fit: cover;">
                        <div class="position-absolute top-0 bg-dark bg-opacity-75 text-white p-2 rounded-bottom-right rounded-3" style="left: 12px;">
                            {{ $listing->status }}
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 my-2">
                        <h4 class="text-xxl-end text-xl-end text-lg-end text-center fw-bold">{{ $listing->title }}</h4>
                        <table class="table table-responsive">
                            <tr>
                                <td>
                                    <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/Map Point.png') }}">
                                    <label>{{ $listing->region->name }}</label>
                                </td>
                                <td>
                                    <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/time.png') }}">
                                    <label>{{ $listing->created_at->diffForHumans() }}</label>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/User Rounded.png') }}">
                                    <label>{{ $listing->user->name }}</label>
                                </td>
                                <td>
                                    <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/Dollar Minimalistic.png') }}">
                                    <label>{{ $listing->price }} ({{ $listing->currency->abbr }})</label>
                                </td>
                                <td>
                                    <span class="badge rounded-pill text-dark" style="background-color: var(--warning-custom-color); font-size: 0.875rem; padding: 0.25rem 0.5rem;">{{ $listing->category->name }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center mb-2 mb-lg-0">
                        <a href="{{ url('listing/' . $listing->id) }}" class="btn btn-primary rounded-4 d-flex justify-content-center align-items-center" style="width: 100%; height: 45px; background-color: #046998;">
                            <h5 class="text-align-center m-0">عرض التفاصيل</h5>
                        </a>
                    </div>
                </div>



            @endforeach
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($listings as $listing)
                    <div class="my-2">
                        <div class="border rounded-2 shadow-sm hover-shadow-lg transition-all image-preview" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">

                            <div class="position-relative">
                                <img src="{{ $listing->primary_image }}" class="img-fluid  rounded-3 mb-2" style="object-fit: cover; height: 200px; width: 100%;" alt="{{ $listing->title }}">
                                <div class="position-absolute top-0 start-0 bg-dark bg-opacity-75 text-white p-2 rounded-bottom-right rounded-3">
                                    {{ $listing->status }}
                                </div>
                            </div>

                            <div class="mx-3 mt-3">
                                <h5 class="fw-bold">{{ $listing->title }}</h5>
                            </div>

                            <table class="table table-responsive">
                                <tr>
                                    <td>
                                        <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/Dollar Minimalistic.png') }}">
                                        <label>{{ $listing->price }} ({{ $listing->currency->abbr }})</label>
                                    </td>
                                </tr>
                            </table>

                            <div class="d-flex justify-content-between mx-3 mb-3">
                                <div>
                                    <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/Map Point.png') }}">
                                    <label>{{ $listing->region->name }}</label>
                                </div>
                                <div>
                                    <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/time.png') }}">
                                    <label>{{ $listing->created_at->diffForHumans() }}</label>
                                </div>
                            </div>

                            <a href="{{ url('listing/' . $listing->id) }}" class="btn btn-primary rounded-2 d-flex justify-content-center align-items-center mx-3 mb-3" style="height: 45px;background-color: #046998;">
                                <h5 class="text-align-center m-0">عرض التفاصيل</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>


        @endif
    </div>
    @if($listing_more)
    <div class="my-4 d-flex justify-content-center">
        <button wire:click="loadMore" class="btn btn-light border text-white rounded-4" style="width: 200px; background-color: #046998; height: 45px;">
            مشاهدة المزيد
            <img class="float-start" src="{{ asset('assets/images/arrow-left1.svg') }}">
        </button>
    </div>
    @endif
</div>
