<?php

namespace App\Http\Controllers\Precios;

use App\Http\Controllers\Controller;
use App\Models\PrecioEspecial;
use Illuminate\Http\Request;

class PrecioEspecialController extends Controller
{
    
   	public function getAll(Request $request){
   		$precios = PrecioEspecial::all();
        return response()->json(['Precios' => $precios], 200);
	}


	public function savePrice(Request $request){

	}

}
