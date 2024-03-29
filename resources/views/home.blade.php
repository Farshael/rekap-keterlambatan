@extends('layouts.template')

@section('content')
@if (Session::get('alreadyAccess'))
<div class="alert alert-danger">{{ Session::get('alreadyAccess') }}</div>
@endif
<div class="jumbotron py-4 px-5">
    <h1 class="display-4">
        Selamat Datang  {{ Auth::user()->name }}!
    </h1>
    <hr class="my-4">
    <p>Aplikasi ini digunakan hanya oleh pegawai administrator Keterlambatan Siswa. Digunakan untuk mengelola siswa yang datang terlambat.</p>
</div>
@endsection