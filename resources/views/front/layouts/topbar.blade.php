<body class="homepage-9 hp-6 hd-white hmp7 mh ui-elements inner-pages">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
            <!-- Header -->
            <div id="header">
                <div class="container container-header d-flex justify-content-around">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->
                        <div id="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('logo-sv') }}/logo-sv.png" alt=""></a>
                        </div>
                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <!-- Left Side Content / End -->
                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li><a href="#">Tentang Kami</a>
                                <ul>
                                    <li><a href="{{ url('profil-sv') }}">Profil</a></li>
                                    <li><a href="{{ url('sejarah') }}">Sejarah Perkembangan</a></li>
                                    <li><a href="{{ url('visi-misi') }}">Visi, Misi & Tujuan</a></li>
                                    <li><a href="{{ url('renstra-sv') }}">Renstra SV UNS</a></li>
                                    <li><a href="{{ url('struktur-organisasi') }}">Struktur Organisasi</a></li>
                                    <li><a href="{{ url('senat-akademik-fakultas') }}">Senat Akademik Fakultas</a></li>
                                    <li><a href="{{ url('profil-pimpinan') }}">Profil Pimpinan</a></li>
                                    <li><a href="#">Unit Pendukung</a>
                                        <ul>
                                            <li><a href="{{ url('unit-pendukung/UPM-SV') }}">UPM-SV</a></li>
                                            <li><a href="{{ url('unit-pendukung/BPU-SV') }}">BPU-SV</a></li>
                                            <li><a href="{{ url('unit-pendukung/career-development-center') }}">Career Development Center-SV</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ url('sumber-daya-manusia') }}">Sumber Daya Manusia</a>
                                    <li><a href="{{ url('kerjasama') }}">Kerjasama</a>
                                    <li><a href="{{ url('akreditasi') }}">Akreditasi</a>
                                </ul>
                            </li>
                            <li><a href="{{ route('program-studi.index') }}">Program Studi</a></li>
                            <li><a href="#">Layanan</a>
                                <ul>
                                    <li><a href="#">Akademik</a>
                                        <ul>
                                            <li><a href="{{ url('kalender-akademik') }}">Kalender Akademik</a></li>
                                            <li><a href="{{ url('buku-pedoman') }}">Buku Pedoman</a></li>
                                            <li><a href="https://layanan.vokasi.uns.ac.id">Pelayanan Surat</a></li>
                                            <li><a href="https://ocw.uns.ac.id">Jadwal Kuliah</a></li>
                                            <li><a href="https://wisuda.uns.ac.id">Wisuda</a></li>
                                            <li><a href="https://layanan.vokasi.uns.ac.id/legalisir">Legalisir</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Non Akademik</a>
                                        <ul>
                                            <li><a href="{{ url('pinjam-ruang') }}">Pinjam Ruang</a></li>
                                            <li><a href="https://remunerasi.uns.ac.id/web">Remunerasi</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="https://layanan.vokasi.uns.ac.id">Layanan SV</a></li>
                                    <li><a href="#">Fasilitas Kampus</a>
                                        <ul>
                                            <li><a href="{{ url('fasilitas-gedung') }}">Fasilitas Gedung</a></li>
                                            <li><a href="{{ url('fasilitas-ruang') }}">Fasilitas Ruang</a></li>
                                            <li><a href="{{ url('fasilitas-laboratorium') }}">Fasilitas Laboratorium</a></li>
                                            <li><a href="{{ url('fasilitas-laboratorium-lapangan') }}">Fasilitas Laboratorium Lapangan</a></li>
                                            <li><a href="{{ url('fasilitas-uns') }}">Fasilitas UNS</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ url('download') }}">Download</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Produk</a>
                                <ul>
                                    <li><a href="{{ url('produk-unggulan') }}">Produk Unggulan</a></li>
                                    <li><a href="{{ url('grup-riset') }}">Grup Riset</a></li>
                                    <li><a href="{{ url('jurnal') }}">Jurnal</a></li>
                                    <li><a href="{{ url('konferensi') }}">Konferensi</a></li>
                                    <li><a href="{{ url('pengabdian-masyarakat') }}">Pengabdian Masyarakat</a></li>
                                    <li><a href="{{ url('haki-dan-paten') }}">Haki dan Paten</a></li>
                                    <li><a href="{{ url('penelitian-dosen') }}">Penelitian Dosen</a></li>
                                    <li><a href="{{ url('buku-dan-modul') }}">Buku dan Modul</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Mahasiswa</a>
                                <ul>
                                    <li><a href="https://hibahmbkm.integrasi.uns.ac.id">MBKM</a></li>
                                    <li><a href="https://pkm.uns.ac.id">PKM</a></li>
                                    <li><a href="{{ url('beasiswa') }}">Beasiswa</a></li>
                                    <li><a href="#">Alumni</a>
                                        <ul>
                                            <li><a href="{{ url('ikaprodi') }}">IKAPRODI</a></li>
                                            <li><a href="{{ url('ikauns') }}">IKAUNS</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ url('badan-eksekutif-mahasiswa') }}">Badan Eksekutif Mahasiswa</a></li>
                                    <li><a href="{{ url('ormawa') }}">Ormawa</a></li>
                                    <li><a href="{{ url('pmb-uns') }}">PMB UNS</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- Main Navigation / End -->

                    <!-- Right Side Content / End -->
                    {{-- <div class="right-side d-none d-none d-lg-none d-xl-flex">
                        
                    </div> --}}
                    <!-- Right Side Content / End -->

                    {{-- <!-- Right Side Content / End -->
                    <div class="header-user-menu user-menu add">
                        <div class="header-user-name">
                            <span><img src="{{ asset('home-estate') }}/images/testimonials/ts-1.jpg" alt=""></span>Hi, Mary!
                        </div>
                        <ul>
                            <li><a href="user-profile.html"> Edit profile</a></li>
                            <li><a href="add-property.html"> Add Property</a></li>
                            <li><a href="payment-method.html">  Payments</a></li>
                            <li><a href="change-password.html"> Change Password</a></li>
                            <li><a href="#">Log Out</a></li>
                        </ul>
                    </div>
                    <!-- Right Side Content / End -->

                    <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0">
                        <!-- Header Widget -->
                        <div class="header-widget sign-in">
                            <div class="show-reg-form modal-open"><a href="#">Sign In</a></div>
                        </div>
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End --> --}}

                    <!-- lang-wrap-->
                    <div class="header-user-menu user-menu add">
                        <div class="lang-wrap">
                            <div class="show-lang"><span><i class="fas fa-globe-americas"></i><strong>IND</strong></span><i class="fa fa-caret-down arrlan"></i></div>
                            <ul class="lang-tooltip lang-action no-list-style">
                                <li><a href="#" class="current-lan" data-lantext="In">Indonesia</a></li>
                                <li><a href="#" data-lantext="En">English</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- lang-wrap end-->
                    
                    

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->