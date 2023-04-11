@extends('front.layouts.default')

@section('title', 'Career Development Center - Vokasi UNS')

@section('sec-title', 'Career Development Center')

@section('content')

    @include('front.tentang-kami.header')

    <section class="how-it-works bg-white">
        <div class="container text-justify">
            @if (!isset($isicdc->value))
                <h5 class="text-center">Data Null</h5>
            @else
                <h5>{!! $isicdc->value !!}</h5>
            @endif
        </div>
    </section>

@endsection
