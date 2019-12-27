<?php

namespace App\Http\Controllers;

use App\Dok;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class DokController extends Controller
{
    public function viewDok($id)
    { 
        return view('View-Dokumentasi')->with('id',$id);
    }

    public function addDok(Request $req)
    {
        $dok = new Dok;

        // Foto Dokumentasi
        if($req->hasFile('foto_dokumentasi')){
            $foto = $req->file('foto_dokumentasi');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            Image::make($foto)->resize(150, 150)->save(public_path('/assets/image/' . $filename));
        }

        // Video Dokumentasi
        if($req->hasFile('video_dokumentasi')){

            $file = $req->file('video_dokumentasi');
            $filename2 = $file->getClientOriginalName();
            $path = public_path().'/assets/video/';
            $file->move($path, $filename2);
        }

        // Realtime
        $realtime = Carbon::now();
        $realtime->toDateString();
        
        $dok->foto_dokumentasi = $filename;
        $dok->video_dokumentasi = $filename2;
        $dok->waktu_foto_dokumentasi = $realtime;
        $dok->waktu_video_dokumentasi = $realtime;
        $dok->save();
        return redirect()->back();
    }
}
