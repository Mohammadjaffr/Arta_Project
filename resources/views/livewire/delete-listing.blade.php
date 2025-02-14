<div>
    @foreach($listings as $listing)
    <div class="row listing px-0 my-4 shadow">
        <div class="col-12 col-lg-2 text-center my-2">
            <img class="img-fluid" src="{{ $listing->primary_image }}" alt="#" style="max-height: 150px; min-height: 150px;">
        </div>
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
                        <label>{{ $listing->created_at->diffForHumans() }}</label>
                    </td>
                    <td>
                        <img  class="mx-1" style="width: 20px;" src="{{asset('assets/images/status_ads.png')}}">
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
                        <label>{{$listing->price}} ( {{$listing->currency->abbr}} )</label>
                    </td>
                    <td>
                        <span class="badge rounded-pill text-dark" style="background-color:var(--warning-custom-color); font-size: 0.875rem; padding: 0.25rem 0.5rem;">{{$listing->category->name}}</span>
                    </td>
                </tr>
            </table>
        </div>

        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center mb-2 mb-lg-0">
            <a  class="btn btn-light border text-white rounded-4 d-flex justify-content-center align-items-center"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 100%; background-color: #97282A; height: 45px;">
                <h5 class="text-align-center m-0">حذف الاعلان</h5>
            </a>
        </div>
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
                            <button wire:click="delete({{$listing->id}})" type="button" class="btn btn-light text-white" style="background-color: #97282A">إزالة الإعلان</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    @endforeach
</div>
