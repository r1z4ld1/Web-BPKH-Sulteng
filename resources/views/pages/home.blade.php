@extends('layouts.app')

@section('content')
     @include('pages.home.hero')
    @include('pages.home.layanan-unggulan', ['layananUnggulan' => $layananUnggulan])
    @include('pages.home.layanan', ['layanan' => $layanan])
     @include('pages.home.statistik', ['statistikCards' => $statistikCards, 'kawasanHutan' => $kawasanHutan])
    @include('pages.home.berita', ['berita' => $berita])
@endsection
