@extends('front.layouts.default')

@section('title', 'Fasilitas Laboratorium - Vokasi UNS')

@section('sec-title', 'Fasilitas Laboratorium')

@section('content')
    
    @include('front.layanan.header')
    
    <section class="how-it-works bg-white">
        <div class="container text-justify">
            @foreach ($lab as $item)
            <div>
                <div class="sec-title">
                    <h2><span>Laboratorium </span>{{ $item->name }}</h2>
                    <p>{{ $item->deskripsi }}</p>
                </div>
                <div class="row">
                    @foreach ($foto_lab as $item2)
                        @if ($item->id == $item2->lab_id)
                            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="150">
                                <img class="resp-img pb-4" src="{{ asset('storage/content/fasilitas/laboratorium/'.$item2->gambar) }}" alt="Lab {{ $item->name }}">
                            </div>
                        @else
                            <div class="col-12">
                                <p>Belum ada Foto</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>

@endsection