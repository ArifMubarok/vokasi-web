@extends('front.layouts.default')

@section('title', 'Struktur Organisasi - Vokasi UNS')

@section('sec-title', 'Struktur Organisasi')

@section('content')

    @include('front.tentang-kami.header')

    <section class="how-it-works bg-white">
        <div class="container text-white">
            <div class="sec-title" data-aos="fade-up" data-aos-delay="150">
                <h2><span>Struktur Organisasi </span> </h2>
            </div>
            <div class="row p-3 justify-content-md-center">
                <div class="col-12 ">
                    <p><img src="{{ asset('storage/images/struktur-organisasi/' . $data->value) }}" alt="struktur-organisasi"
                            style="width: 100%"></p>
                </div>
            </div>
        </div>
    </section>

@endsection
