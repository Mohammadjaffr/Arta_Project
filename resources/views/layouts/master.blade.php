<!doctype html>
<html lang="en">
@extends('layouts.head')
<body>
@include('layouts.navbar')
@yield('contact')
<hr>
@extends('layouts.footer')
@livewireScripts
<script src="{{asset('assets/Js/custom-Js.js')}}"></script>
</body>
</html>
