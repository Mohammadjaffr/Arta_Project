<div class="col-12 col-lg-3 d-flex justify-content-center align-items-center mb-2 mb-lg-0">
    <div class="modal fade"  id="staticBackdrop-{{$listing->id}}"   data-bs-backdrop="static"  data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel-{{$listing->id}}"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel-{{$listing->id}}">
                        هل أنت متأكد أنك ترغب في إزالة هذا الإعلان؟
                    </h1>
                </div>
                <div class="modal-body">
                    <h6 class="fw-bold">{{ $listing->title }}</h6>
                    <p>هل أنت متأكد من رغبتك في حذف هذا الإعلان؟</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        لا يمكن استعادة الإعلان بعد الحذف
                    </div>
                </div>
                <form class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">إلغاء</button>
                    <button wire:click="delete({{ $listing->id }})"
                            type="button"
                            class="btn btn-light text-white"
                            style="background-color: #97282A">إزالة الإعلان</button>
                </form>
            </div>
        </div>
    </div>
</div>
