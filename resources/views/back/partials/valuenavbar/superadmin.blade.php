<li class="nav-header">MULTI LEVEL EXAMPLE</li>
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p> Dashboard</p>
    </a>
</li>
<li class="nav-header">PAGES</li>
<li class="nav-item">
    <a href="{{ route('superadmin.beranda.index') }}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p> Beranda</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user-friends"></i>
        <p>
            Tentang Kami
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('superadmin.tentangkami.profil.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Profil</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.tentangkami.sejarah.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sejarah Perkembangan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.tentangkami.visi-misi-tujuan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Visi, Misi & Tujuan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.tentangkami.renstra.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Renstra SV</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.tentangkami.struktur-organisasi.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Struktur Organisasi</p>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{ route('superadmin.tentangkami.sejarah.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sejarah Perkembangan</p>
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{ route('superadmin.tentangkami.senat.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Senat</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.tentangkami.profil-pimpinan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Profil Pimpinan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.tentangkami.dokumen.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dokumen SV</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    Unit Pendukung
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('superadmin.tentangkami.unit-pendukung.UPM.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>UPM-SV</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('superadmin.tentangkami.unit-pendukung.BPU.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>BPU-SV</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('superadmin.tentangkami.unit-pendukung.CDC.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>CDC-SV</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.tentangkami.kerjasama.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kerjasama</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.tentangkami.sdm.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sumber Daya Manusia</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.tentangkami.akreditasi.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Akreditasi Prodi</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-server"></i>
        <p>
            Layanan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    Akademik
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('superadmin.layanan.akademik.kalender-akademik.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Kalender Akademik</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('superadmin.layanan.akademik.buku-pedoman.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Buku Pedoman</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    Non Akademik
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('superadmin.layanan.non-akademik.pinjam-ruang.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Pinjam Ruang</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    Fasilitas Kampus
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('superadmin.layanan.fasilitas-kampus.gedung.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Fasilitas Gedung</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('superadmin.layanan.fasilitas-kampus.ruang.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Fasilitas Ruang</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('superadmin.layanan.fasilitas-kampus.laboratorium.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Fasilitas Laboratorium</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('superadmin.layanan.fasilitas-kampus.lab-lapangan.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Fasilitas Laboratorium Lapangan</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('superadmin.layanan.fasilitas-kampus.uns.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Fasilitas UNS</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
            Produk
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('superadmin.produk.konferensi.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Konferensi</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.produk.produk-unggulan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Produk Unggulan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.produk.jurnal.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Jurnal</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
            Mahasiswa
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('superadmin.mahasiswa.beasiswa.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Beasiswa</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    Alumni
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('superadmin.mahasiswa.ikaprodi.index') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>IKAPRODI</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.mahasiswa.bem.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Badan Eksekutif Mahasiswa</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.mahasiswa.ormawa.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ormawa</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
            Settings
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('superadmin.settings.user.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('superadmin.settings.prodi.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Program Studi</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-circle"></i>
        <p>
            Level 1
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Level 2</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Level 2</p>
            </a>
        </li>
    </ul>
</li>
