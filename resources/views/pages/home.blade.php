@extends('layouts.app')

@section('content')
    @include('pages.home.hero')
    @include('pages.home.layanan', ['layanan' => $layanan])
    @include('pages.home.statistik', ['statistik' => $statistik])
    @include('pages.home.berita', ['berita' => $berita])
@endsection
