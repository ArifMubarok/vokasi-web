@extends('front.layouts.default')

@section('title', 'Visi, Misi & Tujuan - Vokasi UNS')

@section('sec-title', 'Visi, Misi & Tujuan')

@section('content')
    
    @include('front.tentang-kami.header')

    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="250" style="padding: 20px 20px">
                    <img src="{{ asset('storage/images/visi-misi-tujuan/' . $gambar->value) }}" alt="">
                </div>
            </div>
            {{-- Visi dan Misi Start --}}
            <div class="row my-4">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="sec-title" data-aos="fade-up" data-aos-delay="250">
                        <h2 style="font-weight: 700;color: #274abb">Visi</h2>
                        <hr class="short" data-zanim-xs="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}" style="width: 15rem; opacity: 1;">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12" data-aos="fade-up" data-aos-delay="250">
                        {!! $visi->value !!}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="sec-title" data-aos="fade-up" data-aos-delay="250">
                        <h2 style="font-weight: 700;color: #274abb">Misi</h2>
                        <hr class="short" data-zanim-xs="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}" style="width: 15rem; opacity: 1;">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12" data-aos="fade-up" data-aos-delay="250">
                        {!! $misi->value !!}
                    </div>
                </div>
            </div>
            {{-- Visi dan Misi End --}}

            {{-- Tujuan Start --}}
            <div>
                <div class="sec-title" data-aos="fade-up" data-aos-delay="250">
                    <h2 style="font-weight: 700;color: #274abb">Tujuan</h2>
                    <hr class="short" data-zanim-xs="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}" style="width: 15rem; opacity: 1;">
                </div>
                <div class="row mt-3 p-2" style="font-size: 17px">
                    <div class="col-lg-12 col-md-12 col-sm-12" data-aos="fade-up" data-aos-delay="250">
                        {!! $tujuan->value !!}
                    </div>
                </div>
            </div>
            {{-- Tujuan End --}}
            {{-- Strategi Pencapaian Visi, Misi, dan Tujuan Start --}}
            <div>
                <div class="sec-title" data-aos="fade-up" data-aos-delay="250">
                    <h2 style="font-weight: 700;color: #274abb">Strategi Pencapaian Visi, Misi, dan Tujuan</h2>
                    <hr class="short" data-zanim-xs="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}" style="width: 15rem; opacity: 1;">
                </div>
                <div class="row mt-3 p-2" style="font-size: 17px">
                    <div class="col-lg-12 col-md-12 col-sm-12" data-aos="fade-up" data-aos-delay="250">
                        {!! $strategi->value !!}
                    </div>
                </div>
            </div>
            {{-- Strategi Pencapaian Visi, Misi, dan Tujuan End --}}
        </div>
    </section>
@endsection