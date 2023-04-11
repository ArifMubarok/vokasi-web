@extends('front.layouts.default')

@section('title', 'Kerjasama - Vokasi UNS')

@section('sec-title', 'Kerjasama')

@section('content')

    @include('front.tentang-kami.header')

    <section class="how-it-works bg-white about-us fh mx-5 team">
        <div class="container-fluid text-justify">
            <div class="row team-all my-3">
                <!--Team Block-->
                @foreach ($data as $item) 
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2" data-aos="fade-up" data-aos-delay="150">
                        <div class="inner-box team-details">
                            <div class="image team-head pt-3" style="text-align: center">
                                    <img class="card-img img-fluid rounded-start d-inline-block" style="height: 75px; width: 75px" src="{{ asset('storage/images/kerjasama/' . $item->logo) }}" alt="" />
                            </div>
                            <div class="lower-box py-3">
                                <h3>{{ $item->instansi }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row my-5">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img class="resp-img" src="{{ asset('storage/images/kerjasama/' . $gambar->value) }}" alt="blog image">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 who-1">
                    <div>
                        <h2 class="text-left mb-4">Kerjasama <span></span></h2>
                    </div>
                    <div class="pftext" style="font-size: 18px">
                        <p>{!! $deskripsi->value !!}</p>
                    </div>
                    <div class="box bg-2">
                        <a href="{{ $link->value }}" target="_blank" rel="noopener noreferrer"
                            class="text-center button button--moema button--text-thick button--text-upper button--size-s">read
                            More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
