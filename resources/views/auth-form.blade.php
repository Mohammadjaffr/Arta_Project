<!DOCTYPE html>
<html lang="ar">
@extends('layouts.head')
<body>
    @livewire('auth-form')

    @livewireScripts
    <script>
       function updateTitleBasedOnUrl() {
        const currentUrl = window.location.pathname;
        if (currentUrl.includes('login')) {
            document.title = 'تسجيل دخول';
        } else if (currentUrl.includes('register')) {
            document.title = 'إنشاء حساب';
        }
    }
    function changeUrl(url) {
        history.pushState(null, '', url);
        updateTitleBasedOnUrl(); 
    }
    window.onload = updateTitleBasedOnUrl;
    </script>


</body>
</html>
