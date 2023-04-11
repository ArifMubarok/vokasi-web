@extends('front.layouts.default')

@section('title', 'Produk Unggulan - Vokasi UNS')

@section('sec-title', 'Produk Unggulan')

@section('content')

    @include('front.layanan.header')

    <!-- START SECTION INFO-HELP -->
    <section class="about-us fh">
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xs-12">
                    {{-- <div class="wprt-image-video w50">
                        <img alt="image" src="{{ asset('home-estate') }}/images/bg/bg-video.jpg">
                        <a class="icon-wrap popup-video popup-youtube"
                            href="https://www.youtube.com/watch?v=2xHQqYRcrx4">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="iq-waves">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div> --}}
                    <iframe src="{{ $yout->value }}" width="560" height="315" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="col-lg-6 col-md-12 who-1">
                    <div>
                        <h2 class="text-left mb-4">Pameran Produk Unggulan <span>Sekolah Vokasi UNS</span></h2>
                    </div>
                    <div class="pftext">
                        {!! $desk->value !!}
                    </div>
                    <div class="box bg-2">
                        <a href="{{ $yout->value }}" target="_blank" rel="noopener noreferrer"
                            class="text-center button button--moema button--text-thick button--text-upper button--size-s">Tonton
                            pada youtube</a>
                        {{-- <img src="{{ asset('home-estate') }}/images/signature.png" class="ml-5" alt=""> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION INFO-HELP -->

    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="150">
                        <img class="resp-img pb-4" src="{{ asset('storage/images/produk-unggulan/'.$item->leaflet) }}" alt="Produk Image">
                        <h4> {{ $item->produk }} </h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
