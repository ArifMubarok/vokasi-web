@extends('front.layouts.default')

@section('title', 'Article and News - Vokasi UNS')

@section('sec-title', 'Article and News')

@section('content')

    @include('front.layanan.header')

    <section class="how-it-works blog-section bg-white">
        <div class="container text-justify">
            <div class="news-wrap">
                <div class="row">
                    @foreach ($berita as $item)
                        <div class="col-xl-4 col-md-6 col-xs-12 my-1">
                            <div class="news-item" data-aos="fade-up" data-aos-delay="150">
                                <a href="{{ url('berita/' . $item->slug) }}" class="news-img-link">
                                    <div class="news-item-img">
                                        <img class="img-responsive"
                                            src="{{ asset('storage/images/' . $item->foto_header) }}" alt="blog image"
                                            style="width: 100%;height: 250px; object-fit: cover; object-position: center center;">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="{{ url('berita/' . $item->slug) }}">
                                        <h3>{{Str::limit($item->judul, 100,' ...')}}</h3>
                                    </a>
                                    <div class="dates">
                                        <span class="date">{{ $item->created_at->format('D, d M Y') }} &nbsp;</span>
                                    </div>
                                    <div class="news-item-descr big-news">
                                        <p>{!! Str::words($item->konten, 25, '...') !!}</p>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="{{ url('berita/' . $item->slug) }}" class="news-link">Read more...</a>
                                        {{-- <div class="admin">
                                                <p>By, Karl Smith</p>
                                                <img src="{{ asset('home-estate') }}/images/testimonials/ts-6.jpg"
                                                    alt="">
                                            </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

@endsection
