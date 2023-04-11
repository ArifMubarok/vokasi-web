@extends('front.layouts.default')

@section('title', 'Profil - Vokasi UNS')

@section('sec-title', 'Profil Pimpinan')

@section('content')

    @include('front.tentang-kami.header')

    <section class="how-it-works bg-white">
        <div class="container text-justify">
            @foreach ($dekan as $item)
                @if ($item->id % 2 == 1)
                    <div class="row my-5">
                        <div class="col-lg-4 col-md-6 col-sm-12 px-4">
                            <img class="resp-img pb-4" src="{{ asset('storage/images/profil-pimpinan/' . $item->foto) }}"
                                alt="Profil Image" style="max-height: 400px">
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12 px-4">
                            <h3 style="font-size: 22px">{{ $item->name }}</h3>
                            <h4 style="font-size: 19px">{{ $item->kedudukan }}</h4>
                            <p style="font-size: 18px">{!! $item->profil !!}</p>
                        </div>
                    </div>
                @else
                    <div class="row my-5" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-lg-8 col-md-6 col-sm-12 px-4">
                            <h3 style="font-size: 22px">{{ $item->name }}</h3>
                            <h4 style="font-size: 19px">{{ $item->kedudukan }}</h4>
                            <p style="font-size: 18px">{!! $item->profil !!}</p>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 px-4" style="text-align: end">
                            <img class="resp-img pb-4" src="{{ asset('storage/images/profil-pimpinan/' . $item->foto) }}"
                                alt="Profil Image" style="max-height: 400px">
                        </div>
                    </div>
                @endif
            @endforeach
            {{-- <div class="row my-5" data-aos="fade-up" data-aos-delay="150">
                <div class="col-lg-4 col-md-6 col-sm-12 px-4">
                    <img class="resp-img pb-4" src="{{ asset('home-estate') }}/images/blog/b-4.jpg" alt="Profil Image">
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 px-4">
                    <h3 style="font-size: 22px">Nama</h3>
                    <h4 style="font-size: 19px">title</h4>
                    <p style="font-size: 18px">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut velit libero
                        harum quidem ab animi voluptatem? Dignissimos dolorum ratione voluptate eveniet a aliquid dolores
                        expedita iure voluptates beatae delectus officiis odit, illum et in ea temporibus est sequi commodi
                        ab harum, adipisci accusamus. Culpa doloremque amet sed a enim maxime ea minus, ab pariatur suscipit
                        quidem minima, exercitationem voluptas reprehenderit nam veniam ipsam dolores nemo illum possimus
                        quaerat! Quod qui magni ut nobis officiis odio tempore unde. Quam, nihil perferendis obcaecati ipsa
                        dolorem asperiores consequatur molestias exercitationem pariatur voluptatibus, minima voluptatum!
                        Minus illum tenetur expedita, rerum cumque sit doloremque magnam tempora laborum commodi dolores
                        minima maxime velit eum veritatis consequatur vel explicabo voluptatem beatae quas iste ullam!
                        Beatae sapiente molestiae rem inventore, dignissimos nam ab adipisci fugit laudantium consequuntur,
                        natus aperiam tenetur! Adipisci error vero ea. Ea, doloribus cumque tempora natus sunt labore
                        praesentium earum, quisquam ex id provident facere possimus repudiandae iusto nesciunt pariatur.
                        Atque voluptas, laboriosam assumenda molestiae praesentium excepturi quos id eveniet facere maxime.
                        Quod sapiente quam fugit aliquam qui nisi. Blanditiis, ducimus? Sequi sed veritatis, sint iure
                        consequuntur repudiandae. Ullam saepe ipsam ipsa totam est hic, quos at consequatur ut, nesciunt
                        commodi, earum in esse mollitia.</p>
                </div>
            </div>
            <div class="row my-5" data-aos="fade-up" data-aos-delay="150">
                <div class="col-lg-8 col-md-6 col-sm-12 px-4">
                    <h3 style="font-size: 22px">Nama</h3>
                    <h4 style="font-size: 19px">title</h4>
                    <p style="font-size: 18px">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut velit libero
                        harum quidem ab animi voluptatem? Dignissimos dolorum ratione voluptate eveniet a aliquid dolores
                        expedita iure voluptates beatae delectus officiis odit, illum et in ea temporibus est sequi commodi
                        ab harum, adipisci accusamus. Culpa doloremque amet sed a enim maxime ea minus, ab pariatur suscipit
                        quidem minima, exercitationem voluptas reprehenderit nam veniam ipsam dolores nemo illum possimus
                        quaerat! Quod qui magni ut nobis officiis odio tempore unde. Quam, nihil perferendis obcaecati ipsa
                        dolorem asperiores consequatur molestias exercitationem pariatur voluptatibus, minima voluptatum!
                        Minus illum tenetur expedita, rerum cumque sit doloremque magnam tempora laborum commodi dolores
                        minima maxime velit eum veritatis consequatur vel explicabo voluptatem beatae quas iste ullam!
                        Beatae sapiente molestiae rem inventore, dignissimos nam ab adipisci fugit laudantium consequuntur,
                        natus aperiam tenetur! Adipisci error vero ea. Ea, doloribus cumque tempora natus sunt labore
                        praesentium earum, quisquam ex id provident facere possimus repudiandae iusto nesciunt pariatur.
                        Atque voluptas, laboriosam assumenda molestiae praesentium excepturi quos id eveniet facere maxime.
                        Quod sapiente quam fugit aliquam qui nisi. Blanditiis, ducimus? Sequi sed veritatis, sint iure
                        consequuntur repudiandae. Ullam saepe ipsam ipsa totam est hic, quos at consequatur ut, nesciunt
                        commodi, earum in esse mollitia.</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 px-4">
                    <img class="resp-img pb-4" src="{{ asset('home-estate') }}/images/blog/b-4.jpg" alt="Profil Image">
                </div>
            </div> --}}
            {{-- Senat Akademik Start --}}
            <div class="my-5">
                <div class="sec-title mb-4" style="background-color: #FFD800; padding: 25px 0" data-aos="fade-up"
                    data-aos-delay="150">
                    <h2><span></span>Senat Akademik</h2>
                </div>
                <div class="row px-2" data-aos="fade-up" data-aos-delay="250">
                    @foreach ($senat as $item)
                        <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-10">
                                    <img class="resp-img pb-4"
                                        src="{{ asset('storage/images/profil-pimpinan/' . $item->foto) }}"
                                        alt="Profil Image" style="max-height: 200px">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <h3>{{ $item->name }}</h3>
                                    <h4>{{ $item->kedudukan }}</h4>
                                    <p>{!! $item->profil !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Senat Akademik End --}}
            {{-- Koordinator Start --}}
            <div class="my-5">
                <div class="sec-title mb-4" style="background-color: #FFD800; padding: 25px 0" data-aos="fade-up"
                    data-aos-delay="150">
                    <h2><span></span>Koordinator</h2>
                </div>
                <div class="row px-2" data-aos="fade-up" data-aos-delay="250">
                    @foreach ($koordinator as $item)
                        <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-10">
                                    <img class="resp-img pb-4"
                                        src="{{ asset('storage/images/profil-pimpinan/' . $item->foto) }}"
                                        alt="Profil Image" style="max-height: 200px">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <h3>{{ $item->name }}</h3>
                                    <h4>{{ $item->kedudukan }}</h4>
                                    <p>{!! $item->profil !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Koordinator End --}}
            {{-- Penjaminan Mutu Start --}}
            <div class="my-5">
                <div class="sec-title mb-4" style="background-color: #FFD800; padding: 25px 0" data-aos="fade-up"
                    data-aos-delay="150">
                    <h2><span></span>Penjaminan Mutu</h2>
                </div>
                <div class="row px-2" data-aos="fade-up" data-aos-delay="250">
                    @foreach ($penjamin as $item)
                        <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-10">
                                    <img class="resp-img pb-4"
                                        src="{{ asset('storage/images/profil-pimpinan/' . $item->foto) }}"
                                        alt="Profil Image" style="max-height: 200px">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <h3>{{ $item->name }}</h3>
                                    <h4>{{ $item->kedudukan }}</h4>
                                    <p>{!! $item->profil !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Penjaminan Mutu End --}}
            {{-- Unsur Lain Start --}}
            <div class="my-5">
                <div class="sec-title mb-4" style="background-color: #FFD800; padding: 25px 0" data-aos="fade-up"
                    data-aos-delay="150">
                    <h2><span></span>Unsur Lain</h2>
                </div>
                <div class="row px-2" data-aos="fade-up" data-aos-delay="250">
                    @foreach ($lain as $item)
                        <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-10">
                                    <img class="resp-img pb-4"
                                        src="{{ asset('storage/images/profil-pimpinan/' . $item->foto) }}"
                                        alt="Profil Image" style="max-height: 200px">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <h3>{{ $item->name }}</h3>
                                    <h4>{{ $item->kedudukan }}</h4>
                                    <p>{!! $item->profil !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Unsur Lain End --}}
            {{-- Kepala Program Studi Start --}}
            {{-- <div class="my-5">
                <div class="sec-title mb-4" style="background-color: #FFD800; padding: 25px 0" data-aos="fade-up"
                    data-aos-delay="150">
                    <h2><span>Kepala</span> Program Studi</h2>
                </div>
                <div class="row px-2" data-aos="fade-up" data-aos-delay="250">
                    <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <img class="resp-img pb-4" src="{{ asset('home-estate') }}/images/blog/b-4.jpg"
                                    alt="Profil Image">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h3>Nama</h3>
                                <h4>title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint in voluptatum quis nemo
                                    voluptatem tenetur facere amet, quod fuga distinctio esse deserunt dolor! Veritatis,
                                    magni, libero rem placeat at, eius dicta temporibus minus autem excepturi provident
                                    quisquam delectus! Dolore, error.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <img class="resp-img pb-4" src="{{ asset('home-estate') }}/images/blog/b-4.jpg"
                                    alt="Profil Image">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h3>Nama</h3>
                                <h4>title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint in voluptatum quis nemo
                                    voluptatem tenetur facere amet, quod fuga distinctio esse deserunt dolor! Veritatis,
                                    magni, libero rem placeat at, eius dicta temporibus minus autem excepturi provident
                                    quisquam delectus! Dolore, error.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <img class="resp-img pb-4" src="{{ asset('home-estate') }}/images/blog/b-4.jpg"
                                    alt="Profil Image">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h3>Nama</h3>
                                <h4>title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint in voluptatum quis nemo
                                    voluptatem tenetur facere amet, quod fuga distinctio esse deserunt dolor! Veritatis,
                                    magni, libero rem placeat at, eius dicta temporibus minus autem excepturi provident
                                    quisquam delectus! Dolore, error.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- Kepala Program Studi End --}}
            {{-- Kepala Laboratorium Start --}}
            <div class="my-5">
                <div class="sec-title mb-4" style="background-color: #FFD800; padding: 25px 0" data-aos="fade-up"
                    data-aos-delay="150">
                    <h2><span></span>Kepala Laboratorium</h2>
                </div>
                <div class="row px-2" data-aos="fade-up" data-aos-delay="250">
                    @foreach ($labor as $item)
                        <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-10">
                                    <img class="resp-img pb-4"
                                        src="{{ asset('storage/images/profil-pimpinan/' . $item->foto) }}"
                                        alt="Profil Image" style="max-height: 200px">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <h3>{{ $item->name }}</h3>
                                    <h4>{{ $item->kedudukan }}</h4>
                                    <p>{!! $item->profil !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Kepala Laboratorium End --}}
        </div>
    </section>

@endsection
