@extends('front.layouts.default')

@section('title', 'Program Studi - Vokasi UNS')

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
                                <h1 class="h1">{{ $head }}
                                    <br class="d-md-none">
                                </h1>
                                <p class="mt-4">
                                    <a class="text-white" href="{{ url('/') }}">Home</a>
                                    <span>&nbsp; / &nbsp;</span>
                                    {{ $head }}
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

    @if (isset($isInformasi))
    <section class="how-it-works bg-white-3 about-us fh">
        <div class="container-fluid text-justify">
            <div class="row mx-5">
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="row p-3">
                        <div class="col-lg-4 col-md 6 col-sm-12 text-center" data-aos="fade-up" data-aos-delay="150">
                            <img class="resp-img pb-4"
                                src="{{ asset('storage/images/detailProdi/' . $isInformasi->prodi_id . '/' . $foto->value) }}"
                                alt="Profil Image">
                            <h3>{{ $nama->value }}</h3>
                            <p><em>Kepala Program Studi</em></p>
                        </div>
                        <div class="col-lg-8 col-md 6 col-sm-12" data-aos="fade-up" data-aos-delay="250">
                            <p style="font-size: 20px">{!! $sambutan->value !!}</p>
                        </div>
                    </div>
                    <ul class="accordion accordion-1 one-open pt-3">
                        @if (isset($gambaran))
                            <li>
                                <div class="title text-left">
                                    <span>Gambaran Umum</span>
                                </div>
                                <div class="content">
                                    {!! $gambaran->value !!}
                                </div>
                            </li>
                        @endif
                        @if (isset($keunggulan))
                            <li>
                                <div class="title text-left">
                                    <span>Keunggulan dan Spesifikasi Program Studi</span>
                                </div>
                                <div class="content">
                                    {!! $keunggulan->value !!}    
                                </div>
                            </li>
                        @endif
                        @if (isset($vmt))
                            <li>
                                <div class="title text-left">
                                    <span>Visi, Misi, dan Tujuan</span>
                                </div>
                                <div class="content">
                                    {!! $vmt->value !!}    
                                </div>
                            </li>
                        @endif
                        @if (isset($profil))
                            <li>
                                <div class="title text-left">
                                    <span>Profil Lulusan</span>
                                </div>
                                <div class="content">
                                    {!! $profil->value !!}    
                                </div>
                            </li>
                        @endif
                        @if (isset($fasilitas))
                            <li>
                                <div class="title text-left">
                                    <span>Fasilitas</span>
                                </div>
                                <div class="content">
                                    {!! $fasilitas->value !!}    
                                </div>
                            </li>
                        @endif
                        <li>
                            @if (isset($laboratorium))
                        <li>
                            <div class="title text-left">
                                <span>Laboratorium</span>
                            </div>
                            <div class="content">
                                {!! $laboratorium->value !!}    
                            </div>
                        </li>
                        @endif
                        @if (isset($kerjasama))
                            <li>
                                <div class="title text-left">
                                    <span>Kerjasama</span>
                                </div>
                                <div class="content">
                                    {!! $kerjasama->value !!}    
                                </div>
                            </li>
                        @endif
                        @if (isset($testimoni))
                            <li>
                                <div class="title text-left">
                                    <span>Testimoni</span>
                                </div>
                                <div class="content">
                                    {!! $testimoni->value !!}    
                                </div>
                            </li>
                        @endif
                        @if (isset($isAdmin))
                            <li>
                                <div class="title text-left">
                                    <span>Daftar Admin</span>
                                </div>
                                <div class="content">
                                        {{-- {!! $admin->value !!} --}}
                                </div>
                            </li>
                        @endif
                        @if (isset($isDosen))
                            <li>
                                <div class="title text-left">
                                    <span>Daftar Dosen</span>
                                </div>
                                <div class="content">
                                    <div class="row" style="margin: 0 0">
                                        @foreach ($dosen as $item)
                                        <div class="col-lg-6 col-md-6 col-sm-12 py-2">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-6 col-sm-12">
                                                    <img class="resp-img pb-4"
                                                    src="{{ asset('storage/images/sdm_prodi/' . $item->foto) }}"
                                                        alt="Profil Image">
                                                </div>
                                                <div class="col-lg-7 col-md-6 col-sm-12">
                                                    <h3 style="font-weight: bold">{{ $item->name }}</h3>
                                                    <p style="color: #333; padding: 0">{{ $item->email }} </p>
                                                    <a href="{{ $item->link_iris }}" style="color: #333; padding: 0" target="_blank" rel="noopener noreferrer">Profil Lengkap</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @endif
                        @if (isset($isProduk))
                        <li>
                            <div class="title text-left">
                                <span>Produk</span>
                            </div>
                            <div class="content">
                                <ol>
                                    @foreach ($produk as $item) 
                                    <li><a href="{{ route('program-studi.produk', ['slug' => $slug, 'produk' => $item->produk] ) }}" style="color: #666">{{ $item->produk }}</a></li>
                                    @endforeach
                                </ol>
                            </div>
                        </li>
                        @endif
                    </ul>
                    {{-- <div class="row">
                        @foreach ($dosen as $item)
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="container text-justify">
                                <div class="row py-3">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-center" data-aos="fade-up" data-aos-delay="150">
                                        <img class="resp-img"src="{{ asset('storage/images/sdm_prodi/' . $item->foto) }}" alt="Profil Image" width="80%">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="250">
                                        <p>{{ $item->name }}</p>
                                        <p>{{ $item->email }}</p>
                                        <p>{{ $item->link_iris }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> --}}
                </div>
                @includeWhen(isset($isInformasi), 'front.program-studi.sidebar.sidebar')
            </div>
        </div>
    </section>
    @else
    <section class="how-it-works bg-white-3">
        <div class="container-fluid text-justify">
            <div class="row mx-5">
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="row p-3">
                        </div>
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
