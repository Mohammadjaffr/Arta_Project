<div>
    <button style="background-color: #559FC1" type="button" class="btn btn-light mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img style="width: 30px;" src="{{ asset('assets/images/Plain.png') }}">
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
                            <label class="col-form-label">{{ Auth::user()->name }}</label>
                        </div>
                        <div class="mb-3">
                            <textarea wire:model="content" name="content" class="form-control" placeholder="اكتب تعليقك هنا..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="cancelButton" type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">الغاء</button>
                    <button wire:click.prevent="addComment" type="button" class="btn btn-primary w-25" >ارسال</button>
                </div>
            </div>
        </div>
    </div>


</div>
<script>
    window.addEventListener('close-modal', event => {
        document.getElementById('cancelButton').click();
    });
</script>
