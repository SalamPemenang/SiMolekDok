<?php

namespace App\Http\Controllers;
use App\Dok;
use App\Foto;
use Illuminate\Http\Request;
use DB;
use Storage;
use Image;
use Carbon\Carbon;

class DokController extends Controller
{

    public function viewDok($id)
    { 
        $foto = DB::table('dokumentasi')
        ->join('foto', 'dokumentasi.id', '=', 'foto.dokumentasi_id')
        ->where('dokumentasi.id_sub_kegiatan', '=', $id)
        ->select('foto.id','foto.foto_dokumentasi', 'foto.waktu_foto_dokumentasi')
        ->get();

        $dok = DB::table('dokumentasi')->where('id_sub_kegiatan', $id)->first();

        $file = file_get_contents('http://simolek-api.thinkfulltank.net/get_detail_only/admin/1');
        $json_data = json_decode($file,true);

        return view('View-Dokumentasi', ['foto' => $foto, 'dok' => $dok, 'json_data' => $json_data]);
    }

    public function sendDok($id_sub_kegiatan)
    {   
        if(DB::table('dokumentasi')->where('id_sub_kegiatan', $id_sub_kegiatan)->first()){
            return redirect('/view/dokumentasi/'.$id_sub_kegiatan);
        }else{
            $sendDok = new Dok;
            $sendDok->id_sub_kegiatan = $id_sub_kegiatan; 
            $sendDok->save();

            return redirect('/view/dokumentasi/'.$id_sub_kegiatan);
        }
    }

    public function addDok(Request $req, $id)
    {
        $dok = Dok::find($id);

        // Video Dokumentasi
        $file = $req->file('video_dokumentasi');
        $storagePath = Storage::disk('local')->put('public/videos', $file);
        $storageName = basename($storagePath);
        
        $getTakenDate = $req->lastmodifvideo;
        
        $dok->video_dokumentasi = $storageName;
        $dok->waktu_video_dokumentasi = $getTakenDate;
        $dok->save();
        return redirect()->back();
    }

    public function addFoto(Request $req, $id)
    {
        $dok = new Foto;

        // Foto Dokumentasi
        if($req->hasFile('foto_dokumentasi')){
            $foto = $req->file('foto_dokumentasi');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            Image::make($foto)->save(public_path('/assets/image/' . $filename));
        }

        $getTakenDate = $req->lastmodif;

        $dok->dokumentasi_id = $id;
        $dok->foto_dokumentasi = $filename;
        $dok->waktu_foto_dokumentasi = $getTakenDate;
        $dok->save();
        return redirect()->back();
    }

}
