@extends('front.layouts.default')

@section('title', 'Fasilitas UNS - Vokasi UNS')

@section('sec-title', 'Fasilitas UNS')

@section('content')
    
    @include('front.layanan.header')
    
    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="150">
                        <img class="resp-img pb-4" src="{{ asset('storage/content/fasilitas/uns/'.$item->image) }}" alt="{{ $item->name }}" style="height: 300px; object-fit: cover;object-position: center center;">
                        <h4>{{ $item->name }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection