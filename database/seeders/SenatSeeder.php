<?php

namespace Database\Seeders;

use App\Models\daftarSenat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SenatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        daftarSenat::create([
            'name' => 'Dr. Sumardiyono, S.KM., M.Kes.',
            'badanSenat' => 'senat',
            'foto' => 'ketua.png',
            'kedudukanSenat' => 'Ketua Senat Akademik',
            'profil' => ''
        ]);
        daftarSenat::create([
            'name' => 'Dr. Sri Mulyani, S.Kep.Ns., M.Kes.',
            'badanSenat' => 'senat',
            'foto' => 'sekretaris.png',
            'kedudukanSenat' => 'Sekretaris Senat Akademik',
            'profil' => ''
        ]);

        daftarSenat::create([
            'name' => 'Dr. Deria Adi Wijaya, S.ST.Par., M.Sc.',
            'badanSenat' => 'komisiA',
            'foto' => 'komisiA.png',
            'kedudukanSenat' => 'Ketua Komisi A',
            'profil' => ''
        ]);

        // daftarSenat::create([
        //     'name' => 'Ardianna Nuraeni, S.S., M.Hum.',
        //     'badanSenat' => 'komisiA',
        //     'foto' => 'komisiASekre.png',
        //     'kedudukanSenat' => 'Sekretaris Komisi A',
        //     'profil' => ''
        // ]);
        daftarSenat::create([
            'name' => '<p style="margin-right:0px;margin-bottom:20px;margin-left:0px;">Sekretaris :<br /><b>Ardianna Nuraeni, S.S., M.Hum.</b></p><p style="margin-right:0px;margin-bottom:20px;margin-left:0px;">Anggota :</p><ol><li>Agus Dwi Priyanto, S.S., M.CALL.</li><li>Sri Anggarini Parwatiningsih, S.SiT., M.Kes.</li><li>Yeni Fajariyanti, S.E., M.Si.</li><li>R. Baskara Katri Anandito, S.T.P., M.P.</li><li>Hartatik, S.Si., M.Si.</li><li>Lely Ratwianingsih, S.E., M.Sc.</li><li>Dr. Sumardiyono, S.KM., M.Kes.</li><li>Dr. Sperisa Distantina, S.T., M.T</li></ol>',
            'badanSenat' => 'komisiA',
            'kedudukanSenat' => 'Anggota A',
        ]);

        daftarSenat::create([
            'name' => 'Kristina Indah Setyo Rahayu, B.Ed., M.TCSOL.',
            'badanSenat' => 'komisiB',
            'foto' => 'komisiB.png',
            'kedudukanSenat' => 'Ketua Komisi B',
            'profil' => ''
        ]);

        // daftarSenat::create([
        //     'name' => 'Anif Nur Artanti, S.Farm, Apt., M.Sc.',
        //     'badanSenat' => 'komisiB',
        //     'foto' => 'komisiBSekre.png',
        //     'kedudukanSenat' => 'Sekretaris Komisi B',
        //     'profil' => ''
        // ]);

        daftarSenat::create([
            'name' => '<p style="margin-right:0px;margin-bottom:20px;margin-left:0px;">Sekretaris :<br /><b>Anif Nur Artanti, S.Farm, Apt., M.Sc.</b></p><p style="margin-right:0px;margin-bottom:20px;margin-left:0px;">Anggota :</p><ol><li>Drs. Santoso Tri Hananto, M.Acc., Ak.</li><li>Ana Shohibul Manshur Al Ahmad, S.E., M.Sc.</li><li>Tanti Hermawati, S.Sos., M.Si.</li><li>Dr. Sri Mulyani, S.Kep.Ns., M.Kes.</li><li>Dr. Eko Prasetya Budiana, S.T., M.T.</li><li>Desy Mayasari, M.Sc.</li><li>Raden Kunto Adi, S.P., M.P.</li><li>Sri Wahyuningsih Yulianti, S.H., M.H.</li></ol>',
            'badanSenat' => 'komisiB',
            'kedudukanSenat' => 'Anggota B',
        ]);
        daftarSenat::create([
            'name' => 'Muhammad Syafiqurrahman, S.E., M.M., Ak.',
            'badanSenat' => 'komisiC',
            'foto' => 'komisiC.png',
            'kedudukanSenat' => 'Ketua Komisi C',
            'profil' => ''
        ]);

        // daftarSenat::create([
        //     'name' => 'Hermansyah Muttaqin, S.Sn., M.Sn.',
        //     'badanSenat' => 'komisiC',
        //     'foto' => 'komisiCSekre.png',
        //     'kedudukanSenat' => 'Sekretaris Komisi C',
        //     'profil' => ''
        // ]);

        daftarSenat::create([
            'name' => '<p style="margin-right:0px;margin-bottom:20px;margin-left:0px;">Sekretaris :<br /><b>Hermansyah Muttaqin, S.Sn., M.Sn.</b></p><p style="margin-right:0px;margin-bottom:20px;margin-left:0px;">Anggota :</p><ol><li>Abdul Aziz, S.Kom., M.Cs.</li><li>Wara Pratitis Sabar Suprayogi, S.Pt., M.P.</li><li>Trisninik Ratih Wulandari, S.E., M.Si., Ak.</li><li>Mahfud Anshori, S.Sos., M.Si.</li><li>Irsyadul Ibad, S.AB., M.ed., M.Si.</li><li>Dr. Isna Qadrijati, dr., M.Kes.</li><li>Slamet Jauhari Legowo, S.T., M.T.</li><li>Dr. Eng. Herman Saputro, S.Pd., M.Pd., M.T.</li></ol>',
            'badanSenat' => 'komisiC',
            'kedudukanSenat' => 'Anggota C',
        ]);
    }
}
