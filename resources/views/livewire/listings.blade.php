<div>
    <div class="container-fluid my-4" style="direction: rtl; background-color: #F7FBFA;">
        <div class="row px-0 my-4 shadow">
            <div class="col-12 col-lg-2 text-center my-2">
                <img class="img-fluid" src="{{asset('assets/images/Rectangle 87.png')}}" alt="#" style="max-height: 150px; min-height: 150px;">
            </div>
            @foreach($listings as $listing)
                <div class="col-12 col-lg-7 my-2">
                    <h4 class="text-xxl-end text-xl-end text-lg-end text-center" >{{$listing->title}}</h4>
                    <table class="table table-responsive">
                        <tr>
                            <td>
                                <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Map Point.png')}}">
                                <label>{{$listing->region->name}}</label>
                            </td>
                            <td>
                                <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/time.png')}}">
                                <label>{{$listing->created_at}}</label>
                            </td>
                            <td>
                                <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/status_ads.png')}}">
                                <label>{{$listing->status}} </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/User Rounded.png')}}">
                                <label>{{$listing->user->name}}</label>
                            </td>
                            <td>
                                <img class="mx-1" style="width: 20px;" src="{{asset('assets/images/Dollar Minimalistic.png')}}">
                                <label>{{$listing->price}}</label>
                            </td>
                            <td>
                                <span class="badge rounded-pill text-dark" style="background-color: var(--warning-custom-color); font-size: 0.875rem; padding: 0.25rem 0.5rem;">{{$listing->category->name}}</span>
                            </td>
                        </tr>
                    </table>

                </div>

                <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center mb-2 mb-lg-0">
                    <a href="{{url('show_info/'.$listing->id)}}" class="btn border text-white rounded-4 d-flex justify-content-center align-items-center" style="width: 100%; background-color: #046998; height: 45px;">
                        <h5 class="text-align-center m-0">عرض التفاصيل</h5>
                    </a>
                </div>
            @endforeach

        </div>
        
    </div>

    <div class="my-4 d-flex justify-content-center" >
        <a href="{{url('show_info')}}" class="btn btn-light border text-white rounded-4" style="width: 200px;background-color: #046998; height: 45px;">
                                مشاهدة المزيد
            <img class="float-start" src="{{asset('assets/images/arrow-left1.svg')}}">
        </a>
    </div>
</div>
