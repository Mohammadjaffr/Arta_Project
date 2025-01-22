<!DOCTYPE html>
<html lang="ar">
@extends('layouts.head')
<body>
    @livewire('auth-form')

    @livewireScripts
    <script src="{{asset('assets/Js/custom-Js.js')}}"></script>
    <script>
    window.onload = updateTitleBasedOnUrl;
    </script>
</body>
</html>
