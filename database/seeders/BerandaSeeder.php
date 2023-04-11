<?php

namespace Database\Seeders;

use App\Models\konten;
use App\Models\pages;
use App\Models\page_konten;
use App\Models\profilsambutan;
use Illuminate\Database\Seeder;

class BerandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->beranda();
        $this->visi_misi_tujuan();
        $this->profilSV();
        $this->sambutan();
    }

    public function beranda()
    {
        pages::create([
            'name' => 'beranda',
        ]);

        konten::create([
            'name' => 'beranda-profil',
            'value' => 'Sekolah Vokasi Universitas Sebelas Maret Surakarta mengelola Program Studi Diploma, baik D3 maupun D4 atau Sarjana Terapan. Sekolah Vokasi UNS juga mengelola Program Studi Di Luar Kampus Utama (PSDKU) di Kabupaten Madiun. Perkuliahan program studi diselenggarakan di Kampus Tirtomoyo dan juga diselenggarakan di Kampus Utama Kentingan, Jalan Ir. Sutami 36 A Surakarta.',
        ]);
        page_konten::create([
            'pages_name' => 'beranda',
            'konten_id' => 1,
        ]);

        konten::create([
            'name' => 'beranda-profil-youtube',
            'value' => 'https://www.youtube.com/embed/Ht7lMt95tOc?autohide=1&autoplay=1&fs=0&showinfo=0&modestBranding=1&start=0&controls=0&rel=0&disablekb=1&iv_load_policy=3&wmode=transparent&enablejsapi=1&origin=https%3A%2F%2Fvokasi.uns.ac.id&widgetid=1'
        ]);
        $youtubeId = konten::where('name', 'beranda-profil-youtube')->first()->id;
        page_konten::create([
            'pages_name' => 'beranda',
            'konten_id' => $youtubeId
        ]);
        
        konten::create([
            'name' => 'beranda-visi',
            'value' => '"Menjadi pusat pengembangan sumber daya manusia yang berkelanjutan dan unggul di tingkat internasional dengan berlandaskan pada nilai-nilai luhur budaya nasional pada tahun 2044"'
        ]);
        $visiId = konten::where('name', 'beranda-visi')->first()->id;
        page_konten::create([
            'pages_name' => 'beranda',
            'konten_id' => $visiId
        ]);


        konten::create([
            'name' => 'beranda-misi',
            'value' => '"Menjadi pusat pengembangan sumber daya manusia yang berkelanjutan dan unggul di tingkat internasional dengan berlandaskan pada nilai-nilai luhur budaya nasional pada tahun 2044"'
        ]);
        $misiId = konten::where('name', 'beranda-misi')->first()->id;
        page_konten::create([
            'pages_name' => 'beranda',
            'konten_id' => $misiId
        ]);

        konten::create([
            'name' => 'beranda-tujuan1',
            'value' => '"Menjadi pusat pengembangan sumber daya manusia yang berkelanjutan dan unggul di tingkat internasional dengan berlandaskan pada nilai-nilai luhur budaya nasional pada tahun 2044"'
        ]);
        $tujuanId = konten::where('name', 'beranda-tujuan1')->first()->id;
        page_konten::create([
            'pages_name' => 'beranda',
            'konten_id' => $tujuanId
        ]);
        konten::create([
            'name' => 'beranda-tujuan2',
            'value' => '"Menjadi pusat pengembangan sumber daya manusia yang berkelanjutan dan unggul di tingkat internasional dengan berlandaskan pada nilai-nilai luhur budaya nasional pada tahun 2044"'
        ]);
        $tujuanId = konten::where('name', 'beranda-tujuan2')->first()->id;
        page_konten::create([
            'pages_name' => 'beranda',
            'konten_id' => $tujuanId
        ]);
        konten::create([
            'name' => 'beranda-tujuan3',
            'value' => '"Menjadi pusat pengembangan sumber daya manusia yang berkelanjutan dan unggul di tingkat internasional dengan berlandaskan pada nilai-nilai luhur budaya nasional pada tahun 2044"'
        ]);
        $tujuanId = konten::where('name', 'beranda-tujuan3')->first()->id;
        page_konten::create([
            'pages_name' => 'beranda',
            'konten_id' => $tujuanId
        ]);
    }

    public function visi_misi_tujuan()
    {
        pages::create([
            'name' => 'visi,misi&tujuan',
        ]);
        konten::create([
            'name' => 'Visi',
            'value' => '',
        ]);
        konten::create([
            'name' => 'Misi',
            'value' => '',
        ]);
        konten::create([
            'name' => 'Tujuan',
            'value' => '',
        ]);
        konten::create([
            'name' => 'Strategi Pencapaian Visi, Misi, dan Tujuan',
            'value' => '',
        ]);
        $visi = konten::where('name', 'Visi')->first();
        $kontenId = $visi->id;
        page_konten::create([
            'pages_name' => 'visi,misi&tujuan',
            'konten_id' => $kontenId,
        ]);
        $misi = konten::where('name', 'Misi')->first();
        $kontenId = $misi->id;
        page_konten::create([
            'pages_name' => 'visi,misi&tujuan',
            'konten_id' => $kontenId,
        ]);
        $tujuan = konten::where('name', 'Tujuan')->first();
        $kontenId = $tujuan->id;
        page_konten::create([
            'pages_name' => 'visi,misi&tujuan',
            'konten_id' => $kontenId,
        ]);
        $strategi = konten::where('name', 'Strategi Pencapaian Visi, Misi, dan Tujuan')->first();
        $kontenId = $strategi->id;
        page_konten::create([
            'pages_name' => 'visi,misi&tujuan',
            'konten_id' => $kontenId,
        ]);
    }

    public function profilSV()
    {
        pages::create([
            'name' => 'profil'
        ]);

        konten::create([
            'name' => 'isi-profil',
            'value' => 'Sekolah Vokasi UNS memiliki 24 program studi yang terdiri dari 22 Program Diploma 3 dan 2 Program Diploma 4. Dengan jumlah mahasiswa sebanyak 6.470 mahasiswa dan didukung oleh 197 tenaga pendidik (dosen) dan 56 Tenaga Kependidikan, Sekolah Vokasi turut berperan aktif dalam pengembangan Sumber Daya Manusia, Ilmu Pengetahuan dan Teknologi. Kami memiliki tagline #BERGERAK, yang memiliki makna Berani, Gigih, Efisien, Rasional dan Kompeten.

            Beberapa target capaian Sekolah Vokasi UNS sampai tahun 2024 antara lain meng-upgrade program studi D3 menjadi D4 atau sarjana terapan, mengembangkan laboratorium setaraf industri di masing-masing program studi, meningkatkan program studi terakreditasi unggul sebanyak 50%, dan membentuk dewan dosen yang terdiri dari dosen UNS dan dosen dari Dunia Usaha dan Dunia Industri (DUDI). Kami menerapkan kurikulum yang terdiri dari minimal 60% praktik dan maksimal 40% teori. Kami memiliki program Kuliah Magang Industri yang diampu oleh team teaching antara dosen dan praktisi, dan desain kuliah ini dilakukan berbasis proyek. Seluruh lulusan kami memiliki sertifikat kompetensi sehingga, diharapkan, lulusan kami siap bekerja di Dunia Usaha dan Dunia Industri.',
        ]);
        konten::create([
            'name' => 'picture-profil',
            'value' => '',
        ]);

        $isiprofil = konten::where('name', 'isi-profil')->first();
        $isiprofilId = $isiprofil->id;
        page_konten::create([
            'pages_name' => 'profil',
            'konten_id' => $isiprofilId
        ]);
        
        $pictureprofil = konten::where('name', 'picture-profil')->first();
        $pictureprofilId = $pictureprofil->id;
        page_konten::create([
            'pages_name' => 'profil',
            'konten_id' => $pictureprofilId
        ]);

    }

    public function sambutan()
    {
        profilsambutan::create([
            'name' => 'Drs. Santoso Tri Hananto, M.Acc., Ak.',
            'title' => 'Dekan Sekolah Vokasi',
            'picture' => '',
            'sambutan' => ''
        ]);
    }
}
