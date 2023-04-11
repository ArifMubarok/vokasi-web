@extends('front.layouts.default')

@section('title', 'UPM SV - Vokasi UNS')

@section('sec-title', 'UPM')

@section('content')

    @include('front.tentang-kami.header')

    <section class="how-it-works bg-white">
        <div class="container text-justify">
            {{-- @dump($isiupm) --}}
            @if (!isset($isiupm->value))
                <h5 class="text-center">Data Null</h5>
            @endif

            @if (isset($isiupm))
                <h5 class="pb-5" style="line-height: 1.6">{!! $isiupm->value !!}</h5>
            @endif
            {{-- Ketua Start --}}
            {{-- <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img class="resp-img pb-4" src="{{ asset('home-estate') }}/images/blog/b-4.jpg" alt="Profil Image">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2 class="pb-3">Nama</h2>
                    <h3 class="pb-3">Jabatan</h3>
                    <h5 style="line-height: 1.5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae veniam
                        in quidem laborum, magnam cum perferendis ipsa totam, ratione iure iusto eveniet incidunt eligendi
                        error neque! Facere sunt perspiciatis animi.</h5>
                </div>
            </div> --}}
            {{-- Ketua End --}}
            <div class="row mt-3">
                @foreach ($profil as $item)
                    <div class="col-lg-6 col-md-6 col-sm-12 py-3" data-aos="fade-up" data-aos-delay="150">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <img class="resp-img pb-4"
                                    src="{{ asset('storage/images/profil-pimpinan/' . $item->foto) }}" alt="Profil Image"
                                    style="max-height: 200px; display: block;margin-left: auto;margin-right: auto">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h3>{{ $item->name }}</h3>
                                <h4>{{ $item->kedudukan }}</h4>
                                <p>{!! $item->profil !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
