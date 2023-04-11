@extends('front.layouts.default')

@section('title', 'Grup Riset - Vokasi UNS')

@section('sec-title', 'Grup Riset')

@section('content')
    
    @include('front.layanan.header')
    
    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <ul class="accordion accordion-1 one-open pt-3">
                @foreach ($data as $item)
                <li>
                    <div class="title text-left">
                        <span>{{ $item->nama }}</span>
                    </div>
                    <div class="content">
                        <p class="py-0">Prodi : D{{ Str::upper($item->prodi->tingkat) }} {{ $item->prodi->name }}</p>
                        <p class="py-0">Anggota : </p>
                        {!! $item->anggota !!}
                    </div>
                </li>
                @endforeach
                
                <li class="active">
                    <div class="title text-left">
                        <span>Nama Grup Riset</span>
                    </div>
                    <div class="content">
                        <p class="py-0">Prodi : D3 TI</p>
                        <p class="py-0">Anggota : </p>
                        <ol>
                            <li>1</li>
                            <li>1</li>
                            <li>1</li>
                            <li>1</li>
                        </ol>
                        <p class="py-0">Nama Dosen : </p>
                        <ol>
                            <li>1</li>
                            <li>1</li>
                            <li>1</li>
                            <li>1</li>
                        </ol>
                    </div>
                </li>
                <li>
                    <div class="title text-left">
                        <span>Nama Grup Riset</span>
                    </div>
                    <div class="content">
                        <p class="py-0">Prodi : D3 TI</p>
                        <p class="py-0">Anggota : </p>
                        <ol>
                            <li>1</li>
                            <li>1</li>
                            <li>1</li>
                            <li>1</li>
                        </ol>
                        <p class="py-0">Nama Dosen : </p>
                        <ol>
                            <li>1</li>
                            <li>1</li>
                            <li>1</li>
                            <li>1</li>
                        </ol>
                    </div>
                </li>
                
            </ul>
        </div>
    </section>

@endsection