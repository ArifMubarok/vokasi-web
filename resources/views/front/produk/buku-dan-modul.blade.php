@extends('front.layouts.default')

@section('title', 'Buku dan Modul - Vokasi UNS')

@section('sec-title', 'Buku dan Modul')

@section('content')

    @include('front.layanan.header')

    <section class="how-it-works bg-white">
        <div class="container text-justify">
            @foreach ($data as $item)
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img class="card-img img-fluid rounded-start"
                                    src="{{ asset('storage/images/bukudanmodul/' . $item->cover) }}" alt=""
                                    style="height: auto; object-fit: cover; object-position: center center">
                            </div>
                            <div class="col-md-6" style="padding-left: 0px">
                                <div class="card-body">
                                    <div class="h-100">
                                        <h3 class="card-title">{{ $item->judul }}</h5>
                                            <p class="card-text">{!! Str::words($item->deskripsi, 15, '...') !!}</p>
                                    </div>
                                    <div class="ui-buttons pt-3">
                                        <a href="{{ $item->link }}"
                                            class="btn btn-secondary btn-anis" target="_blank"
                                            rel="noopener noreferrer">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
