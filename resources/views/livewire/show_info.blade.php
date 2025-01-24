@extends('layouts.master')
@section('title', 'المعلومات')
@section('contact')
    <div dir="rtl">

        <div class="container my-4">
    <div class="border rounded-4" style="background-color: #f7FBFA" >
        <div class="m-3 border rounded-3"  >
            <div id="info_slid" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#info_slid" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#info_slid" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#info_slid" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/images/car.jpg') }}" style="max-width: 100%" class="d-block " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/car.jpg') }}" style="max-width: 100%" class="d-block  " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/car.jpg') }}" style="max-width: 100%" class="d-block " alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#info_slid" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#info_slid" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
        <div class="m-4">
        <h2>سياره تويوتا موديل 2006</h2>
            <div class="text-end m-2 d-block">

                <h5 class="d-flex ">
                    <div class="" ><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Map Point.png')}}"><label>المكلا</label></div>
                    <div class="" style="margin-right: 40px"><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/time.png')}}"><label>منذ 30 دقيقة</label></div>
                </h5>
                <h5 class="d-flex">
                    <div class=""><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/User Rounded.png')}}"><label>ابرهيم علي</label></div>
                    <div class="mx-2"><img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Dollar Minimalistic.png')}}"><label>25000ريال سعودي</label></div>
                </h5>
        </div>
    </div>
        <h3  class="mx-3" style="flex-direction: row;background-color: #FECA81;border-radius: calc(20px);width: 100px;height: 35px;text-align: center">سيارات
        </h3>
    </div>
        <div class="p-2 my-3">
      <h2 class="mb-2">تفاصيل الاعلان</h2>
        <p class= " " style="height: 100%;">"نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم.""نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."</p>
        <p class= " " style="height: 100%;">"نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم.""نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."</p>
        <p class= "" style="height: 100%;">"نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم.""نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."</p>
        <p class= "" style="height: 100%;">"نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم.""نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."</p>
    </div>

    <div dir="rtl" class="d-flex justify-content-center">
        <a href="#" class="btn btn-light border rounded-3 d-flex p-2 mx-4" style="background-color: #559FC1;" >
            <div class="mx-2" > <img src="{{ asset('assets/images/Vector.png') }}" style="width: 30px;height: 30px;"></div>
            <div>775190521</div>
        </a>
        <a href="#" class="btn btn-light border rounded-3 p-2 d-flex  mx-4" style="background-color: #559FC1">
            <div class="mx-2"> <img src="{{ asset('assets/images/Share.png') }}" style="width: 30px;height: 30px;"></div>
            <div>مشاركة الاعلان</div>
        </a>
        <a href="#" class="btn btn-light border rounded-3 p-2 d-flex mx-4" style="background-color: #559FC1">
            <div class="mx-2"> <img src="{{ asset('assets/images/whatsapp.png') }}" style="width: 30px;height: 30px;"></div>
            <div>775190521</div>
        </a>
        <a href="#" class="btn btn-light border rounded-3 p-2 d-flex mx-4" style="background-color: #559FC1">
            <div class="mx-2"> <img src="{{ asset('assets/images/Dislike.png') }}" style="width: 30px;height: 30px;"></div>
            <div>التبليغ عن الاعلان</div>
        </a>

    </div>
        <div class="m-3">
            <div class="w-75 h-75 border rounded-4 my-2 p-5">
                fsgsg
            </div>
            <button style="background-color: #559FC1" type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                <img style="width: 30px;" src="{{asset('assets/images/Plain.png') }}">
                اضافة تعليق
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة تعليق</h1>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">الاسم:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">التعليق:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">الغأ</button>
                            <button type="button" class="btn btn-primary w-25">ارسال</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection
