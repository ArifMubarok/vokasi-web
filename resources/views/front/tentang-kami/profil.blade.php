@extends('front.layouts.default')

@section('title', 'Profil - Vokasi UNS')

@section('sec-title', 'Profil')

@section('content')

    <!-- Start Content Profil -->
    <section class="info-help h18">
        <div class="container">
            <div class="row info-head">
                <div class="col-lg-12 col-md-8 col-xs-8">
                    <div class="info-text" data-aos="fade-up" data-aos-delay="150">
                        <h3 class="text-center mb-0">@yield('sec-title') Sekolah Vokasi</h3>
                        <p class="text-center mb-4 p-0">
                            <a class="text-white" href="{{ url('/') }}">Home</a>
                            <span>&nbsp; / &nbsp;</span>
                            @yield('sec-title')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section _ngcontent-bgi-c3="" class="featured-boxes-area bg-white-1">
        <div _ngcontent-bgi-c3="" class="container">
            <div _ngcontent-bgi-c3="" class="featured-boxes-inner">
                <div _ngcontent-bgi-c3="" class="row m-0">
                    <div _ngcontent-bgi-c3="" class="col-lg-12 col-sm-12 col-md-12 p-0" data-aos="fade-up"
                        data-aos-delay="250">
                        <div _ngcontent-bgi-c3="" class="single-featured-box">
                            <div _ngcontent-bgi-c3="" class="icon color-fb7756"><img
                                    src="{{ asset('storage/images/profilsv/' . $pictureprofile->value) }}" width="250"
                                    height="250" alt=""></div>
                            <h3 _ngcontent-bgi-c3="" class="mt-5">Profil Singkat Sekolah Vokasi</h3>
                            <p _ngcontent-bgi-c3="" class="text-justify">{!! $isiprofile->value !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Content Profil -->

    <!-- Start Content Sambutan Dekan -->
    <section class="how-it-works bg-white" id="sambutanDekan">
        <div class="container text-justify">
            <div class="sec-title">
                <h2><span>Sambutan Dekan</span></h2>
            </div>
            <div class="row p-3">
                <div class="col-lg-4 col-md 6 col-sm-12 text-center" data-aos="fade-up" data-aos-delay="150">
                    @if ($sambutan->picture != null)
                        <img class="resp-img pb-4 mt-4" src="{{ asset('storage/images/profilsv/' . $sambutan->picture) }}" alt="Profil Image" width="70%">
                    @else
                        <img class="resp-img pb-4" src="{{ asset('home-estate') }}/images/blog/b-4.jpg" alt="Profil Image">
                    @endif
                    <h3>{{ $sambutan->name }}</h3>
                    <p>{{ $sambutan->title }}</p>
                </div>
                <div class="col-lg-8 col-md 6 col-sm-12" data-aos="fade-up" data-aos-delay="250">
                    <p style="font-size: 20px">{!! $sambutan->sambutan !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Content Sambutan Dekan -->

@endsection
