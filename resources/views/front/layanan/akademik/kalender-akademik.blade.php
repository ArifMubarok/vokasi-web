@extends('front.layouts.default')

@section('title', 'Kalender Akademik - Vokasi UNS')

@section('sec-title', 'Kalender Akademik')

@section('content')
    
    @include('front.layanan.header')
    
    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <div class="sec-title" data-aos="fade-up" data-aos-delay="150">
                <h2><span>Kalender Akademik</span> </h2>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-lg-12 col-md-12 col-sm-12" style="font-size: 17px" data-aos="fade-up" data-aos-delay="150">
                    <img src="{{ asset('storage/images/kalender-akademik/' . $data->value) }}" alt="kalender-akademik" style="width: 100%">
                </div>
            </div>
        </div>
    </section>

@endsection