@extends('front.layouts.default')

@section('title', 'Fasilitas Laboratorium Lapangan - Vokasi UNS')

@section('sec-title', 'Fasilitas Laboratorium Lapangan')

@section('content')
    
    @include('front.layanan.header')
    
    <section class="how-it-works bg-white">
        <div class="container text-justify">
            @foreach ($lab_lapangan as $item)
            <div>
                <div class="sec-title">
                    <h2><span>Laboratorium Lapangan </span>{{ $item->name }}</h2>
                    <p>{{ $item->deskripsi }}</p>
                </div>
                <div class="row">
                    @foreach ($data as $item2)
                        @if ($item->id == $item2->lap_id)
                            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="150">
                                <img class="resp-img pb-4" src="{{ asset('storage/content/fasilitas/laboratorium-lapangan/'.$item2->gambar) }}" alt="Ruang {{ $item->name }}">
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