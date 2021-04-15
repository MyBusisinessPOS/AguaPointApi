<?php

namespace App\Http\Controllers\Empleado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $empleados = Empleado::all();
        return response()->json(['Empleados' => $empleados], 200);
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveUpdateEmpleado(Request $request)
    {

        $json = $request->json()->all();
    
        try {

            //Comienza transacción
            \DB::beginTransaction();

            //Recorremos el JSON 
            foreach ($json['Empleados'] as $empleado) {

                //Validamos si existe el producto en la base de datos
                $Empleado = Empleado::where('identificador', '=', $empleado['identificador'])->first();

                if ($Empleado != null) {
     

                    //ACtualizamos el registro
                    $Employed = Empleado::findOrFail($Empleado->id);  
                    $Employed->nombre = $empleado['nombre'];
                    $Employed->direccion = $empleado['direccion'];
                    $Employed->email = $empleado['email'];
                    $Employed->telefono = $empleado['telefono'];
                    $Employed->fecha_nacimiento = $empleado['fecha_nacimiento'];
                    $Employed->fecha_ingreso = $empleado['fecha_ingreso'];
                    $Employed->fecha_egreso = $empleado['fecha_egreso'];
                    $Employed->contrasenia = $empleado['contrasenia'];
                    //$Employed->identificador = $empleado['identificador'];
                    $Employed->status = 1;
                    $Employed->nss = $empleado['nss'];
                    $Employed->rfc = $empleado['rfc'];
                    $Employed->curp = $empleado['curp'];
                    $Employed->puesto = $empleado['puesto'];
                    $Employed->area_depto= $empleado['area_depto'];
                    $Employed->tipo_contrato = $empleado['tipo_contrato'];
                    $Employed->region= $empleado['region'];
                    $Employed->hora_entrada= $empleado['hora_entrada'];
                    $Employed->hora_salida= $empleado['hora_salida'];
                    $Employed->salida_comer= $empleado['salida_comer'];
                    $Employed->entrada_comer = $empleado['entrada_comer'];
                    $Employed->sueldo_diario = $empleado['sueldo_diario'];
                    $Employed->turno = $empleado['turno'];
                    $Employed->path_image = $empleado['path_image'];
                    $Employed->save();

                 }else{

                    //Agregamos los productos
                    $Empleados = new Empleado();
                    $Empleados->nombre = $empleado['nombre'];
                    $Empleados->direccion = $empleado['direccion'];
                    $Empleados->email = $empleado['email'];
                    $Empleados->telefono = $empleado['telefono'];
                    $Empleados->fecha_nacimiento = $empleado['fecha_nacimiento'];
                    $Empleados->fecha_ingreso = $empleado['fecha_ingreso'];
                    $Empleados->fecha_egreso = $empleado['fecha_egreso'];
                    $Empleados->contrasenia = $empleado['contrasenia'];
                    $Empleados->identificador = $empleado['identificador'];
                    $Empleados->status = 1;
                    $Empleados->nss = $empleado['nss'];
                    $Empleados->rfc = $empleado['rfc'];
                    $Empleados->curp = $empleado['curp'];
                    $Empleados->puesto = $empleado['puesto'];
                    $Empleados->area_depto= $empleado['area_depto'];
                    $Empleados->tipo_contrato = $empleado['tipo_contrato'];
                    $Empleados->region= $empleado['region'];
                    $Empleados->hora_entrada= $empleado['hora_entrada'];
                    $Empleados->hora_salida= $empleado['hora_salida'];
                    $Empleados->salida_comer= $empleado['salida_comer'];
                    $Empleados->entrada_comer = $empleado['entrada_comer'];
                    $Empleados->sueldo_diario = $empleado['sueldo_diario'];
                    $Empleados->turno = $empleado['turno'];
                    $Empleados->path_image = $empleado['path_image'];
                    $Empleados->save();
              
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


