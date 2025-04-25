    @extends('layouts.master')
@section('title', 'معلومات الحساب')
@section('contact')
    <div class="my-5" dir="rtl">
        <div>
            <div class="container border rounded-3 shadow">
                <h1 class="my-3">تفاصيل الحساب</h1>
                <h3 class="my-3">اسم المستخدم: <span>{{$users->username}}</span></h3>
                <form autocomplete="off" method="POST" action="{{ route('update', $users->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">الاسم</label>
                            <input value="{{$users->name}}" class="form-control" type="text" name="name">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">اسم المستخدم</label>
                            <input value="{{$users->username}}" class="form-control" type="text" name="username">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">الايميل</label>
                            <input value="{{$users->email}}" class="form-control" type="email" name="email">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">رقم الوتس</label>
                            <input value="{{$users->whatsapp_number}}" class="form-control" type="text" name="whatsapp_number">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">رقم الجوال</label>
                            <input value="{{$users->contact_number}}" class="form-control" type="text" name="contact_number">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label">الموقع</label>
                            <input id="location-input" class="form-control" type="text" placeholder="اضغط لتحديد موقعك" readonly onclick="getLocation()">
                            <input type="hidden" name="latitude" id="latitude" value="{{ $users->location?->latitude }}">
                            <input type="hidden" name="longitude" id="longitude" value="{{ $users->location?->longitude }}">
                        </div>
                    </div>
                    <div id="map" style="height: 300px; width: 100%;">      </div>

                    <div class="row my-4">
                        <div class="col-lg col-md">
                            <a class="btn btn-primary" href="{{url('/change_password')}}">تغيير كلمة المرور</a>
                        </div>
                        <div class="col-lg col-md"></div>
                    </div>
                    <h2>حسابات التواصل الاجتماعي</h2>
                    <div class="row my-4">
                        <div class="col-lg-4 col-md-4">
                            @if(isset($users->socialMediaAccounts->twitter))
                            <input value="{{$users->socialMediaAccounts->twitter}}" class="form-control" type="text"  name="twitter">
                            @else
                                <input  class="form-control" type="text"placeholder="twitter"  name="twitter">
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-4">
                            @if(isset($users->socialMediaAccounts->facebook))
                                <input value="{{$users->socialMediaAccounts->facebook}}" class="form-control" type="text"  name="facebook">
                            @else
                                <input  class="form-control" type="text"placeholder="facebook"  name="facebook">
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-4">
                            @if(isset($users->socialMediaAccounts->instagram))
                                <input value="{{$users->socialMediaAccounts->instagram}}" class="form-control" type="text"  name="instagram">
                            @else
                                <input  class="form-control" type="text"placeholder="instagram"  name="instagram">
                            @endif
                        </div>

                    </div>
                    <div class="row my-4">

                        <div class="col-lg-4 col-md-4">
                            @if(isset($users->socialMediaAccounts->linkedin))
                                <input value="{{$users->socialMediaAccounts->linkedin}}" class="form-control" type="text"  name="linkedin">
                            @else
                                <input  class="form-control" type="text"placeholder="linkedin"  name="linkedin">
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-4">
                            @if(isset($users->socialMediaAccounts->youtube))
                                <input value="{{$users->socialMediaAccounts->youtube}}" class="form-control" type="text"  name="youtube">
                            @else
                                <input  class="form-control" type="text"placeholder="youtube"  name="youtube">
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-4">
                            @if(isset($users->socialMediaAccounts->snapchat))
                                <input value="{{$users->socialMediaAccounts->snapchat}}" class="form-control" type="text"  name="snapchat">
                            @else
                                <input  class="form-control" type="text"placeholder="snapchat"  name="snapchat">
                            @endif
                        </div>
                    </div>
                    <h2>صورة البروفايل</h2>
                    <div class="row my-4">
                        <div class="border rounded-3 mx-3" style="width: 150px; height: 150px;  background-size: cover; background-position: center; cursor: pointer;" onclick="document.getElementById('fileInput').click();">
                            <input name="image" id="fileInput" class="form-control" type="file" style="display: none;" onchange="updateImage(event)">
                        </div>
                    </div>
                    <div class="row">
                        <button class="col-lg col-md btn btn-primary m-2" type="submit">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    function updateImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                // تحديث خلفية الـ div بالصورة الجديدة
                const div = document.querySelector('.border.rounded-3');
                div.style.backgroundImage = `url(${e.target.result})`;
            };
            reader.readAsDataURL(file);
        }
    }


</script>
<script>
    let map;
    let marker;
    let geocoder;

    function initMap(lat = 24.7136, lng = 46.6753) { // Default to Riyadh
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: { lat, lng },
        });

        marker = new google.maps.Marker({
            position: { lat, lng },
            map,
            draggable: true,
        });

        // تحديث الموقع عند سحب العلامة
        google.maps.event.addListener(marker, 'dragend', function () {
            const newLat = marker.getPosition().lat();
            const newLng = marker.getPosition().lng();
            updateLocation(newLat, newLng);
        });

        // تحديث الموقع عند النقر على الخريطة
        google.maps.event.addListener(map, 'click', function (event) {
            // الحصول على الموقع الحالي للمستخدم
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        marker.setPosition({ lat, lng });
                        updateLocation(lat, lng);
                    },
                    (error) => {
                        alert("فشل في الحصول على الموقع: " + error.message);
                    }
                );
            } else {
                alert("المتصفح لا يدعم تحديد الموقع.");
            }
        });
    }

    function updateLocation(lat, lng) {
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
        reverseGeocode(lat, lng);
    }

    function reverseGeocode(lat, lng) {
        if (!geocoder) {
            geocoder = new google.maps.Geocoder();
        }

        const latLng = new google.maps.LatLng(lat, lng);

        geocoder.geocode({ location: latLng }, (results, status) => {
            if (status === 'OK') {
                if (results[0]) {
                    const address = results[0].formatted_address;
                    document.getElementById('location-input').value = address;
                } else {
                    alert('لم يتم العثور على نتائج.');
                }
            } else {
                alert('فشل في الحصول على العنوان: ' + status);
            }
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFgAcNnTrpJWbmXm5JAdIM0bD-LBjTIPk&callback=initMap"></script>

