<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Foto;
use App\Dok;

class ApiController extends Controller
{
    public function getFoto(){
    	$foto = Foto::all();

    	return response()->json(['foto' => $foto], 200);
    }
    public function getDok(){
    	$dok = Dok::all();

    	return response()->json(['dok' => $dok], 200);
    }
}
