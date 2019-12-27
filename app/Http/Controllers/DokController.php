<?php

namespace App\Http\Controllers;

use App\Dok;
use Illuminate\Http\Request;

class DokController extends Controller
{
    public function viewDok($id)
    { 
        return view('View-Dokumentasi')->with('id',$id);
    }
}
