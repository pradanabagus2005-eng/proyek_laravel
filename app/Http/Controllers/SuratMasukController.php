<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index(){
       // return 'halaman surat masuk dari controller';
$suratMasuk =[
    [
        'id'            =>1,
        'nomor_surat'   =>'001/FT/X/2026',
        'tanggal'       =>'13-10-2026',
        'pengirim'      =>'Fakultas Teknik',
        'perihal'       =>'Rapat'
    ],
    [   'id'            =>2,
        'nomor_surat'   =>'002/FT/X/2026',
        'tanggal'       =>'13-10-2026',
        'pengirim'      =>'Mulyono',
        'perihal'       =>'Keluhan'
    ],
    [
        'id'            =>3,
        'nomor_surat'   =>'003/FT/X/2026',
        'tanggal'       =>'13-10-2026',
        'pengirim'      =>'faby',
        'perihal'       =>'Rapat'
    ]
    
];

       return view('surat-masuk.index',compact('suratMasuk'));
    }

    public function show ($id){
        $suratMasukShow =[
        1=> [
        'id'            =>1,
        'nomor_surat'   =>'001/FT/X/2026',
        'tanggal'       =>'13-10-2026',
        'pengirim'      =>'Fakultas Teknik',
        'perihal'       =>'Rapat'
            ],
        2=> [   
        'id'            =>2,
        'nomor_surat'   =>'002/FT/X/2026',
        'tanggal'       =>'13-10-2026',
        'pengirim'      =>'Mulyono',
        'perihal'       =>'Keluhan'
            ],
        3=> [
        'id'            =>3,
        'nomor_surat'   =>'003/FT/X/2026',
        'tanggal'       =>'13-10-2026',
        'pengirim'      =>'faby',
        'perihal'       =>'Rapat'
            ]
        ];
        $suratShow = $suratMasukShow[$id]  ?? null;
         return view('surat-masuk.show',compact('suratShow'));
    }
}
