@extends('layouts.master')
@section('title', 'المعلومات')
@section('contact')
    <div dir="rtl" style="margin-top: 150px;">
        <div class="container my-4 w-50">
            <div class="border rounded-4 w-100 w-md-75 w-lg-50 mx-auto" style="background-color: #f7FBFA">
                <!-- Carousel Section -->
                <div class="m-3 border rounded-3">
                    <div id="info_slid" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#info_slid" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#info_slid" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#info_slid" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/images/car.jpg') }}" class="d-block w-100 img-fluid" style="height: 400px; object-fit: cover;" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/women_s_fashion.png') }}" class="d-block w-100 img-fluid" style="height: 400px; object-fit: cover;" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/car.jpg') }}" class="d-block w-100 img-fluid" style="height: 400px; object-fit: cover;" alt="...">
                            </div>

                            <!-- Image Previews -->
                            <div class="text-center position-absolute" style="top: 70%; right: 1%;">
                                <img class="border rounded-3 image-preview w-75" style="width: 120px; height: 100px; background-color: #C3C3C3; cursor: pointer;" src="{{ asset('assets/images/car.jpg') }}" alt="إضافة صورة">
                                <input type="file" accept="image/*" style="display: none;">
                            </div>
                            <div class="text-center position-absolute" style="top: 70%; right: 13%;">
                                <img class="border rounded-3 image-preview w-75" style="width: 120px; height: 100px; background-color: #C3C3C3; cursor: pointer;" src="{{ asset('assets/images/car.jpg') }}" alt="إضافة صورة">
                                <input type="file" accept="image/*" style="display: none;">
                            </div>
                            <div class="text-center position-absolute" style="top: 70%; right: 25%;">
                                <img class="border rounded-3 image-preview w-75" style="width: 120px; height: 100px; background-color: #C3C3C3; cursor: pointer;" src="{{ asset('assets/images/car.jpg') }}" alt="إضافة صورة">
                                <input type="file" accept="image/*" style="display: none;">
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

                <!-- Ad Details Section -->
                <div class="col-12 col-lg-7 my-2">
                    <h4 class="text-xxl-end text-xl-end text-lg-end text-center mx-4">سياره تيوتا موديل 2006</h4>
                    <div class="table-responsive">
                        <table class="table table-responsive">
                            <tr>
                                <td>
                                    <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Map Point.png')}}">
                                    <label>{{$listings->region->name}}</label>
                                </td>
                                <td>
                                    <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/time.png')}}">
                                    <label>{{$listings->created_at}}</label>
                                </td>
                                <td>
                                    <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/status_ads.png')}}">
                                    <label>{{$listings->status}} </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/User Rounded.png')}}">
                                    <label>{{$listings->user->name}}</label>
                                </td>
                                <td>
                                    <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Dollar Minimalistic.png')}}">
                                    <label>{{$listings->price}}</label>
                                </td>
                                <td>
                                    <span class="badge rounded-pill text-dark" style="background-color:var(--warning-custom-color); font-size: 0.875rem; padding: 0.25rem 0.5rem;">{{$listings->category->name}}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Ad Description Section -->
            <div class="p-2 my-3">

                <h2 class="mb-2">تفاصيل الاعلان</h2>
                <p>{{$listings->description}}</p>
            </div>

            <!-- Action Buttons Section -->
            <div dir="rtl" class="d-flex flex-wrap justify-content-center">
                <a href="#" class="btn btn-light border rounded-3 d-flex p-2 m-2" style="background-color: #559FC1;">
                    <div class="mx-2"><img src="{{ asset('assets/images/Vector.png') }}" style="width: 30px; height: 30px;"></div>
                    <div>{{$listings->user->contact_number}}</div>
                </a>
                <a href="#" class="btn btn-light border rounded-3 p-2 d-flex m-2" style="background-color: #559FC1">
                    <div class="mx-2"><img src="{{ asset('assets/images/Share.png') }}" style="width: 30px; height: 30px;"></div>
                    <div>مشاركة الاعلان</div>
                </a>
                <a href="#" class="btn btn-light border rounded-3 p-2 d-flex m-2" style="background-color: #559FC1">
                    <div class="mx-2"><img src="{{ asset('assets/images/whatsapp.png') }}" style="width: 30px; height: 30px;"></div>
                    <div>{{$listings->user->whatsapp_number}}</div>
                </a>
                <a href="#" class="btn btn-light border rounded-3 p-2 d-flex m-2" style="background-color: #559FC1">
                    <div class="mx-2"><img src="{{ asset('assets/images/Dislike.png') }}" style="width: 30px; height: 30px;"></div>
                    <div>التبليغ عن الاعلان</div>
                </a>
            </div>

            <!-- Comment Section -->
            <div class="m-3">
                <div class="w-100 h-75 border rounded-4 my-2 p-3 p-md-5">
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
                                        <label for="recipient-name" class="col-form-label">{{$listings->user->name}}</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label"></label>
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
    </div>
@endsection
