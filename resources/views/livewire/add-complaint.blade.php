<div>
    <!-- Button trigger modal -->
    <a class="btn btn-light border rounded-3 p-2 d-flex m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color: #559FC1">
        <div class="mx-2"><img src="{{ asset('assets/images/Dislike.png') }}" style="width: 30px; height: 30px;"></div>
        التبليغ عن الاعلان
    </a>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">التبليغ عن الاعلان</h1>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" wire:model="content"  placeholder="اكتب الشكوه هنا ..."></textarea>
                </div>
                @error('content')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغا</button>
                    <button wire:click.prevent="send"  type="button" class="btn btn-primary">ارسال</button>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger mt-3">
            {{ session('$error') }}
        </div>
    @endif
</div>
