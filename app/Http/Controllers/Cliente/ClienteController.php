<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $clientes = Cliente::all();
        return response()->json(['Clientes' => $clientes], 200);
    }

 
    public function saveUpdateCliente(Request $request)
    {
        
        $json = $request->json()->all();

        try {

            //Comienza transacción
            \DB::beginTransaction();

            //Recorremos el JSON 
            foreach ($json['Clientes'] as $cliente) {

                //Validamos si existe el cliente en la base de datos
                $Clients = Cliente::where('cuenta', '=', $cliente['cuenta'])->first();

                if ($Clients != null) {
     
                    //Buscamos el registro en la base de datos
                    $Client = Cliente::findOrFail($Clients->id);  

          
                    $Client->nombre_comercial = $cliente['nombre_comercial'];
                    $Client->calle   = $cliente['calle'];
                    $Client->numero  = $cliente['numero'];
                    $Client->colonia = $cliente['colonia'];
                    $Client->ciudad  = $cliente['ciudad'];
                    $Client->codigo_postal = $cliente['codigo_postal'];
                    $Client->fecha_registro = $cliente['fecha_registro'];
                    $Client->fecha_baja = $cliente['fecha_baja'];
                    $Client->cuenta = $cliente['cuenta'];
                    $Client->grupo = $cliente['grupo'];
                    $Client->categoria= $cliente['categoria'];
                    $Client->status = $cliente['status'];
                    $Client->consec = $cliente['consec'];
                    $Client->region = $cliente['region'];
                    $Client->sector = $cliente['sector'];
                    $Client->rango = $cliente['rango'];
                    $Client->ruta = $cliente['ruta'];
                    $Client->secuencia = $cliente['secuencia'];
                    $Client->periodo= $cliente['periodo'];
                    $Client->lun = $cliente['lun'];
                    $Client->mar = $cliente['mar'];
                    $Client->mie = $cliente['mie'];
                    $Client->jue = $cliente['jue'];
                    $Client->vie = $cliente['vie'];
                    $Client->sab = $cliente['sab'];
                    $Client->dom = $cliente['dom'];
                    $Client->latitud = $cliente['latitud'];
                    $Client->longitud = $cliente['longitud'];

                    $Client->save();

                 }else{

             
                    $Cliente = new Cliente();
                    $Cliente->nombre_comercial = $cliente['nombre_comercial'];
                    $Cliente->calle   = $cliente['calle'];
                    $Cliente->numero  = $cliente['numero'];
                    $Cliente->colonia = $cliente['colonia'];
                    $Cliente->ciudad  = $cliente['ciudad'];
                    $Cliente->codigo_postal = $cliente['codigo_postal'];
                    $Cliente->fecha_registro = $cliente['fecha_registro'];
                    $Cliente->fecha_baja = $cliente['fecha_baja'];
                    $Cliente->cuenta = $cliente['cuenta'];
                    $Cliente->grupo = $cliente['grupo'];
                    $Cliente->categoria= $cliente['categoria'];
                    $Cliente->status = $cliente['status'];
                    $Cliente->consec = $cliente['consec'];
                    $Cliente->region = $cliente['region'];
                    $Cliente->sector = $cliente['sector'];
                    $Cliente->rango = $cliente['rango'];
                    $Cliente->ruta =  $cliente['ruta'];
                    $Cliente->secuencia = $cliente['secuencia'];
                    $Cliente->periodo= $cliente['periodo'];
                    $Cliente->lun = $cliente['lun'];
                    $Cliente->mar = $cliente['mar'];
                    $Cliente->mie = $cliente['mie'];
                    $Cliente->jue = $cliente['jue'];
                    $Cliente->vie = $cliente['vie'];
                    $Cliente->sab = $cliente['sab'];
                    $Cliente->dom = $cliente['dom'];
                    $Cliente->latitud = $cliente['latitud'];
                    $Cliente->longitud = $cliente['longitud'];

                    //Agregamos un producto nuevo
                    $Cliente->save();

                 }

            }

             //Transacción exitosa
            \DB::commit();

            return response()->json(['result'=>'ok']);
         
        } catch (Exception $e) {

             //Rollback transaction
            \DB::rollback();

            return response()->json(['error' => $e->getMessage(), 209]);
        }
    }

}