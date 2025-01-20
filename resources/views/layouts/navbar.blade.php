<header>
<div class="border rounded-3  d-flex  p-3 justify-content-between " style="position: relative;flex-direction: row">
    <div class="d-flex mb-3 align-items-center mb-md-0">
        <a class="" href="#"><input type="image" alt="#" style="width: 82px;position: relative; height: 82px;border-radius: calc(100px);" class="border" src="{{asset('assets/images/person.png')}}"></a>
        @if( Auth::user()->name)
            <span class="mx-4 "><a class="link fw-bold text-decoration-none p-0"  href="{{route('account_show')}}" style="border: none;background:none;font-size: 20px">{{Auth::user()->name}}</a></span>
        @else
            <span class="mx-4"><button class="btn btn-primary border" style="font-size: 20px">تسجيل الدخول</button></span>
        @endif
    </div>
    <div dir="rtl" class="d-flex d-flex flex-wrap justify-content-center mb-3 mb-md-0">
        <a href="{{url('home')}}" class="btn btn-light  mt-4" style="border: none;background:none;font-size: 20px">الرئيسية</a>
        <a href="#" class="mt-4 btn btn-light" style="border: none;background:none;font-size: 20px">من نحن</a>
        <a href="#" class="mt-4 btn btn-light" style="border: none;background:none;font-size: 20px">اتصل بنا</a>
    </div>
    <div style="width: 150px;height: 90px;"><img alt="" style="width: 150px;height: 90px;" src="{{asset('assets/images/icon_arta.png')}}"></div>
</div>
</header>

