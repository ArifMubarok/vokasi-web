@extends('front.layouts.default')

@section('title', 'IKASV - Vokasi UNS')

@section('sec-title', 'IKASV')

@section('content')
    
    @include('front.layanan.header')
    
    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <table class="basic-table" data-aos="fade-up" data-aos-delay="150">
                <tr>
                    <th>Nama Prodi</th>
                    <th>Nama Grup Riset</th>
                    <th>Nama Dosen</th>
                </tr>
                <tr>
                    <td>Item</td>
                    <td>Description</td>
                    <td>Description</td>
                </tr>
            </table>
        </div>
    </section>

@endsection