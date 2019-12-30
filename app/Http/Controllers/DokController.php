<?php

namespace App\Http\Controllers;

use App\Dok;
use Illuminate\Http\Request;
use DB;

class DokController extends Controller
{
    
    public function viewDok($id)
    { 
        $foto = DB::table('dokumentasi')
                    ->join('foto', 'dokumentasi.id', '=', 'foto.dokumentasi_id')
                    ->where('dokumentasi.id_sub_kegiatan', '=', $id)
                    ->select('foto.foto_dokumentasi', 'foto.waktu_foto_dokumentasi')
                    ->get();

        $dok = DB::table('dokumentasi')
                    ->where('dokumentasi.id_sub_kegiatan', '=', $id)
                    ->select('dokumentasi.*')
                    ->get();

        return view('View-Dokumentasi', ['foto' => $foto, 'dok' => $dok]);
    }

    public function sendDok($id_sub_kegiatan, $nama_sub_kegiatan)
    {   
        $sendDok = new Dok;
        $sendDok->id_sub_kegiatan = $id_sub_kegiatan;
        $sendDok->nama_sub_kegiatan = $nama_sub_kegiatan;
        $sendDok->save();
    }

}
