@extends('front.layouts.default')

@section('title', 'Judul Berita - Vokasi UNS')

@section('sec-title', 'Judul Berita')

@section('content')

    @include('front.layanan.header')

    <section class="blog blog-section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 blog-pots">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="news-item details no-mb2 p-2" style="min-height: 100px; max-height: 100%">
                                <a href="{{ url('berita/'.$data->slug) }}" class="news-img-link">
                                    <div class="news-item-img">
                                        <img class="img-responsive"
                                            src="{{ asset('storage/images/' . $data->foto_header) }}" alt="blog image">
                                    </div>
                                </a>
                                <div class="news-item-text details pb-0" style="max-height: 100%">
                                    <a href="{{ url('berita/'.$data->slug) }}">
                                        <h3>{{ $data->judul }}</h3>
                                    </a>
                                    <div class="dates">
                                        <span class="date">{{ $data->created_at->format('D, d M Y') }} &nbsp;</span>
                                    </div>
                                    <div class="news-item-descr big-news details visib mb-0">
                                        {!! $data->konten !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-3 col-md-12">
                    <div class="widget">
                        <div class="recent-post pt-5">
                            <h5 class="font-weight-bold mb-4">Recent Posts</h5>
                            @foreach ($berita as $item)
                                <div class="recent-main row">
                                    <div class="recent-img col-5">
                                        <a href="{{ url('berita/'.$item->slug) }}"><img
                                                src="{{ asset('storage/images/' . $item->foto_header) }}" alt="" style="object-fit: cover; object-position: center center"></a>
                                    </div>
                                    <div class="info-img col-7" style="padding: 0 0 10px 0">
                                        <a href="{{ url('berita/'.$item->slug) }}">
                                            <h6>{{ $item->judul }}</h6>
                                        </a>
                                        <p>May 10, 2020</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

@endsection
