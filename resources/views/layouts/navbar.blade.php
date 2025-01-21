<nav class="navbar navbar-expand-lg navbar-light bg-light shadow" dir="rtl">
    <div class="container-fluid">
        <div style="width: 150px; height: 100px;">
            <img alt="" class="mt-3 mx-lg-3 mx-1" style="max-width: 150px; max-height: 200px; height:auto"  src="{{asset('assets/images/icon.png')}}">
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="mx-auto text-center">
                <ul class="navbar-nav d-inline-flex">
                    <li>
                        @if(Auth::user()->name)
                    <div class="d-lg-none text-center mb-2">
                        <a class="link  fw-bold text-decoration-none" href="{{route('account_show')}}" style="font-size: 20px">{{Auth::user()->name}}</a>
                    </div>
                    @else
                    <span class="mx-4">
                        <button class="btn btn-primary border" style="font-size: 20px">تسجيل الدخول</button>
                    </span>
                    @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-2 active" aria-current="page" href="#">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-2" href="#">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 mx-2" href="#">اتصل بنا</a>
                    </li>
                </ul>
            </div>
        </div>
        @if(Auth::user()->name)
            <span class="d-none d-lg-flex align-items-center mx-4">
                <a class="link fw-bold text-decoration-none p-0 mx-2" href="{{route('account_show')}}" style="border: none; background: none; font-size: 20px">{{Auth::user()->name}}</a>
                <img class="ms-2" src="{{asset('assets/images/person.png')}}" alt="" style="width: 82px; height: 82px; border-radius: 50%;">
                
            </span>
        @else
            <span class="mx-4">
                <button class="btn btn-primary border" style="font-size: 20px">تسجيل الدخول</button>
            </span>
        @endif
    </div>
</nav>