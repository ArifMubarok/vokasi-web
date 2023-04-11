@extends('front.layouts.default')

@section('title', 'Program Studi SV')

@section('content')
    
    {{-- Header Content Start --}}
    <div class="container-fluid mb-5 py-5 wow fadeIn" data-wow-delay="0.1s" data-parallax="scroll" data-image-src="{{ asset('assets/gardener') }}/img/carousel-2.jpg" style="height:400px">
        <div class="container py-5 text-center">
            <div class="row my-3">
                <div class="col-10 offset-1">
                    <h1 class="text-white display-3">{{ $data->prodi->name }}</h1>
                    <nav aria-label="breadcrumb animated slideInDown" class="text-white">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="#" class="text-white">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- Header Content End --}}


    {{-- Kaprodi Start --}}
    <div class="container-fluid pt-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="{{ asset('assets/gardener') }}/img/logo-sv.png" alt="" width="100%" style="object-fit: cover; object-position: center center">
                    <h5 class="text-center">Nama Dosen</h5>
                    <p class="text-center"><em>Jabatan</em></p>
                </div>
                <div class="col-10 px-5">
                    <p>{!! $data->sambutan !!}</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Kaprodi End --}}

    {{-- Prodi Overview Start --}}
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-5">Gambaran Umum Prodi</h2>
                    <hr class="border-3" style="width: 50%">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, nihil, blanditiis iste non dolorum possimus dolore vel ad commodi eveniet itaque delectus tempore accusamus magni numquam nobis quisquam perferendis aliquam quasi! Eos nostrum adipisci harum aperiam similique qui. Nostrum non illo perspiciatis fugit accusamus cum aliquam placeat magni blanditiis deleniti.</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, nihil, blanditiis iste non dolorum possimus dolore vel ad commodi eveniet itaque delectus tempore accusamus magni numquam nobis quisquam perferendis aliquam quasi! Eos nostrum adipisci harum aperiam similique qui. Nostrum non illo perspiciatis fugit accusamus cum aliquam placeat magni blanditiis deleniti.</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, nihil, blanditiis iste non dolorum possimus dolore vel ad commodi eveniet itaque delectus tempore accusamus magni numquam nobis quisquam perferendis aliquam quasi! Eos nostrum adipisci harum aperiam similique qui. Nostrum non illo perspiciatis fugit accusamus cum aliquam placeat magni blanditiis deleniti.</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Prodi Overview End --}}

    {{-- Keuntungan dan Spesifikasi Prodi Start --}}
    <div class="container-fluid my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-5">Keuntungan dan Spesifikasi Prodi</h2>
                    <hr class="border-3" style="width: 50%">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod dolores ab, repellendus sapiente numquam officia? Aspernatur odio inventore architecto ut perspiciatis quos magnam nihil dolor voluptatum minima soluta commodi nostrum, a natus molestiae amet harum dolorem quaerat ea id saepe numquam. Aliquam sit repudiandae, architecto illo, officia molestias at voluptatibus dolorum quis quidem aspernatur quasi obcaecati rem pariatur voluptate vel repellendus dolorem praesentium itaque temporibus hic eveniet adipisci ex nihil. Distinctio ullam similique non nemo fuga aut, optio labore molestiae! Neque minima, hic eos, sit, odit nisi deleniti tempore consequatur rerum magnam unde maiores cupiditate. Corrupti itaque tempora voluptate consectetur, quia optio esse nobis perspiciatis odit laborum aut. Culpa voluptates, provident similique magnam nihil ipsum impedit ab a vero praesentium.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod dolores ab, repellendus sapiente numquam officia? Aspernatur odio inventore architecto ut perspiciatis quos magnam nihil dolor voluptatum minima soluta commodi nostrum, a natus molestiae amet harum dolorem quaerat ea id saepe numquam. Aliquam sit repudiandae, architecto illo, officia molestias at voluptatibus dolorum quis quidem aspernatur quasi obcaecati rem pariatur voluptate vel repellendus dolorem praesentium itaque temporibus hic eveniet adipisci ex nihil. Distinctio ullam similique non nemo fuga aut, optio labore molestiae! Neque minima, hic eos, sit, odit nisi deleniti tempore consequatur rerum magnam unde maiores cupiditate. Corrupti itaque tempora voluptate consectetur, quia optio esse nobis perspiciatis odit laborum aut. Culpa voluptates, provident similique magnam nihil ipsum impedit ab a vero praesentium.</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Keuntungan dan Spesifikasi Prodi End --}}

    {{-- Visi Start --}}
    <div class="container-fluid">
        <div class="container text-center">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-5">Visi</h2>
                    <hr class="border-3" style="width: 50%">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h3>” To be a center for the development of the quality of human resources in the field of information technology that is sustainable and superior at the international level by 2045 based on the noble values of national culture. “</h3>
                </div>
            </div>
        </div>
    </div>
    {{-- Visi End --}}

    {{-- Misi dan Tujuan Start --}}
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="display-5">Misi</h2>
                    <hr class="border-3" style="width: 50%">
                </div>
                <div class="col-6">
                    <h2 class="display-5">Tujuan</h2>
                    <hr class="border-3" style="width: 50%">
                </div>
            </div>
            <div class="row">
                <div class="col-6 px-2">
                    <ol>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus omnis dolores eos, nam adipisci officia! Laborum ex eligendi id placeat!</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id dolor laboriosam molestias ratione adipisci voluptates rerum fuga? Ratione sit aliquid consequuntur velit quae aut laboriosam necessitatibus, tempora delectus, soluta nostrum.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut consequuntur delectus magnam fugiat nesciunt modi eius voluptate perspiciatis laborum repellat iure, sed cum, error ipsam vitae ea? Molestias, incidunt optio reiciendis, eligendi odit quis ad aliquid iste, corrupti voluptatem culpa?</li>
                    </ol>
                </div>
                <div class="col-6 px-2">
                    <ol>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus omnis dolores eos, nam adipisci officia! Laborum ex eligendi id placeat!</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id dolor laboriosam molestias ratione adipisci voluptates rerum fuga? Ratione sit aliquid consequuntur velit quae aut laboriosam necessitatibus, tempora delectus, soluta nostrum.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut consequuntur delectus magnam fugiat nesciunt modi eius voluptate perspiciatis laborum repellat iure, sed cum, error ipsam vitae ea? Molestias, incidunt optio reiciendis, eligendi odit quis ad aliquid iste, corrupti voluptatem culpa?</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- Misi dan Tujuan End  --}}

    {{-- Profil Lulusan Start --}}
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-5">Profil Lulusan</h2>
                    <hr class="border-3" style="width: 50%">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae saepe quod expedita consectetur illum, in animi, assumenda error voluptate consequuntur laboriosam labore enim tenetur! Voluptates eaque laudantium soluta velit eum?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo rem voluptatibus officiis temporibus voluptates unde, accusamus at quasi odio illo totam, dolores hic voluptatum laudantium? Mollitia voluptatem ad distinctio excepturi.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus deserunt voluptatibus iusto tempora corporis illum at eum ullam voluptatum odio veniam, cum totam repudiandae eveniet iure ratione? Nobis, saepe sit maxime autem, dolorum possimus recusandae facere distinctio repellendus id ea voluptatem aliquam ex vel pariatur quam a optio eius laboriosam hic itaque quas laborum deleniti? Ab aperiam cumque sit voluptates laudantium alias, obcaecati, in, iusto quasi eius totam enim placeat harum inventore consequuntur accusantium suscipit modi! A modi cum perspiciatis ex nobis officia tenetur consequuntur totam, non facere dolore eius debitis magnam, voluptatum in fugit necessitatibus consequatur ipsa incidunt? Minus?</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Profil Lulusan End --}}

    {{-- List Dosen Start --}}
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-5">List Dosen</h2>
                    <hr class="border-3" style="width: 50%">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="row">
                        <div class="col-7">
                            <img src="{{ asset('assets/gardener') }}/img/dekan-sv.jpeg" class="img-fluid" alt="" style="height: 200px; object-fit: cover; object-position: center center">
                        </div>
                        <div class="col-5">
                            <h5>Nama Dosen</h5>
                            <p>Keterangan</p>
                            <a class="btn btn-outline-info" href="#">More info</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="row">
                        <div class="col-7">
                            <img src="{{ asset('assets/gardener') }}/img/dekan-sv.jpeg" class="img-fluid" alt="" style="height: 200px; object-fit: cover; object-position: center center">
                        </div>
                        <div class="col-5">
                            <h5>Nama Dosen</h5>
                            <p>Keterangan</p>
                            <a class="btn btn-outline-info" href="#">More info</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="row">
                        <div class="col-7">
                            <img src="{{ asset('assets/gardener') }}/img/dekan-sv.jpeg" class="img-fluid" alt="" style="height: 200px; object-fit: cover; object-position: center center">
                        </div>
                        <div class="col-5">
                            <h5>Nama Dosen</h5>
                            <p>Keterangan</p>
                            <a class="btn btn-outline-info" href="#">More info</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="row">
                        <div class="col-7">
                            <img src="{{ asset('assets/gardener') }}/img/dekan-sv.jpeg" class="img-fluid" alt="" style="height: 200px; object-fit: cover; object-position: center center">
                        </div>
                        <div class="col-5">
                            <h5>Nama Dosen</h5>
                            <p>Keterangan</p>
                            <a class="btn btn-outline-info" href="#">More info</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="row">
                        <div class="col-7">
                            <img src="{{ asset('assets/gardener') }}/img/dekan-sv.jpeg" class="img-fluid" alt="" style="height: 200px; object-fit: cover; object-position: center center">
                        </div>
                        <div class="col-5">
                            <h5>Nama Dosen</h5>
                            <p>Keterangan</p>
                            <a class="btn btn-outline-info" href="#">More info</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="row">
                        <div class="col-7">
                            <img src="{{ asset('assets/gardener') }}/img/dekan-sv.jpeg" class="img-fluid" alt="" style="height: 200px; object-fit: cover; object-position: center center">
                        </div>
                        <div class="col-5">
                            <h5>Nama Dosen</h5>
                            <p>Keterangan</p>
                            <a class="btn btn-outline-info" href="#">More info</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="row">
                        <div class="col-7">
                            <img src="{{ asset('assets/gardener') }}/img/dekan-sv.jpeg" class="img-fluid" alt="" style="height: 200px; object-fit: cover; object-position: center center">
                        </div>
                        <div class="col-5">
                            <h5>Nama Dosen</h5>
                            <p>Keterangan</p>
                            <a class="btn btn-outline-info" href="#">More info</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="row">
                        <div class="col-7">
                            <img src="{{ asset('assets/gardener') }}/img/dekan-sv.jpeg" class="img-fluid" alt="" style="height: 200px; object-fit: cover; object-position: center center">
                        </div>
                        <div class="col-5">
                            <h5>Nama Dosen</h5>
                            <p>Keterangan</p>
                            <a class="btn btn-outline-info" href="#">More info</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="row">
                        <div class="col-7">
                            <img src="{{ asset('assets/gardener') }}/img/dekan-sv.jpeg" class="img-fluid" alt="" style="height: 200px; object-fit: cover; object-position: center center">
                        </div>
                        <div class="col-5">
                            <h5>Nama Dosen</h5>
                            <p>Keterangan</p>
                            <a class="btn btn-outline-info" href="#">More info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- List Dosen End --}}

    {{-- List Staff Start --}}
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-5">List Staff</h2>
                    <hr class="border-3" style="width: 50%">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="row">
                        <div class="col-7">
                            <img src="{{ asset('assets/gardener') }}/img/dekan-sv.jpeg" class="img-fluid" alt="" style="height: 200px; object-fit: cover; object-position: center center">
                        </div>
                        <div class="col-5">
                            <h5>Nama Dosen</h5>
                            <p>Keterangan</p>
                            <a class="btn btn-outline-info" href="#">More info</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    {{-- List Staff End --}}

    {{-- Fasilitas Start --}}
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-5">Fasilitas</h2>
                    <hr class="border-3" style="width: 50%">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ol>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, magnam.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, magnam.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, magnam.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, magnam.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, magnam.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- Fasilitas End --}}

    {{-- Laboratorium Start --}}
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-5">Laboratorium</h2>
                    <hr class="border-3" style="width: 50%">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ol>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti debitis libero pariatur laborum, voluptatum doloribus illo tempore aspernatur perferendis?</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti debitis libero pariatur laborum, voluptatum doloribus illo tempore aspernatur perferendis?</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti debitis libero pariatur laborum, voluptatum doloribus illo tempore aspernatur perferendis?</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- Laboratorium End --}}
    
    {{-- Collaboration Start --}}
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-5">Kolaborasi / Kerjasama</h2>
                    <hr class="border-3" style="width: 50%">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <ul>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti debitis libero pariatur laborum, voluptatum doloribus illo tempore aspernatur perferendis?</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti debitis libero pariatur laborum, voluptatum doloribus illo tempore aspernatur perferendis?</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti debitis libero pariatur laborum, voluptatum doloribus illo tempore aspernatur perferendis?</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <ul>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti debitis libero pariatur laborum, voluptatum doloribus illo tempore aspernatur perferendis?</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti debitis libero pariatur laborum, voluptatum doloribus illo tempore aspernatur perferendis?</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti debitis libero pariatur laborum, voluptatum doloribus illo tempore aspernatur perferendis?</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <ul>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti debitis libero pariatur laborum, voluptatum doloribus illo tempore aspernatur perferendis?</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti debitis libero pariatur laborum, voluptatum doloribus illo tempore aspernatur perferendis?</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque deleniti debitis libero pariatur laborum, voluptatum doloribus illo tempore aspernatur perferendis?</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- Collaboration End --}}

    {{-- Testimoni Start --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <h2 class="display-5">Testimoni</h2>
                    <hr class="border-3" style="width: 50%">
                </div>
            </div>
            <div class="row">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item">
                            <img class="img-fluid rounded mb-3" src="{{ asset('assets/gardener') }}/img/testimonial-1.jpg" alt="">
                            <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.</p>
                            <h4>Client Name</h4>
                            <span>Profession</span>
                        </div>
                        <div class="testimonial-item">
                            <img class="img-fluid rounded mb-3" src="{{ asset('assets/gardener') }}/img/testimonial-2.jpg" alt="">
                            <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.</p>
                            <h4>Client Name</h4>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Testimoni End --}}


@endsection