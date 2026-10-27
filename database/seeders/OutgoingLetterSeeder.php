<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutgoingLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nomor_surat' => '001/FT/X/2026',
                'tanggal' => '2026-10-01',
                'tujuan' => 'Fakultas Teknik',
                'perihal' => 'Undangan Rapat',
                'keterangan' => 'Undangan rapat koordinasi'
            ],
            [
                'nomor_surat' => '002/BAA/X/2026',
                'tanggal' => '2026-10-02',
                'tujuan' => 'BAA',
                'perihal' => 'Pemberitahuan Akademik',
                'keterangan' => 'Informasi kegiatan akademik'
            ],
            [
                'nomor_surat' => '003/LPPM/X/2026',
                'tanggal' => '2026-10-03',
                'tujuan' => 'LPPM',
                'perihal' => 'Undangan Sosialisasi',
                'keterangan' => 'Sosialisasi penelitian'
            ],
        ];


        foreach ($data as $surat) {
            DB::table('outgoing_letters')->updateOrInsert(
                ['nomor_surat' => $surat['nomor_surat']],
                $surat + ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
