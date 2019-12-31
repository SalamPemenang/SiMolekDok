<?php

namespace App\Http\Controllers;
use App\Dok;
use App\Foto;
use Illuminate\Http\Request;
use DB;
use Image;
use Carbon\Carbon;

class DokController extends Controller
{

    public function viewDok($id)
    { 
        $foto = DB::table('dokumentasi')
        ->join('foto', 'dokumentasi.id', '=', 'foto.dokumentasi_id')
        ->where('dokumentasi.id_sub_kegiatan', '=', $id)
        ->select('foto.foto_dokumentasi', 'foto.waktu_foto_dokumentasi')
        ->get();

        $dok = DB::table('dokumentasi')->where('id_sub_kegiatan', $id)->first();

        return view('View-Dokumentasi', ['foto' => $foto, 'dok' => $dok]);
    }

    public function sendDok($id_sub_kegiatan, $nama_sub_kegiatan)
    {   
        if(DB::table('dokumentasi')->where('id_sub_kegiatan', $id_sub_kegiatan)->first()){
            return redirect('/view/dokumentasi/'.$id_sub_kegiatan);
        }else{
            $sendDok = new Dok;
            $sendDok->id_sub_kegiatan = $id_sub_kegiatan;
            $sendDok->nama_sub_kegiatan = $nama_sub_kegiatan;
            $sendDok->save();

            return redirect('/view/dokumentasi/'.$id_sub_kegiatan);
        }
    }

    public function addDok(Request $req, $id)
    {
        $dok = Dok::find($id);

        // Video Dokumentasi
        if($req->hasFile('video_dokumentasi')){

            // $file = $req->file('video_dokumentasi');
            // $filename2 = time() . '.' . $file->getClientOriginalName();
            $path = public_path().'/assets/video/';
            // $file = Storage::putFile(
            //     'public/video',
            //     $filename2,
            // );
            // $file->move('/public/video', $filename2);
            $file = $req->file('video_dokumentasi');
            $name = time().$file->getClientOriginalName();
            // Storage::putfile('public/videos', $file);
            $file->move($path, $name);
        }
        
        // Realtime
        $realtime = Carbon::now();
        $realtime->toDateString();
        
        $dok->video_dokumentasi = $name;
        $dok->waktu_video_dokumentasi = $realtime;
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
            Image::make($foto)->resize(150, 150)->save(public_path('/assets/image/' . $filename));
        }

        $realtime = Carbon::now();
        $realtime->toDateString();

        $dok->dokumentasi_id = $id;
        $dok->foto_dokumentasi = $filename;
        $dok->waktu_foto_dokumentasi = $realtime;
        $dok->save();
        return redirect()->back();
    }

}
