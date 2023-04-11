<section class="how-it-works bg-white">
    <div class="container text-justify">
        <div class="sec-title mb-4" style="background-color: #FFD800; padding: 25px 0" data-aos="fade-up"
            data-aos-delay="150">
            <h2 style="color: #444"><span></span>Program Studi Diploma 1 </h2>
        </div>
        <div class="row my-5">
            @foreach ($prodis as $prodi)
                @if ($prodi->tingkat == 1)
                    <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up">
                        <a href="{{ route('program-studi.show', $prodi->slug) }}" style="text-decoration: none">
                            <div class="card">
                                <div style="text-align: center">
                                    <img class="resp-img card-img-top" src="{{ isset($prodi->logo) ? asset('storage/settings/prodi/logo/'.$prodi->logo) : asset('home-estate/images/blog/b-4.jpg') }}"
                                        alt="Profil Image" style="height: 200px;width: 200px;">
                                </div>
                                <div class="card-footer text-center" style="background-color: #FFD800">
                                    <h5 style="color: #444">{{ $prodi->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>