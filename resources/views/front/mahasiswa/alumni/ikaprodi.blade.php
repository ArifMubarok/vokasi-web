@extends('front.layouts.default')

@section('title', 'IKAPRODI - Vokasi UNS')

@section('sec-title', 'IKAPRODI')

@section('content')

    @include('front.layanan.header')

    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <table class="basic-table" data-aos="fade-up" data-aos-delay="150">
                <tr>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Informasi</th>
                </tr>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->prodi->name }}</td>
                        <td><a href="{{ $item->informasi }}" target="_blank" rel="noopener noreferrer" >{{ $item->informasi }}</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>

@endsection
