@extends('front.layouts.default')

@section('title', 'Sejarah Perkembangan - Vokasi UNS')

@section('sec-title', 'Sejarah Perkembangan')

@section('content')

    @include('front.tentang-kami.header')

    <section class="how-it-works bg-white">
        <div class="container">
            <div class="sec-title" data-aos="fade-up" data-aos-delay="150">
                <h2><span>Sejarah Perkembangan dari Masa ke Masa</span> </h2>
            </div>
            <div style="font-size: 17px" class="text-justify">
                <div class="row" data-aos="fade-up" data-aos-delay="250">
                    {!! $data->value !!}
                </div>
            </div>
        </div>
    </section>

@endsection
