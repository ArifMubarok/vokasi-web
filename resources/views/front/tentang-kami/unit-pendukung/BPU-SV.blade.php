@extends('front.layouts.default')

@section('title', 'BPU SV - Vokasi UNS')

@section('sec-title', 'BPU')

@section('content')

    @include('front.tentang-kami.header')

    <section class="how-it-works bg-white">
        <div class="container text-justify">
            @if (!isset($isibpu->value))
                <h5 class="text-center">Data Null</h5>
            @else
                <h5>{!! $isibpu->value !!}</h5>
            @endif
        </div>
    </section>

@endsection
