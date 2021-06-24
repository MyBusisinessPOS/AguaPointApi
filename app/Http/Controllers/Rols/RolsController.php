<?php

namespace App\Http\Controllers\Rols;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolsController extends Controller
{
   
	public function getAll(Request $request){
		$roles = Rol::all();
        return response()->json(['Roles' => $roles], 200);
	}

	public function saveRol(Request $request){

		$json = $request->json()->all();

        try {

            //Comienza transacción
            \DB::beginTransaction();

            //Recorremos el JSON 
            foreach ($json['Roles'] as $rol) {

                //Validamos si existe el cliente en la base de datos
                $Rol = Rol::where('empleado', '=', $rol['empleado'])
                ->where('modulo', '=', $rol['modulo'])
				->first();
				
                if ($Rol != null) {
     
                    //Buscamos el registro en la base de datos
                    $Rols = Rol::findOrFail($Rol->id);                  
                    $Rols->modulo   = $rol['modulo'];
                    $Rols->empleado  = $rol['empleado'];
                    $Rols->activo = $rol['activo'];
                    $Rols->save();

                 }else{
					
                    $Roles = new Rol();
                    $Roles->empleado = $rol['empleado'];
                    $Roles->modulo   = $rol['modulo'];
                    $Roles->activo   = $rol['activo'];
                    $Roles->save();

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
