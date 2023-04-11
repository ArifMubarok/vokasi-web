@extends('front.layouts.default')

@section('title', 'Sumber Daya Manusia - Vokasi UNS')

@section('sec-title', 'Sumber Daya Manusia')

@section('content')

    @include('front.tentang-kami.header')

    <section class="how-it-works bg-white counterup">
        <div class="container text-justify">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12" style="align-items: center" data-aos="fade-up" data-aos-delay="150">
                    <div class="countr">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left">6470</p>
                            <h3>Mahasiswa</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="150">
                    <div class="countr">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left">6470</p>
                            <h3>Mahasiswa</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                @if (!isset($sdm[0]))
                    <p>Data Null</p>
                @else
                    @foreach ($sdm as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12 py-4">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img class="resp-img pb-4"
                                        src="{{ asset('storage/images/sdm/' . $item->foto) }}"
                                        alt="Profil Image" style="max-height: 200px">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <h3 style="font-weight: bold">{{ $item->name }}</h3>
                                    <p style="color: #333">Sub Unit : {{ $item->unit }} </p>
                                    <p style="color: #333">Jabatan Fungsional : {{ $item->jabatan }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
