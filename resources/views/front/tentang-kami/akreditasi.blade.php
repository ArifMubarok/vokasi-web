@extends('front.layouts.default')

@section('title', 'Akreditasi - Vokasi UNS')

@section('sec-title', 'Akreditasi')

@section('content')

    @include('front.tentang-kami.header')

    <section class="how-it-works bg-white">
        <div class="container">
            <h5 class="pb-5" data-aos="fade-up" data-aos-delay="150">Di tingkat Fakultas dan Program Studi telah dilakukan
                pengelolaan yang terintegrasi dengan baik yang dapat menjadi gambaran bahwa sistem pengelolaan program studi
                telah terlaksana dengan baik. Penjaminan mutu Program Studi di Sekolah Vokasi UNS berjalan dengan baik. Hal
                ini dibuktikan dengan telah dimilikinya peringkat akreditasi dari BAN PT dan LAM PT Kes.</h5>
            <table class="basic-table" data-aos="fade-up" data-aos-delay="150">
                <tr>
                    <th class="col-3">Program Studi</th>
                    <th class="col-2">Status Akreditasi</th>
                    <th class="col-4">Nomor Akreditasi</th>
                    <th class="col-3">Masa Berlaku</th>
                </tr>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->prodi }}</td>
                        <td>{{ $item->akreditasi }}</td>
                        <td>{{ $item->nomorAkreditas }}</td>
                        <td>{{ $item->masa }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>

@endsection
