<header>    {{-- navbar add new listing --}}
    <div class="d-flex  my-3 justify-content-md-between"  style="position: relative;">
        <div class="mx-2 ">
            <img class="py-3" style="width: 130px;right: 50vh; height: 130px;"  src="{{asset('assets/img/icon.png')}}">
        </div>
        <div class="mt-4 "  style="position: relative">
            <h2>تعديل الاسم</h2>
        </div>
        <div class="m-3 " style="position: relative">
            <a href="{{ url('account') }}" style="height: 45px; width: 45px;">
                <button class="rounded-circle" style="height: 45px; border: none; background-color: #D2E1E8; width: 45px;">
                    <img src="{{ asset('assets/img/chevron-right.svg') }}">
                </button>
            </a>
        </div>
    </div>
    {{-- form for add new listing --}}
</header>
