<?php

use Illuminate\Database\Seeder;

class MateriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materi')->insert([
            'id' => '1',
            'mapel' => 'Matematika',
            'kelas' => 'XI RPL 1',
            'judul' => 'Matriks Ordo 2x2',
            'isi' => '
            <h1>Matriks Ordo 2x2 - Heading 1</h1>

            <h2>Heading 2</h2>

            <p>Ini adalah paragraf, anda tahu apa itu paragraf? Ya, silahkan jawab karena saya tidak tahu, jadi tolong jelaskan.&nbsp;Ini adalah paragraf, anda tahu apa itu paragraf? Ya, silahkan jawab karena saya tidak tahu, jadi tolong jelaskan.Ini adalah paragraf, anda tahu apa itu paragraf? Ya, silahkan jawab karena saya tidak tahu, jadi tolong jelaskan.Ini adalah paragraf, anda tahu apa itu paragraf? Ya, silahkan jawab karena saya tidak tahu, jadi tolong jelaskan.</p>

            <h3>Ini Numbering - Heading 3&nbsp;:&nbsp;</h3>

            <ol>
                <li>Ini nomor 1</li>
                <li>Ini nomor 2</li>
                <li>Ini nomor 3</li>
                <li>Dan sayangnya kamu nomor 4 bagi saya.&nbsp;</li>
            </ol>

            <h2>Heading 2 lagi... cieee.... ^.^</h2>

            <p>Eh ketemu paragraf lagi yah. kaya nya kamu memang cocok dengan paragraf... #JODOH&nbsp;^.^&nbsp;Eh ketemu paragraf lagi yah. kaya nya kamu memang cocok dengan paragraf... #JODOH&nbsp;^.^&nbsp;Eh ketemu paragraf lagi yah. kaya nya kamu memang cocok dengan paragraf... #JODOH&nbsp;^.^&nbsp;Eh ketemu paragraf lagi yah. kaya nya kamu memang cocok dengan paragraf... #JODOH&nbsp;^.^&nbsp;Eh ketemu paragraf lagi yah. kaya nya kamu memang cocok dengan paragraf... #JODOH&nbsp;^.^&nbsp;</p>

            <h3>Gaya Huruf :</h3>

            <ul>
                <li>Nih <cite>italic</cite> nih</li>
                <li>Nih <ins>Underline</ins> nih</li>
                <li>Dan lain-lain...&nbsp;^.^&nbsp;</li>
            </ul>

            <p>Custom :</p>

            <p>Kata Mutiara :&nbsp;</p>

            <blockquote>
            <p><cite><big>&quot;It doesn&#39;t matter how slowly you go, as long as you do not STOP!&quot;</big></cite>- Dari Orang</p>
            </blockquote>

            <blockquote>
            <p><big>&quot;With Music To Become Thousands Lines Of Code&quot;</big> - Punya Orang juga</p>
            </blockquote>

            <p>&nbsp;</p>

            <h1>Author :</h1>

            <p><img alt="" src="http://localhost:8000/photos/2/IMG_20191016_101634.jpg" style="float:left; height:162px; width:150px" />&nbsp; Nama : Abdurozzaq Nurul Hadi</p>

            <p>&nbsp; Profesi : Pelajar</p>

            <p>&nbsp; Bio : <cite>&quot;Beliau adalah seorang anak muda Bucin yang bercita-cita menjadi Full Stack Web Developer.&quot;</cite></p>

            <p>&nbsp; #NOHARDFEELING #NOOFFENSE #STAYCODING #CODINGINLIFE&nbsp;</p>

            <p>&nbsp;&nbsp;<big><cite>STATUS &quot;KIA&quot;&nbsp;</cite></big></p>

            <p>&nbsp;&nbsp;</p>

            <p>&nbsp;</p>
            ',
            'keterangan' => 'Ini adalah Keterangan jadi jangan takut gelap.',
            'kesimpulan' => 'Ini Hanya suatu EasterEgg dari Creator LaraELearn. SO, NO HARD FEELING!',
            'user_id_teacher' => '2',
        ]);
    }
}
