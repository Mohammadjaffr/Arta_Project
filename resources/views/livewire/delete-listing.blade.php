<div>

        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center mb-2 mb-lg-0">
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">هل أنت متأكد أنك ترغب في إزالة هذا الإعلان؟</h1>
                        </div>
                        <div class="modal-body">
                            هذه العملية لايمكن التراجع عنها
                        </div>
                        <form class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغأء</button>
                            <button wire:click="delete({{ $listingId }})" type="button" class="btn btn-light text-white" style="background-color: #97282A">إزالة الإعلان</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>

</div>
