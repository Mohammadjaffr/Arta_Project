@extends('layouts.master')
@section('title', 'حسابي')
@section('contact')
    <div class="container my-5">
<div >
    <div class="border rounded " style="width: 150px;margin-left: 64vh; background-image: url({{'assets/images/person.png'}}); height: 150px;position: relative;">
        <a href="#" class="border bg-white text-center rounded-top-5 rounded-start-5 " style="position:absolute;width: 50px;height: 50px;left: 98px;top: 99px;" ><img class="mt-2" style="width: 20px;height: 30px;" src="{{asset('assets/images/camera.svg')}}"></a>
    </div>
    <div class="d-flex" style="margin-left: 66vh">
        <a href="{{url('account')}}" class="mt-2 "><img style="width: 40px;height: 40px;" src="{{asset('assets/images/pen.png')}}"></a>
        <h5 class="mt-3 mx-2">محمد سالم</h5>
    </div>

</div>
        <div class="border rounded-3 m-4 py-2 d-flex" style="direction: rtl;background-color: #D2E1E8">
            <div class="text-end m-2 "><img class="" style="width: 100px;height: 100px;" src="{{asset('assets/images/Rectangle 87.png')}}"></div>
            <div class="text-end m-2 d-block">
                <h4 class="text-truncate" style="max-width: 400px;">سياره تيوتا موديل 2006</h4>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center m-2">
                        <img class="mx-1" style="width: 25px;" src="{{asset('assets/images/Map Point.png')}}" alt="الموقع">
                        <label class="text-truncate" style="max-width: 150px;">المكلا</label>
                    </div>
                    <div class="d-flex align-items-center m-2">
                        <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/time.png')}}" alt="الوقت">
                        <label class="text-truncate" style="max-width: 150px;">منذ 30 دقيقة</label>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center mx-2">
                        <img class="mx-1" style="width: 25px;" src="{{asset('assets/images/User Rounded.png')}}">
                        <label class="text-truncate" style="max-width: 150px;">ابرهيم علي</label>
                    </div>

                    <div class="d-flex align-items-center mx-2">
                        <img class="mx-1" style="width: 25px;" src="{{asset('assets/images/Dollar Minimalistic.png')}}">
                        <label class="text-truncate" style="max-width: 150px;">25000ريال سعودي</label>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">حذف الاعلان</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغأ</button>
                            <button type="button" class="btn btn-danger">حذف</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-light rounded-4 text-white mt-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 200px;background-color: #97282A; margin-right: 650px; height: 60px;">
                ازالة الاعلان
            </button>
        </div>
   </div>
@endsection
