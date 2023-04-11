@extends('front.layouts.default')

@section('title', 'Pinjam Ruang - Vokasi UNS')

@section('sec-title', 'Pinjam Ruang')

@section('content')
    
    @include('front.layanan.header')
    
    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <div class="sec-title" data-aos="fade-up" data-aos-delay="150">
                <h2><span>Peminjaman Ruang</span> </h2>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-lg-12 col-md-12 col-sm-12"  data-aos="fade-up" data-aos-delay="150">
                    <img src="{{ asset('storage/images/pinjam-ruang/' . $data->value) }}" alt="pinjam-ruang" style="width: 100%">
                </div>
            </div>
        </div>
    </section>

@endsection