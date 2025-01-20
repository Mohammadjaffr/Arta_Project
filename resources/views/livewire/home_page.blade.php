    <div class=" mt-0 mx-0">
{{--            header--}}
        <div class="border rounded-3  d-flex  p-2 justify-content-between " style="position: relative;flex-direction: row">
            <div class="d-flex">
                <a class="" href="#"><input type="image" alt="#" style="width: 82px;position: relative; height: 82px;border-radius: calc(100px);" class="border" src="{{asset('assets/images/person.png')}}"></a>
                @if( Auth::user()->name)
                    <span class="mx-4 pt-4"><a class="link fw-bold text-decoration-none p-0"  href="{{route('account_show')}}" style="border: none;background:none;font-size: 20px">{{Auth::user()->name}}</a></span>
                @else
                    <span class="mx-4"><button class="btn btn-primary border" style="font-size: 20px">تسجيل الدخول</button></span>
                @endif
            </div>
            <div dir="rtl" class="d-flex  w-50">
                <button class="mx-5 me-0" style="border: none;background:none;font-size: 20px">الرئيسية</button>
                <button class="mx-4" style="border: none;background:none;font-size: 20px">من نحن</button>
                <button class="mx-4" style="border: none;background:none;font-size: 20px">اتصل بنا</button>
            </div>
            <div ><img class="float-end mx-3" alt="" style="width: 101px;height:90px;position: relative;top: 12px;" src="{{asset('assets/img/icon.png')}}"></div>
        </div>
        {{-- end header--}}
        <div class="container text-center">
                {{--contact--}}
            <div style="direction: rtl">
                <div class="d-flex border rounded-4 justify-content-start m-3 " style="height: 419px;background-color: #FFCF55;" >
                    <div class="border rounded-end-4" style="flex-grow: 1;height: 419px;;"><img style="width: fit-content;height: fit-content;" src="{{asset('assets/images/box_ads.gif')}}" class="card-img-top" alt="..."></div>
                    <div class="border rounded-start-4 " style=""><img class="border rounded-start-4 " style="width: fit-content;flex-grow: 1; height: 419px;" src="{{asset('assets/images/markting.gif')}}"></div>
                </div>
                @if(Auth::user()->name)
                    <a href="{{route('category.index')}}" class="btn btn-blue rounded-start-5 my-3" style="float: left;background-color: #FECA81">اضافة اعلان<img class="mx-2" src="{{asset('assets/images/plus.png')}}" alt="#"></a>
                @else

                @endif
                <br>
                <h5 class="float-end"> الفئات</h5>

                <div class="">
                    <div class="d-flex m-5" style="column-gap: 18px">
                        <div class="card" style="width: 15rem;height: 14rem;border: none;">
                            <a href="#"><img src="{{asset('assets/images/Autos.png')}}" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title">السيارات</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 15rem;border: none; height: 14rem">
                            <a href="#"><img src="{{asset('assets/images/Autos.png')}}" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title">السيارات</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 15rem;border: none; height: 14rem">
                            <a href="#"><img src="{{asset('assets/images/Autos.png')}}" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title">السيارات</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 15rem;border: none; height: 14rem">
                            <a href="#"><img src="{{asset('assets/images/Autos.png')}}" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title">السيارات</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 15rem;border: none; height: 14rem">
                            <a href="#"><img src="{{asset('assets/images/Autos.png')}}" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title">السيارات</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 15rem;border: none; height: 14rem">
                            <a href="#"><img src="{{asset('assets/images/Autos.png')}}" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title">السيارات</h5>
                            </div>
                        </div>
                    </div>
                    {{--search--}}
                    <div class="d-flex justify-content-space p-3  " style="direction: rtl">
                        <form  style="background: none; border: none; position: relative;">
                            <img  style="position: absolute; left: 1px; top: 40%; transform: translateY(-50%);" class="p-2 " src="{{ asset('assets/images/search.svg') }}" alt="Search Icon">
                            <input class="rounded-4 p-2 pl-5 form-control" type="text" style="width: 450px; padding-left: 40px;" placeholder="ابحث هنا...">
                        </form>
                        <div class="mx-2">
                            <select class="form-select border-2 rounded-4 w-auto" style="width: 100px;direction: ltr">
                                <option>المدينة</option>
                                <option>القطن</option>
                                <option>سيئون</option>
                            </select>
                        </div>
                        <div>
                            <select class="form-select border-2 rounded-4 w-auto  " style="width: 100px;">
                                <option>المنطقة</option>
                                <option>القطن</option>
                                <option>سيئون</option>
                            </select>
                        </div>
                        <div>
                            <form class="mx-2">
                                <a href="#" class="btn btn-light px-2 border-2 rounded-4 py-2" type="submit" style="background-color: #046998">
                                    اقل سعرا
                                    <img src="{{ asset('assets/images/arrow-down.svg') }}" class="mx-2" alt="#">
                                </a>
                            </form>
                        </div>
                        <div>
                            <form class="mx-2">
                                <a href="#" class="btn btn-light px-2 border-2 rounded-4 py-2" type="submit" style="background-color: #046998">
                                    اعلى سعرا
                                    <img src="{{ asset('assets/images/arrow-up.svg')}}" class="mx-2" alt="#">
                                </a>
                            </form>
                        </div>


                    </div>
                    {{-- end search--}}
                </div>
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
        <hr>
       @include('layouts.footer')
    </div>




























