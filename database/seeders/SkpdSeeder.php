<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'Sekretariat Daerah', 'alias' => 'Sekda'],
            ['nama' => 'Sekretariat DPRD', 'alias' => 'Setwan'],
            ['nama' => 'Inspektorat', 'alias' => 'Inspektorat'],
            ['nama' => 'Dinas Pertanian dan Ketahanan Pangan', 'alias' => 'DispertaKP'],
            ['nama' => 'Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', 'alias' => 'DP2KBP3A'],
            ['nama' => 'Dinas Kebudayaan, Kepemudaan dan Olahraga', 'alias' => 'Disbudpora'],
            ['nama' => 'Dinas Koperasi, Usaha Kecil, Menengah dan Perdagangan', 'alias' => 'DKUKMP'],
            ['nama' => 'Dinas Pariwisata', 'alias' => 'Dispar'],
            ['nama' => 'Dinas Sosial', 'alias' => 'Dinsos'],
            ['nama' => 'Dinas Kesehatan', 'alias' => 'Dinkes'],
            ['nama' => 'Dinas Pendidikan', 'alias' => 'Disdik'],
            ['nama' => 'Dinas Pekerjaan Umum, Penataan Ruang dan Pertanahan', 'alias' => 'DPUPRP'],
            ['nama' => 'Dinas Perhubungan', 'alias' => 'Dishub'],
            ['nama' => 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'alias' => 'DPMPTSP'],
            ['nama' => 'Dinas Peternakan dan Perikanan', 'alias' => 'Disnakan'],
            ['nama' => 'Dinas Perumahan Rakyat, Kawasan Permukiman dan Lingkungan Hidup', 'alias' => 'DPRKPLH'],
            ['nama' => 'Dinas Kependudukan dan Pencatatan Sipil', 'alias' => 'Disdukcapil'],
            ['nama' => 'Dinas Komunikasi dan Informatika', 'alias' => 'Diskominfo'],
            ['nama' => 'Dinas Tenaga Kerja', 'alias' => 'Disnaker'],
            ['nama' => 'Dinas Perpustakaan dan Kearsipan', 'alias' => 'Diperpuska'],
            ['nama' => 'Dinas Pemberdayaan Masyarakat dan Desa', 'alias' => 'DPMD'],
            ['nama' => 'Badan Pengelolaan Keuangan Daerah', 'alias' => 'BPKD'],
            ['nama' => 'Badan Perencanaan Pembangunan Daerah', 'alias' => 'Bappeda'],
            ['nama' => 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'alias' => 'BKPSDM'],
            ['nama' => 'Badan Penanggulangan Bencana Daerah', 'alias' => 'BPBD'],
            ['nama' => 'Badan Kesatuan Bangsa dan Politik', 'alias' => 'Bakesbangpol'],
            ['nama' => 'Satuan Polisi Pamong Praja', 'alias' => 'Satpol PP'],
            ['nama' => 'Kecamatan Ciamis', 'alias' => 'Kecamatan Ciamis'],
            ['nama' => 'Kecamatan Kawali', 'alias' => 'Kecamatan Kawali'],
            ['nama' => 'Kecamatan Panumbangan', 'alias' => 'Kecamatan Panumbangan'],
            ['nama' => 'Kecamatan Rancah', 'alias' => 'Kecamatan Rancah'],
            ['nama' => 'Kecamatan Banjarsari', 'alias' => 'Kecamatan Banjarsari'],
            ['nama' => 'Kecamatan Cijeungjing', 'alias' => 'Kecamatan Cijeungjing'],
            ['nama' => 'Kecamatan Lakbok', 'alias' => 'Kecamatan Lakbok'],
            ['nama' => 'Kecamatan Rajadesa', 'alias' => 'Kecamatan Rajadesa'],
            ['nama' => 'Kecamatan Cikoneng', 'alias' => 'Kecamatan Cikoneng'],
            ['nama' => 'Kecamatan Panawangan', 'alias' => 'Kecamatan Panawangan'],
            ['nama' => 'Kecamatan Cipaku', 'alias' => 'Kecamatan Cipaku'],
            ['nama' => 'Kecamatan Panjalu', 'alias' => 'Kecamatan Panjalu'],
            ['nama' => 'Kecamatan Sadananya', 'alias' => 'Kecamatan Sadananya'],
            ['nama' => 'Kecamatan Cisaga', 'alias' => 'Kecamatan Cisaga'],
            ['nama' => 'Kecamatan Pamarican', 'alias' => 'Kecamatan Pamarican'],
            ['nama' => 'Kecamatan Cihaurbeuti', 'alias' => 'Kecamatan Cihaurbeuti'],
            ['nama' => 'Kecamatan Cimaragas', 'alias' => 'Kecamatan Cimaragas'],
            ['nama' => 'Kecamatan Sukadana', 'alias' => 'Kecamatan Sukadana'],
            ['nama' => 'Kecamatan Jatinagara', 'alias' => 'Kecamatan Jatinagara'],
            ['nama' => 'Kecamatan Cidolog', 'alias' => 'Kecamatan Cidolog'],
            ['nama' => 'Kecamatan Baregbeg', 'alias' => 'Kecamatan Baregbeg'],
            ['nama' => 'Kecamatan Sindangkasih', 'alias' => 'Kecamatan Sindangkasih'],
            ['nama' => 'Kecamatan Lumbung', 'alias' => 'Kecamatan Lumbung'],
            ['nama' => 'Kecamatan Sukamantri', 'alias' => 'Kecamatan Sukamantri'],
            ['nama' => 'Kecamatan Purwadadi', 'alias' => 'Kecamatan Purwadadi'],
            ['nama' => 'Kecamatan Tambaksari', 'alias' => 'Kecamatan Tambaksari'],
            ['nama' => 'Kecamatan Banjaranyar', 'alias' => 'Kecamatan Banjaranyar'],
            ['nama' => 'Kelurahan Ciamis', 'alias' => 'Kelurahan Ciamis'],
            ['nama' => 'Kelurahan Kertasari', 'alias' => 'Kelurahan Kertasari'],
            ['nama' => 'Kelurahan Maleber', 'alias' => 'Kelurahan Maleber'],
            ['nama' => 'Kelurahan Sindangrasa', 'alias' => 'Kelurahan Sindangrasa'],
            ['nama' => 'Kelurahan Benteng', 'alias' => 'Kelurahan Benteng'],
            ['nama' => 'Kelurahan Linggasari', 'alias' => 'Kelurahan Linggasari'],
            ['nama' => 'Kelurahan Cigembor', 'alias' => 'Kelurahan Cigembor'],
        ];

        DB::table('skpd')->insert($data);
    }
}
