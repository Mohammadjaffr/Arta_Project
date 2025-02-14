<div>
    {{-- Search --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4" style="direction: rtl;">
        <form class="flex-grow-1 position-relative">
            <img src="{{ asset('assets/images/search.svg') }}" alt="Search Icon" style="position: absolute; left: 5px; top: 50%; transform: translateY(-50%);">
            <input wire:model.live="title" class="form-control rounded-4 ps-2" type="text" placeholder="ابحث هنا...">
        </form>

        {{-- Parent Region --}}
        <select wire:model.live="region_parent_id" class="form-select w-auto rounded-4">
            <option value="{{ null }}" selected>المحافظة</option>
            @foreach ($Parents as $Parent)
                <option value="{{ $Parent->id }}">{{ $Parent->name }}</option>
            @endforeach
        </select>

        {{-- Children Regions --}}
        @if ($childrens)
            <select wire:model.live="region_child_id" class="form-select w-auto rounded-4">
                <option value="{{ null }}">الكل</option> 
                @foreach ($childrens as $children)
                    <option value="{{ $children->id }}">{{ $children->name }}</option>
                @endforeach
            </select>
        @endif

        <a href="#" class="btn btn-light border-2 rounded-4" style="background-color: #046998;">
            أقل سعراً
            <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="#" class="ms-2">
        </a>
        <a href="#" class="btn btn-light border-2 rounded-4" style="background-color: #046998;">
            أعلى سعراً
            <img src="{{ asset('assets/images/arrow-up.svg') }}" alt="#" class="ms-2">
        </a>
    </div>
    {{-- End Search --}}

    {{-- Listings --}}
    <div class="container-fluid my-4" style="direction: rtl; background-color: #F7FBFA;">
        @foreach($listings as $listing)
            <div class="row listing px-0 my-4 shadow">
                <div class="col-12 col-lg-2 text-center my-2">
                    <img class="img-fluid" src="{{ $listing->primary_image }}" alt="#" style="max-height: 150px; min-height: 150px;"> 
                </div>
                <div class="col-12 col-lg-7 my-2">
                    <h4 class="text-xxl-end text-xl-end text-lg-end text-center">{{ $listing->title }}</h4>
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
                                <img class="mx-1" style="width: 20px;" src="{{ asset('assets/images/status_ads.png') }}">
                                <label>{{ $listing->status }}</label>
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
                    <a href="{{ url('listing/' . $listing->id) }}" class="btn border text-white rounded-4 d-flex justify-content-center align-items-center" style="width: 100%; background-color: #046998; height: 45px;">
                        <h5 class="text-align-center m-0">عرض التفاصيل</h5>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="my-4 d-flex justify-content-center">
        <a href="{{ url('show_info') }}" class="btn btn-light border text-white rounded-4" style="width: 200px; background-color: #046998; height: 45px;">
            مشاهدة المزيد
            <img class="float-start" src="{{ asset('assets/images/arrow-left1.svg') }}">
        </a>
    </div>
</div>