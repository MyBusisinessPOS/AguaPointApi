<?php

namespace App\Http\Controllers\Precios;

use App\Http\Controllers\Controller;
use App\Models\PrecioEspecial;
use Illuminate\Http\Request;

class PrecioEspecialController extends Controller
{
    
   	public function getAll(){
   		$precios = PrecioEspecial::all();
        return response()->json(['Precios' => $precios], 200);
	}


	public function savePrice(Request $request){

		$json = $request->json()->all();

        try {

            //Comienza transacción
            \DB::beginTransaction();

            //Recorremos el JSON 
            foreach ($json['Precios'] as $precio) {

                //Validamos si existe el cliente en la base de datos
                $Precios = PrecioEspecial::where('articulo', '=', $precio['articulo'])
				->where('cliente', '=', $precio['cliente'])
				->first();
				
                if ($Precios != null) {
     
                    //Buscamos el registro en la base de datos
                    $Prices = PrecioEspecial::findOrFail($Precios->id);  
                    $Prices->cliente = $precio['cliente'];
                    $Prices->articulo   = $precio['articulo'];
                    $Prices->precio  = $precio['precio'];
                    $Prices->active = $precio['active'];
                    $Prices->save();
                 }else{
                    $Price = new PrecioEspecial();
					$Price->cliente = $precio['cliente'];
                    $Price->articulo   = $precio['articulo'];
                    $Price->precio  = $precio['precio'];
                    $Price->active = $precio['active'];
                    //Agregamos un producto nuevo
                    $Price->save();

                 }

            }

             //Transacción exitosa
            \DB::commit();

             //Devuelve resultado correcto
			 return response()->json(['result'=>'ok']);
           
        } catch (Exception $e) {

             //Rollback transaction
            \DB::rollback();

            return response()->json(['error' => $e->getMessage(), 209]);
        }

	}

}
