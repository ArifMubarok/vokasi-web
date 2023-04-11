@extends('front.layouts.default')

@section('title',  $data->judul . ' - Vokasi UNS')

@section('sec-title', $data->judul)

@section('content')

    @include('front.layanan.header')

    <section class="blog blog-section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 blog-pots">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="news-item details no-mb2">
                                <div class="news-item-img">
                                    <img class="img-responsive"
                                        src="{{ asset('storage/images/info-penting/header/' . $data->foto_header) }}" alt="blog image" style="width: 100%">
                                </div>
                                <div class="news-item-text details pb-0">
                                    <div>
                                        <h3>{{ $data->judul }}</h3>
                                    </div>
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
            </div>
        </div>
    </section>

@endsection
