@extends('layouts.master')
@section('title', 'حسابي')
@section('contact')
    <div  class="container my-5">
        <div class="container text-center">
            <!-- صورة الملف الشخصي -->
            <div class="position-relative d-inline-block">
                <div class="border rounded-3" style="width: 150px; height: 150px; background-image: url({{'assets/images/person.png'}}); background-size: cover; background-position: center;">
                    <!-- أيقونة الكاميرا -->
                    <a href="#" class="position-absolute  end-0 translate-middle-y bg-white border rounded-start-pill d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;top: 125px">
                        <img src="{{'assets/images/camera.svg'}}" alt="Camera Icon" class="img-fluid" style="width: 20px; height: 20px;">
                    </a>
                </div>
            </div>

            <!-- اسم المستخدم وأيقونة التعديل -->
            <div class="d-flex justify-content-center align-items-center mt-3">
                <a href="{{url('edit_account')}}" class="me-2">
                    <img src="{{'assets/images/pen.png'}}" alt="Edit Icon" class="img-fluid" style="width: 40px; height: 40px;">
                </a>
                <h5 class="m-0">محمد سالم</h5>
            </div>
        </div>
        <div dir="rtl" class="row listing px-0 my-4 shadow">
            <div class="col-12 col-lg-2 text-center  my-2">
                <img class="img-fluid" src="{{asset('assets/images/Rectangle 87.png')}}" alt="#" style="max-height: 150px; min-height: 150px;">
            </div>
            <div class="col-12 col-lg-7 my-2">
                <h4 class="text-xxl-end text-xl-end text-lg-end text-center" >سياره تيوتا موديل 2006</h4>
                <table class="table table-responsive">
                    <tr>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Map Point.png')}}">
                            <label>المكلا</label>
                        </td>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/time.png')}}">
                            <label>منذ 30 دقيقة</label>
                        </td>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/status_ads.png')}}">
                            <label>جديد </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/User Rounded.png')}}">
                            <label>ابرهيم علي</label>
                        </td>
                        <td>
                            <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Dollar Minimalistic.png')}}">
                            <label>25000ريال سعودي</label>
                        </td>
                        <td>
                            <span class="badge rounded-pill text-dark" style="background-color:var(--warning-custom-color); font-size: 0.875rem; padding: 0.25rem 0.5rem;">سيارات</span>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center mb-2 mb-lg-0">


                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">هل أنت متأكد أنك ترغب في إزالة هذا الإعلان؟</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                هذه العملية لايمكن التراجع عنها
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغأء</button>
                                <button type="button" class="btn btn-light text-white" style="background-color: #97282A">إزالة الإعلان</button>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{url('show_info')}}" class="btn  btn-light border text-white rounded-4 d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 100%; background-color: #97282A; height: 45px;">
                    <h5 class="text-align-center m-0">حذف الاعلان</h5>
                </a>
            </div>
        </div>
   </div>
@endsection
