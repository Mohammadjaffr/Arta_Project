@section('title', 'حسابي')
@section('contact')
    <div class="container text-center">
        {{--contact--}}
        <div style="direction: rtl">
            <div class="d-flex flex-wrap rounded-4 m-3 align-items-center justify-content-between" style="background-color: #FFCF55;" >
                <div class="rounded-end-4 " style="flex-grow: 2;height: 419px;">
                    <h2 class="my-4 d-flex justify-content-start mx-4" >بيع الي ماتحتاجه</h2>
                    <img style="width: fit-content;height: fit-content;" src="{{asset('assets/images/box_ads.gif')}}" class="card-img-top d-flex justify-content-start" alt="..."></div>
                <div class="rounded-start-4  " style=""><img class="rounded-start-4 " style="width: fit-content;flex-grow: 1; height: 419px;" src="{{asset('assets/images/markting.gif')}}"></div>
            </div>
            @if(Auth::user()->name)
                <a href="{{route('category.index')}}" class="btn btn-blue rounded-start-5 my-3" style="float: left;background-color: #FECA81">اضافة اعلان<img class="mx-2" src="{{asset('assets/images/plus.png')}}" alt="#"></a>
            @else

            @endif
            <br>
            <h5 class="float-end"> الفئات</h5>
            <div class="container mt-5">
                <div class="row align-items-start">
                    <div class="col-12 col-md-9">
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table class="table">
                                <tr>
                                    <td>
                                        <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                            <a href="#"><img style="width: 10rem;height: 6rem;" src="{{asset('assets/images/Autos.png')}} " class="card-img-top img-fluid" alt="..."></a>
                                            <div class="card-body">
                                                <h5 class="card-title">السيارات</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                            <a href="#"><img style="width: 10rem;height: 6rem;" src="{{asset('assets/images/sports.png')}}" class="card-img-top" alt="..."></a>
                                            <div class="card-body">
                                                <h5 class="card-title">رياضه</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                            <a href="#"><img  style="width: 10rem;height: 6rem;"  src="{{asset('assets/images/electronic.png')}}" class="card-img-top" alt="..."></a>
                                            <div class="card-body">
                                                <h5 class="card-title">الاكترونيات</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                            <a href="#"><img  style="width: 10rem;height: 6rem;" src="{{asset('assets/images/furniture.png')}}" class="card-img-top" alt="..."></a>
                                            <div class="card-body">
                                                <h5 class="card-title">الاثاث</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                            <a href="#"><img style="width: 10rem;height: 6rem;" src="{{asset('assets/images/houses.png')}}" class="card-img-top" alt="..."></a>
                                            <div class="card-body">
                                                <h5 class="card-title">عقارات</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                            <a href="#"><img style="width: 10rem;height: 6rem;" src="{{asset('assets/images/motor.png')}}" class="card-img-top" alt="..."></a>
                                            <div class="card-body">
                                                <h5 class="card-title">مركبات</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card" style="width: 10rem; height: 10rem; border: none;">
                                            <a href="#"><img style="width: 10rem;height: 6rem;" src="{{asset('assets/images/women_s_fashion.png')}}" class="card-img-top" alt="..."></a>
                                            <div class="card-body">
                                                <h5 class="card-title">ازياء نسائية</h5>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 d-flex justify-content-center flex-column align-items-center">
                        <div class="card" style="width: 100%; max-width: 10rem; height: 12rem; border:none;">
                            <a href="#" class="border"  style="background-color: #F2F2F7;border-radius: calc(100%)"><img style="width: 10rem;height: 6rem; border-radius: 20px" src="{{asset('assets/images/more_ads.png')}}" class="card-img-top " alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title">الكل</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--search--}}
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4" style="direction: rtl;">
                <form class="flex-grow-1 position-relative">
                    <img src="{{ asset('assets/images/search.svg') }}" alt="Search Icon" style="position: absolute; left: 5px; top: 50%; transform: translateY(-50%);">
                    <input class="form-control rounded-4 ps-2" type="text" placeholder="ابحث هنا...">
                </form>
                <select class="form-select w-auto rounded-4">
                    <option>المدينة</option>
                    <option>القطن</option>
                    <option>سيئون</option>
                </select>
                <select class="form-select w-auto rounded-4">
                    <option>المنطقة</option>
                    <option>القطن</option>
                    <option>سيئون</option>
                </select>
                <a href="#" class="btn btn-light border-2 rounded-4" style="background-color: #046998;">
                    أقل سعراً
                    <img src="{{ asset('assets/images/arrow-down.svg') }}" alt="#" class="ms-2">
                </a>
                <a href="#" class="btn btn-light border-2 rounded-4" style="background-color: #046998;">
                    أعلى سعراً
                    <img src="{{ asset('assets/images/arrow-up.svg') }}" alt="#" class="ms-2">
                </a>
            </div>
            {{-- end search--}}
        </div>
        {{-- end contact--}}
        <div class="border rounded-3 m-4 py-2 d-flex" style="direction: rtl;background-color: #D2E1E8">
            <div class="text-end m-2 mt-3"><img class="" style="width: 100px;height: 100px;" src="{{asset('assets/images/Rectangle 87.png')}}" alt="#"></div>
            <div class="text-end m-2 mt-3 ">
                <h4>  سياره تيوتا موديل 2006</h4>
                <div class="d-flex justify-content-md-between">
                    <div class="d-block justify-content-md-around ">
                        <div><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Map Point.png')}}"><label>المكلا</label></div>
                        <div><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/time.png')}}"><label>منذ 30 دقيقة</label></div>
                    </div>
                    <div class="d-block justify-content-md-between">
                        <div><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/User Rounded.png')}}"><label>ابرهيم علي</label></div>
                        <div><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Dollar Minimalistic.png')}}"><label>25000ريال سعودي</label></div>
                    </div>
                </div>
            </div>

            <div class="text-end m-2 position-relative" style="right: 50%;top: 40px">
                <a href="{{url('show_info')}}" class="btn btn-light border text-white rounded-4" style="width: 200px;background-color: #046998; height: 45px;">
                    عرض التفصيل
                    <img class="float-start" src="{{asset('assets/images/arrow-left1.svg')}}">
                </a>
            </div>
        </div>


        <div class="m-2  d-flex justify-content-center" >
            <a href="{{url('show_info')}}" class="btn btn-light border text-white rounded-4" style="width: 200px;background-color: #046998; height: 45px;">
                مشاهدة المزيد
                <img class="float-start" src="{{asset('assets/images/arrow-left1.svg')}}">
            </a>
        </div>
    </div>

@endsection




























