@extends('front.layouts.default')

@section('title', 'Akreditasi - Vokasi UNS')

@section('sec-title', 'Akreditasi')

@section('content')
    
    @include('front.layanan.header')
    
    <section class="how-it-works bg-white">
        <div class="container text-center">
            <p>{!! $isiprofile->value !!}</p>
            <img class="resp-img pb-4" style="max-width: 50%" src="{{ asset('storage/images/mahasiswa/bem/' . $pictureprofile->value)  }}" alt="Profil Image">
        </div>
    </section>

@endsection