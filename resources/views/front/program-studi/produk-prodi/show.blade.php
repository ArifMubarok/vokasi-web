@extends('front.layouts.default')

@section('title', 'Produk Program Studi - Vokasi UNS')

@section('content')

    <!-- STAR HEADER  -->
    <section id="hero-area" class="parallax-searchs home15 overlay thome-6" data-stellar-background-ratio="0.5">
        <div class="hero-main">
            <div class="container" data-aos="zoom-in">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-inner">
                            <!-- Welcome Text -->
                            <div class="welcome-text">
                                <h1 class="h1">{{ $isLeaflet->produk }}
                                    <br class="d-md-none">
                                </h1>
                                <p class="mt-4">
                                    <a class="text-white" href="{{ url('/') }}">Home</a>
                                    <span>&nbsp; / &nbsp;</span>
                                    {{ $isLeaflet->produk }}
                                </p>
                            </div>
                            <!--/ End Welcome Text -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HEADER  -->

    @if (isset($isLeaflet) && isset($isLeaflet->leaflet))
    @foreach ($leaflet as $item)
    <section class="how-it-works bg-white-3 about-us fh">
        <div class="container text-justify">
            <div class="row mx-5">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <img class="resp-img" src="{{ asset('storage/images/produk-unggulan') .'/'. $item->leaflet }}" alt="{{ $item->produk }}">
                </div>
            </div>
        </div>
    </section>
    @endforeach
    @else
    <section class="how-it-works bg-white-3">
        <div class="container-fluid text-justify">
            <div class="row mx-5">
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="row p-3">
                        <div class="col-lg-8 col-md 6 col-sm-12 col-align-center" data-aos="fade-up" data-aos-delay="250">
                            <p style="font-size: 20px">DATA NULL</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    

@endsection
