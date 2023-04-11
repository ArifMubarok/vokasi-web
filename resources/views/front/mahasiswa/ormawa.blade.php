@extends('front.layouts.default')

@section('title', 'Ormawa - Vokasi UNS')

@section('sec-title', 'Ormawa')

@section('content')
    
    @include('front.layanan.header')
    
    <section class="how-it-works bg-white">
        <div class="container text-justify">
            <div class="row">
               @foreach ($data as $item)
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <img class="resp-img pb-4" src="{{asset('storage/mahasiswa/ormawa/logo/'.$item->logo)}}" alt="Profil Image">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h3>{{$item->name}}</h3>
                                <p>{{$item->deskripsi}}</p>
                            </div>
                        </div>
                    </div>
               @endforeach 
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <img class="resp-img pb-4" src="{{ asset('home-estate') }}/images/blog/b-4.jpg" alt="Profil Image">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h3>Nama Ormawa</h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil quam provident libero voluptate necessitatibus, dolor est quaerat laboriosam alias. Quaerat labore hic excepturi assumenda nobis rerum, praesentium temporibus quisquam doloremque.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <img class="resp-img pb-4" src="{{ asset('home-estate') }}/images/blog/b-4.jpg" alt="Profil Image">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h3>Nama Ormawa</h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil quam provident libero voluptate necessitatibus, dolor est quaerat laboriosam alias. Quaerat labore hic excepturi assumenda nobis rerum, praesentium temporibus quisquam doloremque.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <img class="resp-img pb-4" src="{{ asset('home-estate') }}/images/blog/b-4.jpg" alt="Profil Image">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h3>Nama Ormawa</h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil quam provident libero voluptate necessitatibus, dolor est quaerat laboriosam alias. Quaerat labore hic excepturi assumenda nobis rerum, praesentium temporibus quisquam doloremque.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection