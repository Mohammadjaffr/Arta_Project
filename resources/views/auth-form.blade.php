<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('assets/css/custom-style.css')}}">
    @livewireStyles
</head>
<body>
    @livewire('auth-form')

    @livewireScripts
    <script>
        function changeUrl(url) {
            history.pushState(null, '', url);
        }
    </script>


</body>
</html>
