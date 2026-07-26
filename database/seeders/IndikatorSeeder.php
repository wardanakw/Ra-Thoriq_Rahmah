<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Indikator;

class IndikatorSeeder extends Seeder
{
    public function run(): void
    {

        $data=[

            /*
            ============================
            AGAMA
            ============================
            */

            ['kode'=>'A1','elemen'=>'Nilai Agama dan Budi Pekerti','indikator'=>'Anak mengenal dan percaya kepada Allah Swt. melalui al-Asma’ al-Husna dan ciptaan -Nya.','urutan'=>1],

            ['kode'=>'A2','elemen'=>'Nilai Agama dan Budi Pekerti','indikator'=>'Anak mengenal Al-Qur’an dan Al-Hadis sebagai pedoman hidupnya.','urutan'=>2],

            ['kode'=>'A3','elemen'=>'Nilai Agama dan Budi Pekerti','indikator'=>'Anak mempraktikkan ibadah sehari-hari dengan tuntunan orang dewasa.','urutan'=>3],

            ['kode'=>'A4','elemen'=>'Nilai Agama dan Budi Pekerti','indikator'=>'Anak membiasakan berakhlak karimah di lingkungan rumah, sekolah, dan lingkungan sekitarnya dengan menghargai perbedaan.','urutan'=>4],

            ['kode'=>'A5','elemen'=>'Nilai Agama dan Budi Pekerti','indikator'=>'Anak meneladani kisah Nabi Muhammad Saw. dan para sahabat serta cerita-cerita islami.','urutan'=>5],

            ['kode'=>'A6','elemen'=>'Nilai Agama dan Budi Pekerti','indikator'=>'Anak mengenal kosa kata bahasa Arab secara sederhana.','urutan'=>6],

            ['kode'=>'A7','elemen'=>'Nilai Agama dan Budi Pekerti','indikator'=>'Anak berpartisipasi aktif dalam menjaga kebersihan, kesehatan, dan keselamatan diri sebagai bentuk rasa sayang terhadap dirinya dan rasa syukur kepada Allah Swt.','urutan'=>7],

            ['kode'=>'A8','elemen'=>'Nilai Agama dan Budi Pekerti','indikator'=>'Anak menghargai alam dengan cara merawatnya dan menunjukkan rasa sayang terhadap makhluk hidup yang merupakan ciptaan Allah SWT.','urutan'=>8],

            /*
            ============================
            JATI DIRI
            ============================
            */

            ['kode'=>'J1','elemen'=>'Jati Diri','indikator'=>'Anak mengenali, mengekspresikan, dan mengelola emosi diri serta membangun hubungan sosial secara sehat.','urutan'=>9],

            ['kode'=>'J2','elemen'=>'Jati Diri','indikator'=>'Anak mengenal dan memiliki perilaku positif terhadap diri dan lingkungan (keluarga, sekolah, masyarakat, negara,dan dunia) serta rasa bangga sebagai anak Indonesia yang berlandaskan Pancasila sebagai wujud rahmatan lil‘alamin..','urutan'=>10],

            ['kode'=>'J3','elemen'=>'Jati Diri','indikator'=>'Anak menyesuaikan diri dengan lingkungan, aturan, dan norma yang berlaku.','urutan'=>11],

            ['kode'=>'J4','elemen'=>'Jati Diri','indikator'=>'Anak menggunakan fungsi gerak (motorik kasar, halus, dan taktil) untuk mengeksplorasi dan memanipulasi berbagai objek dan lingkungan sekitar sebagai bentuk pengembangan diri.','urutan'=>12],

            /*
            ============================
            LITERASI
            ============================
            */

            ['kode'=>'L1','elemen'=>'Dasar-dasar Literasi','indikator'=>'Anak mengenali dan memahami berbagai informasi, mengomunikasikan perasaan dan pikiran secara lisan, tulisan, atau menggunakan berbagai media serta membangun percakapan.','urutan'=>13],

            ['kode'=>'L2','elemen'=>'Dasar-dasar Literasi','indikator'=>'Anak menunjukkan minat, kegemaran, dan berpartisipasi dalam kegiatan pramembaca dan pramenulis.','urutan'=>14],

            ['kode'=>'L3','elemen'=>'Dasar-dasar Literasi','indikator'=>'Anak mengenali dan menggunakan konsep pramatematika untuk memecahkan masalah di dalam kehidupan sehari-hari.','urutan'=>15],

            ['kode'=>'L4','elemen'=>'Dasar-dasar Literasi','indikator'=>'Anak menunjukkan kemampuan berpikir kreatif, kritis dan kolaboratif.','urutan'=>16],

            ['kode'=>'L5','elemen'=>'Dasar-dasar Literasi','indikator'=>'Anak menunjukkan rasa ingin tahu melalui observasi, eksplorasi, dan eksperimen dengan menggunakan lingkungan sekitar dan media sebagai sumber belajar, untuk mendapatkan gagasan mengenai fenomena alam dan sosial.','urutan'=>17],

            ['kode'=>'L6','elemen'=>'Dasar-dasar Literasi','indikator'=>'Anak menunjukkan kemampuan awal menggunakan dan merekayasa teknologi serta untuk mencari informasi, gagasan, dan keterampilan secara aman dan bertanggung jawab.','urutan'=>18],

            ['kode'=>'L7','elemen'=>'Dasar-dasar Literasi','indikator'=>'Anak mengeksplorasi berbagai proses seni,mengekspresikannya,serta mengapresiasi karya seni.','urutan'=>19],

        ];

        foreach($data as $d){

            Indikator::create($d);

        }

    }
}