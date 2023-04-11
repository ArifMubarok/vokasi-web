<?php
$d1 = $d2 = $d3 = $d4 = false;
    foreach ($prodis as $prodi):
        switch ($prodi->tingkat) {
            case '1':
                $d1 = true;
                break;
            case '2':
                $d2 = true;
                break;
            case '3':
                $d3 = true;
                break;
            case '4':
                $d4 = true;
                break;
        }
    endforeach;
?>

@extends('front.layouts.default')

@section('title', 'Program Studi - Vokasi UNS')

@section('sec-title', 'Program Studi')

@section('content')


    {{-- Header Content Start --}}
    @include('front.tentang-kami.header')
    {{-- Header Content End --}}
    
    {{-- <section class="how-it-works bg-white">
        <div class="container text-justify">
            <div class="sec-title mb-4" style="background-color: #f55d2c; padding: 25px 0" data-aos="fade-up" data-aos-delay="150">
                <h2><span>Program Studi</span> Diploma 3 </h2>
            </div>
            <div class="row my-5">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="{{ url('detail-prodi') }}" style="text-decoration: none">
                        <div class="card" style="border-width: 2px 2px 2px 2px; border-color:#f55d2c; border-radius:0.3rem">
                            <img class="resp-img card-img-top" src="{{ asset('home-estate') }}/images/blog/b-4.jpg" alt="Profil Image">
                            <div class="card-footer text-center" style="background-color: #f55d2c">
                                <h5 style="color: black">Nama Prodi</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- List Program Studi D4 Start --}}
    @if ($d4 == true)
    @include('front.program-studi.diploma4')
    @endif
    @if ($d3 == true)
    @include('front.program-studi.diploma3')
    @endif
    @if ($d2 == true)
    @include('front.program-studi.diploma2')
    @endif
    @if ($d1 == true)
    @include('front.program-studi.diploma1')
    @endif

    
    @endsection