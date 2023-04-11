@extends('front.layouts.default')

@section('title', 'Buku Pedoman - Vokasi UNS')

@section('sec-title', 'Buku Pedoman')

@section('content')
    
    @include('front.layanan.header')
    
    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <div>
                <div class="sec-title" data-aos="fade-up" data-aos-delay="150">
                    <h2 style="font-weight: 700;color: #274abb">Buku Pedoman</h2>
                    <hr class="short" data-zanim-xs="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}" style="width: 15rem; opacity: 1;">
                </div>
                <div class="row p-3">
                    @foreach ($data as $item)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img class="card-img img-fluid rounded-start" style="height: auto; object-fit: cover; object-position: center center" src="{{ asset('storage/content/buku-pedoman/cover/'.$item->cover) }}" alt="">
                                </div>
                                <div class="col-md-6" style="padding-left: 0px">
                                    <div class="card-body">
                                        <div class="h-100">
                                            <h3 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">{{ $item->deskripsi }}</p>
                                        </div>
                                        <div class="ui-buttons pt-3">
                                            <a href="{{ route('buku-pedoman.show', $item->name) }}"
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
            </div>
        </div>
    </section>

@endsection