<div class="container-fluid my-4" style="direction: rtl; background-color: #F7FBFA;">
    @for($i = 0; $i < 2; $i++)
        <div class="row listing px-0 my-4 shadow">
            <div class="col-12 col-lg-2 text-center my-2">
                <div class="placeholder-glow" style="opacity: 0.4;"> 
                    <div class="placeholder" style="width: 150px; height: 150px; opacity: 0.4;"></div> 
                </div>
            </div>
            
            <div class="col-12 col-lg-7 my-2">
                <div class="placeholder-glow" style="opacity: 0.4;"> 
                    <h4 class="placeholder col-8" style="opacity: 0.4;"></h4> 
                    <div class="placeholder col-6" style="opacity: 0.4;"></div> 
                    <div class="placeholder col-5" style="opacity: 0.4;"></div> 
                </div>
            </div>
            
            <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                <div class="placeholder col-12" style="height: 45px; opacity: 0.4;"></div> 
            </div>
        </div>
    @endfor
</div>