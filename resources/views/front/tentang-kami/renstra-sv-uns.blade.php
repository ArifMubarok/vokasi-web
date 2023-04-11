@extends('front.layouts.default')

@section('title', 'Renstra - Vokasi UNS')

@section('sec-title', 'Renstra')

@section('content')

    @include('front.tentang-kami.header')

    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <div class="sec-title" data-aos="fade-up" data-aos-delay="150">
                <h2 style="font-weight: 700;color: #274abb">Renstra SV</h2>
                <hr class="short"
                    data-zanim-xs="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}"
                    style="width: 15rem; opacity: 1;">
            </div>
            {{-- <div class="row p-3">
                @foreach ($data as $item)
                    <div class="col-lg-9 col-md-6 col-sm-6 my-3">
                        <h4 style="font-size: 20px">{{ $item->konten->name }}</h4>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6  ui-buttons">
                        <a href="{{ route('renstra-sv.show', $item->konten->value) }}"
                            class="btn btn-secondary btn-outline btn-anis" target="_blank"
                            rel="noopener noreferrer">Download</a>
                    </div>
                @endforeach
            </div> --}}
            <div class="row p-3">
                @foreach ($data as $item)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img class="card-img img-fluid rounded-start" src="{{ asset('storage/content/renstra/cover/'.$item->cover) }}" alt="" style="min-height: 181px;height: auto; object-fit: cover; object-position: center center">
                                </div>
                                <div class="col-md-6" style="padding-left: 0px">
                                    <div class="card-body">
                                        <div class="h-100">
                                            <h3 class="card-title">{{$item->name}}</h5>
                                            <p class="card-text">{{$item->deskripsi}}</p>
                                        </div>
                                        <div class="ui-buttons pt-3">
                                            <a href="{{ route('renstra-sv.show', $item->name) }}"
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
    </section>




@endsection
