<?php

namespace App\Http\Controllers\Venta;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Partida;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    
    public function saveSale(Request $request){

    	$json = $request->json()->all();

    	try{


    		//Recorremos la lista de ventas
    		foreach ($json['ventas'] as $venta){

    			//Validamos el dato del cliente
    			$Cliente = Cliente::where('cuenta', '=', $venta['cliente'])->first();

    			//Validamos el dato del empleado
				$Empleado = Empleado::where('identificador', '=', $venta['empleado'])->first();

    			//Validamos ii existe esa venta
    			$Ventas = Venta::where('venta', '=', $venta['venta'])
    			->where('clientes_id',  '=', $Cliente->id)
    			->where('empleados_id', '=', $Empleado->id)
    			->where('fecha', '=',  $venta['fecha'])
    			->first();

    			//SI la venta no existe entonces la creamos
    			if ($Ventas == null) {

    				//Creamos el encabezado
    				$Venta = new Venta();
    				$Venta->venta    = $venta['venta'];
		            $Venta->tipo_doc = $venta['tipo_doc'];
		            $Venta->fecha    = $venta['fecha'];
		            $Venta->hora     = $venta['hora'];
		            $Venta->clientes_id  = $Cliente->id;
		            $Venta->empleados_id = $Empleado->id;
		            $Venta->importe  = $venta['importe'];
		            $Venta->impuesto = $venta['impuesto']; 
		            $Venta->datos    = $venta['datos'];
		            $Venta->latitud  = $venta['latitud'];
		            $Venta->longitud = $venta['longitud'];
		            $Venta->almacen  = $venta['almacen'];
		            $Venta->save();


		            //El detalle de los productos
		            $Partidas = $venta['partidas'];

		            foreach ($Partidas as $items) {
		            	
		            	//Validamos el producto en la base de datos
		            	$Producto = Producto::where('articulo', '=', $items['articulo'])->first();
						$Partida =  new Partida();
		            	$Partida->ventas_id     = $Venta->id;
		            	$Partida->venta         = $items['venta'];
	                    $Partida->productos_id  = $Producto->id;
	                    $Partida->cantidad      = $items['cantidad'];
	                    $Partida->precio        = $items['precio'];
	                    $Partida->costo         = $items['costo'];
	                    $Partida->impuesto      = $items['impuesto'];
	                    $Partida->observ        = $items['observ'];
	                    $Partida->fecha         = $items['fecha'];
	                    $Partida->hora          = $items['hora'];
	                    $Partida->save();
		            }

    			}

    		}

    	     //TransacciÃ³n exitosa
             \DB::commit();
  
              //Devuelve resultado correcto
            return response()->json(['result'=>'ok']);
  
          }catch (\Exception $e) {
  
              //Rollback transaction
              \DB::rollback();
  
              return response()->json(['error' => $e->getMessage(), 209]);
          }

    }
}
