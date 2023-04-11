@extends('front.layouts.default')

@section('title', 'Senat Akademik Fakultas - Vokasi UNS')

@section('sec-title', 'Senat Akademik Fakultas')

@section('content')

    @include('front.tentang-kami.header')

    <section class="how-it-works bg-white">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-delay="150">
                <h3>Senat</h3>
                <h2>Akademik Fakultas</h2>
            </div>
            <div class="row px-3">
                @foreach ($senat as $item)
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center" data-aos="fade-up" data-aos-delay="250">
                        @if ($item->foto != null)
                            <img class="resp-img pb-4" src="{{ asset('storage/images/senat/' . $item->foto) }}"
                                alt="Profil Image" style="max-width: 250px ;">
                        @else
                            <img class="resp-img pb-4" src="{{ asset('home-estate') }}/images/blog/b-4.jpg"
                                alt="Profil Image">
                        @endif
                        <h3>{{ $item->name }}</h3>
                        <p>{{ $item->kedudukanSenat }}</p>
                    </div>
                @endforeach
            </div>
            {{-- Komisi A Start --}}
            <div class="my-5">
                <div class="section-title" data-aos="fade-up" data-aos-delay="150">
                    <h3>Komisi A</h3>
                    <h2>Akademik, Kemahasiswaan dan Alumni</h2>
                </div>
                <div class="row px-5">

                    @foreach ($komisiA as $item)
                        @if ($item->foto)
                            <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                                <img class="resp-img pb-4" src="{{ asset('storage/images/senat/' . $item->foto) }}"
                                    alt="Profil Image" style="max-width: 250px ;">
                                <h3>{{ $item->name }}</h3>
                                <p>{{ $item->kedudukanSenat }}</p>
                            </div>
                        @else
                            <div class="col-lg-8 col-md-6 col-sm-12 px-5">
                                {!! $item->name !!}
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
            {{-- Komisi A End --}}
            {{-- Komisi B Start --}}
            <div class="my-5">
                <div class="section-title" data-aos="fade-up" data-aos-delay="150">
                    <h3>Komisi B</h3>
                    <h2>Akademik, Kemahasiswaan dan Alumni</h2>
                </div>
                <div class="row px-5">
                    @foreach ($komisiB as $item)
                        @if ($item->foto)
                            <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                                <img class="resp-img pb-4" src="{{ asset('storage/images/senat/' . $item->foto) }}"
                                    alt="Profil Image" style="max-width: 250px ;">
                                <h3>{{ $item->name }}</h3>
                                <p>{{ $item->kedudukanSenat }}</p>
                            </div>
                        @else
                            <div class="col-lg-8 col-md-6 col-sm-12 px-5">
                                {!! $item->name !!}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            {{-- Komisi B End --}}
            {{-- Komisi C Start --}}
            <div class="my-5">
                <div class="section-title" data-aos="fade-up" data-aos-delay="150">
                    <h3>Komisi C</h3>
                    <h2>Akademik, Kemahasiswaan dan Alumni</h2>
                </div>
                <div class="row px-5">
                    @foreach ($komisiC as $item)
                        @if ($item->foto)
                            <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                                <img class="resp-img pb-4" src="{{ asset('storage/images/senat/' . $item->foto) }}"
                                    alt="Profil Image" style="max-width: 250px ;">
                                <h3>{{ $item->name }}</h3>
                                <p>{{ $item->kedudukanSenat }}</p>
                            </div>
                        @else
                            <div class="col-lg-8 col-md-6 col-sm-12 px-5">
                                {!! $item->name !!}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            {{-- Komisi C End --}}
        </div>
    </section>

@endsection
