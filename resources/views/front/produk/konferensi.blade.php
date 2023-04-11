@extends('front.layouts.default')

@section('title', 'Konferensi - Vokasi UNS')

@section('sec-title', 'Konferensi')

@section('content')

    @include('front.layanan.header')

    <section class="how-it-works bg-white">
        <div class="container">
            <table class="basic-table" data-aos="fade-up" data-aos-delay="150">
                <tr>
                    <th>No</th>
                    <th>Nama Konferensi</th>
                    <th>Link</th>
                    <th>Program Studi</th>
                    <th>Deskripsi</th>
                </tr>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td><a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">{{ $item->link }}</a> </td>
                        <td>{{ $item->program_studi }}</td>
                        <td>{{ $item->deskripsi }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>

@endsection
