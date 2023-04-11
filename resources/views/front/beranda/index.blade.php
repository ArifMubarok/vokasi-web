        @extends('front.layouts.default')

        @section('title', 'Vokasi UNS')

        @section('content')

            <!-- STAR HEADER SEARCH -->
            <div id="map-container" class="fullwidth-home-map dark-overlay">
                <!-- Video -->
                <div class="video-container">
                    <div
                    style="height: 100%;
                    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.1));"
                    >
                        <video poster="{{ asset('home-estate') }}/images/bg/video-image.png" loop autoplay muted>
                            <source src="{{ asset('home-estate') }}/video/video-bg.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div id="hero-area" class="main-search-inner search-2 vid">
                    <div class="container vid" data-aos="zoom-in">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-inner2">
                                    <!-- Welcome Text -->
                                    <div class="welcome-text">
                                        <h1 class="h1">Sekolah Vokasi
                                            <br class="d-md-none">
                                            <br>
                                            <span class="typed" style="color: #274abb"></span>
                                        </h1>
                                    </div>
                                    <!--/ End Welcome Text -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END HEADER SEARCH -->

            {{-- Info PMB UNS --}}
            @if(isset($pmb_uns))
            <section class="feature-categories bg-white-2">
                <div class="container">
                    <div class="row">
                        <!-- Single category -->
                        <div class="col-xl-12 col-lg-12 col-sm-12" data-aos="zoom-in" data-aos-delay="150">
                            <div class="small-category-2 row">
                                <div class="small-category-2-thumb img-1 m-3 col-2">
                                    <a href="properties-map.html" style="color: #274abb">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="height: 150px; object-fit: cover; object-position: center center;" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col" style="max-width: 800px">
                                    <h3>{{ $pmb_uns->header }}<a href="{{ route('pmb-uns.index') }}" class="text-decoration-none">Informasi selengkapnya</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </section>
            @else
                
            @endif


            <!-- START SECTION BLOG -->
            <section class="blog-section bg-white">
                <div class="container">
                    <div class="section-title">
                        <h3>Berita</h3>
                        <h2>Terbaru</h2>
                    </div>
                    <div class="news-wrap">
                        <div class="row">

                            @foreach ($beritas as $item)
                            <div class="col-xl-4 col-md-6 col-xs-12">
                                <div class="news-item" data-aos="fade-up" data-aos-delay="150">
                                    <a href="{{ url('berita/'. $item->slug) }}" class="news-img-link">
                                        <div class="news-item-img">
                                            <img class="img-responsive" src="{{ asset('storage/images/' . $item->foto_header) }}"
                                                alt="blog image"  style="width: 100%;height: 250px; object-fit: cover; object-position: center center;">
                                        </div>
                                    </a>
                                    <div class="news-item-text">
                                        <a href="{{ url('berita/'. $item->slug) }}">
                                            <h3 style="height: 100px">{{ $item->judul }}</h3>
                                        </a>
                                        <div class="dates">
                                            <span class="date">{{ $item->created_at->format('D, d M Y') }} &nbsp;</span>
                                        </div>
                                        <div class="news-item-descr big-news">
                                            <p>{!! Str::words($item->konten, 25 , '...') !!}</p>
                                        </div>
                                        <div class="news-item-bottom">
                                            <a href="{{ url('berita/'. $item->slug) }}" class="news-link">Read more...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-all mt-3">
                        <a href="{{ url('berita') }}" class="btn btn-outline-light">View All</a>
                    </div>
                </div>
            </section>
            <!-- END SECTION BLOG -->

            <!-- START SECTION COUNTER UP -->
            <section class="counterup">
                <div class="container" data-aos="fade-up">
                    <div class="sec-title">
                        <h2 style="color: #fff"><span style="color: #FFD800">Fakta </span>Sekolah Vokasi</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-xs-12">
                            <div class="countr">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <div class="count-me">
                                    <p class="counter text-left">6470</p>
                                    <h3>Mahasiswa</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-xs-12">
                            <div class="countr">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <div class="count-me">
                                    <p class="counter text-left">24</p>
                                    <h3>Program Studi</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-xs-12">
                            <div class="countr mb-0">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <div class="count-me">
                                    <p class="counter text-left">198</p>
                                    <h3>Tenaga Pendidik</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-xs-12">
                            <div class="countr mb-0">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                <div class="count-me">
                                    <p class="counter text-left">56</p>
                                    <h3>Kependidikan</h3>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="countr mb-0 last">
                            <i class="fa fa-trophy" aria-hidden="true"></i>
                            <div class="count-me">
                                <p class="counter text-left">3885</p>
                                <h3>Alumni</h3>
                            </div>
                        </div>
                    </div> --}}
                    </div>
                </div>
            </section>
            <!-- END SECTION COUNTER UP -->

            <!-- START SECTION INFO-HELP -->
            <section class="about-us fh">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 who-1">
                            <div>
                                <h2 class="text-left mb-4">Profil <span>Sekolah Vokasi</span></h2>
                            </div>
                            <div class="pftext" style="font-size: 18px">
                                {!! $profile->konten->value !!}
                            </div>
                            <div class="box bg-2">
                                <a href="{{ route('profil-sv.index') }}"
                                    class="text-center button button--moema button--text-thick button--text-upper button--size-s">read
                                    More</a>
                                {{-- <img src="{{ asset('home-estate') }}/images/signature.png" class="ml-5" alt=""> --}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-xs-12">
                            <div class="wprt-image-video w50">
                                {{-- <iframe width="560" height="315" src="{{ $youtube->konten->value }}" title="YouTube video player" frameborder="0"
                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe> --}}
                                
                                <img alt="image" src="{{ asset('home-estate') }}/images/bg/bg-video.jpg">
                                <a class="icon-wrap popup-video popup-youtube" href="https://www.youtube.com/watch?v=UQWx_uWH3ns">
                                    <i class="fa fa-play"></i>
                                </a>
                                <div class="iq-waves">
                                    <div class="waves wave-1"></div>
                                    <div class="waves wave-2"></div>
                                    <div class="waves wave-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END SECTION INFO-HELP -->

            <!-- Start Visi, Misi & Tujuan -->
            <section class="featured portfolio bg-white-3">
                <div class="container">
                    {{-- Visi Start --}}
                    <div class="row pb-5">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <img class="resp-img" src="{{ asset('home-estate') }}/images/blog/b-3.jpg" alt="blog image">
                        </div>
                        <div class="offset-lg-1 col-lg-7 col-md-6 col-sm-12 text-center">
                            <h2 style="color: #525252"> Visi Sekolah Vokasi UNS</h2>
                            <p style="font-size: 23px; line-height: 40px; " class="text-justify">{!! $visi->konten->value !!}</p>
                        </div>
                    </div>
                    {{-- Visi End --}}
                    {{-- Misi Start --}}
                    <div class="row py-5">
                        <div class="col-lg-7 col-md-6 col-sm-12 text-justify">
                            <h2 style="color: #525252"> Misi Sekolah Vokasi UNS</h2>
                            <div style="font-size: 18px">{!! $misi->konten->value !!}</div>
                        </div>
                        <div class="offset-lg-1 col-lg-4 col-md-6 col-sm-12">
                            <img class="resp-img" src="{{ asset('home-estate') }}/images/blog/b-3.jpg" alt="blog image">
                        </div>
                    </div>
                    {{-- Misi End --}}
                    {{-- Tujuan Start --}}
                    <div class="row pt-5 mt-3">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <img class="resp-img" src="{{ asset('home-estate') }}/images/blog/b-3.jpg" alt="blog image">
                        </div>
                        <div class="offset-lg-1 col-lg-7 col-md-6 col-sm-12 text-center">
                            <h2 style="color: #525252"> Tujuan Sekolah Vokasi UNS</h2>
                            <p style="font-size: 23px;" class="text-justify">"Menjadi pusat pengembangan sumber daya
                                manusia yang berkelanjutan dan unggul di tingkat internasional dengan berlandaskan pada
                                nilai-nilai luhur budaya nasional pada tahun 2044"</p>
                            <ul class="accordion accordion-1 one-open pt-3">
                                <li>
                                    <div class="title text-left">
                                        <span>Kompeten</span>
                                    </div>
                                    <div class="content" style="font-size: 18px">
                                        {!! $tujuan1->konten->value !!}
                                    </div>
                                </li>
                                <li>
                                    <div class="title text-left" >
                                        <span>Berkarya</span>
                                    </div>
                                    <div class="content" style="font-size: 18px">
                                        {!! $tujuan2->konten->value !!}
                                    </div>
                                </li>
                                <li>
                                    <div class="title text-left">
                                        <span>Mengabdi</span>
                                    </div>
                                    <div class="content" style="font-size: 18px">
                                        {!! $tujuan3->konten->value !!}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- Tujuan End --}}
                </div>
            </section>
            <!-- End Visi, Misi & Tujuan -->



            <!-- STAR SECTION PARTNERS -->
            <div class="partners bg-white">
                <div class="container">
                    <div class="sec-title">
                        <h2><span style="color: #274abb">Institusi </span>Mitra</h2>
                    </div>
                    <div class="owl-carousel style2">
                        @foreach ($kerjasamas as $item)
                            <div class="owl-item" data-aos="fade-up"><img style="width: 80%; aspect-ratio: 3/2; object-fit: contain"
                                    src="{{ asset('storage/images/kerjasama/'.$item->logo) }}" alt=""></div>
                        @endforeach
                        <div class="owl-item" data-aos="fade-up"><img
                                src="{{ asset('home-estate') }}/images/partners/11.jpg" alt=""></div>
                        <div class="owl-item" data-aos="fade-up"><img
                                src="{{ asset('home-estate') }}/images/partners/12.jpg" alt=""></div>
                        {{-- <div class="owl-item" data-aos="fade-up"><img
                                src="{{ asset('home-estate') }}/images/partners/13.jpg" alt=""></div>
                        <div class="owl-item" data-aos="fade-up"><img
                                src="{{ asset('home-estate') }}/images/partners/14.jpg" alt=""></div>
                        <div class="owl-item" data-aos="fade-up"><img
                                src="{{ asset('home-estate') }}/images/partners/15.jpg" alt=""></div>
                        <div class="owl-item" data-aos="fade-up"><img
                                src="{{ asset('home-estate') }}/images/partners/16.jpg" alt=""></div>
                        <div class="owl-item" data-aos="fade-up"><img
                                src="{{ asset('home-estate') }}/images/partners/17.jpg" alt=""></div>
                        <div class="owl-item" data-aos="fade-up"><img
                                src="{{ asset('home-estate') }}/images/partners/11.jpg" alt=""></div>
                        <div class="owl-item" data-aos="fade-up"><img
                                src="{{ asset('home-estate') }}/images/partners/12.jpg" alt=""></div>
                        <div class="owl-item" data-aos="fade-up"><img
                                src="{{ asset('home-estate') }}/images/partners/13.jpg" alt=""></div> --}}
                    </div>
                </div>
            </div>
            <!-- END SECTION PARTNERS -->


        @endsection
