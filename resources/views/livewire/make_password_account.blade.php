<div  style="background-image: url({{'assets/images/'}});background-repeat:repeat">

    <header>    {{-- navbar add new listing --}}
        <div class="d-flex  my-3"  style="position: relative;">
            <div class="mx-2 ">
                <img class="py-3" style="width: 130px;right: 50vh; height: 130px;"  src="{{asset('assets/img/icon.png')}}">
                <h5 class="text-center mb-2">منصة عرطه</h5>
            </div>
            <div class="mt-4 text-center"  style="position: relative;left: 75vh">
                <h2>تعيين كلمة المرور</h2>
            </div>
            <div class="m-3 float-end" style="position: relative;left: 150vh">
                <a href="{{ url('login') }}" style="height: 45px; width: 45px;">
                    <button class="rounded-circle" style="height: 45px; border: none; background-color: #D2E1E8; width: 45px;">
                        <img src="{{ asset('assets/img/chevron-right.svg') }}">
                    </button>
                </a>
            </div>
        </div>
        {{-- form for add new listing --}}
    </header>
        <div  class="container  w-75">
            <div style="flex-direction: column">
                <div class="border rounded " style="width: 180px;margin-left: 60vh; background-image: url({{'assets/images/'}}); height: 150px;position: relative;">
                    <a href="#" class="border bg-white text-center rounded-top-5 rounded-start-5 " style="position:absolute;width: 50px;height: 50px;left: 127px;top: 97px;" ><img class="mt-2" style="width: 20px;height: 30px;" src="{{asset('assets/images/camera.svg')}}"></a>
                </div>
                <div class="d-flex"style="margin-left: 63vh">
                    <a href="#" class="mt-2 "><img style="width: 40px;height: 40px;" src="{{asset('assets/images/pen.png')}}"></a>
                    <h5 class="mt-3 mx-2">محمد سالم</h5>
                </div>
            </div>

            <form dir="rtl" class="border rounded-4 p-3 w-50" style="position: relative;left: 35vh;margin: 20px;">
                <label>كلمة المرور القديمة</label>
                <input class="form-control  m-2" type="password">
                <label>كلمة المرور الجديده</label>
                <input class="form-control  m-2" type="password">

                <button class="btn  w-50 mt-3 w-50 text-white" style="margin-right: 160px;background-color: #01496B">حفظ التغير</button>
            </form>
        </div>



    <footer class="mt-5">
        <div class="row">
            <div class="row d-flex  " style="padding-bottom: 0px">
                <div class="col-6 " style="padding: 10px 0px 0px 100px;">
                    <button class="rounded-circle" style="height: 45px;border: none;background-color: #BDD6F4;width:45px;"><img src="{{asset('assets/images/facebook.svg')}}"></button>
                    <button class="rounded-circle" style="height: 45px;border: none;background-color: #BDD6F4;width:45px;"><img src="{{asset('assets/images/twitter.svg')}}"></button>
                    <button class="rounded-circle" style="height: 45px;border: none;background-color: #BDD6F4;width:45px;"><img src="{{asset('assets/images/instagram.svg')}}"></button>
                    <button class="rounded-circle " style="height: 45px;border: none;background-color: #BDD6F4;width:45px;"><img style="width: 25px;" src="{{asset('assets/images/whatsapp.svg')}}"></button>
                </div>
                <div class="col-6 text-end" ><img style="width: 200px;height: 200px;" src="{{asset('assets/img/icon.png')}}"></div>
            </div>
            <div class="row ">
                <h4 style="padding: 0px 10px 10px 100px">استكشف التطبيق الخاص بنا</h4>
                <div class="col-4 text-center">
                    <button style="border: none;background-color: white"><img  style="width:150px" src="{{asset('assets/images/appstore.png')}}"></button>
                    <button style="border: none;background-color: white"><img style="width:150px" src="{{asset('assets/images/googlestore.png')}}"></button>
                </div>
                <div class="col-4 text-center py-3">تواصل معنا: info@company.com <br> جميع الحقوق محفوظة @ 2024. <br></div>
                <div class="col-4  text-end py-3">"نص تجريبي يستخدم في تصميم الواجهات والمشاريع. هذا النص هو مجرد نص وهمي يهدف إلى ملء المساحات، وعادةً ما يُستخدم في الطباعة والتصميم."</div>

            </div>
        </div>
    </footer>





</div>
