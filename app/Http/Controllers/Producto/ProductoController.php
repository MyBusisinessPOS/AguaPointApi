<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAll()
    {
        $productos = Producto::all();
        return response()->json(['Productos' => $productos], 200);
    }


    public function saveUpdateProducto(Request $request)
    {
        
        $json = $request->json()->all();

        try {

            //Comienza transacción
            \DB::beginTransaction();

            //Recorremos el JSON 
            foreach ($json['Productos'] as $producto) {

                //Validamos si existe el producto en la base de datos
                $Producto = Producto::where('articulo', '=', $producto['articulo'])->first();

                if ($Producto != null) {
     

                    //ACtualizamos el registro
                    $Articulo = Producto::findOrFail($Producto->id);  
                    $Articulo->articulo = $producto['articulo'];
                    $Articulo->descripcion = $producto['descripcion'];
                    $Articulo->unidad_medida = $producto['unidad_medida'];
                    $Articulo->status = $producto['status'];
                    $Articulo->clave_sat = $producto['clave_sat'];
                    $Articulo->unidad_sat = $producto['unidad_sat'];
                    $Articulo->precio = $producto['precio'];
                    $Articulo->costo = $producto['costo'];
                    $Articulo->iva = $producto['iva'];
                    $Articulo->ieps = $producto['ieps'];
                    $Articulo->prioridad = $producto['prioridad'];
                    $Articulo->region = $producto['region'];
                    $Articulo->codigo_alfa = $producto['codigo_alfa'];
                    $Articulo->codigo_barras = $producto['codigo_barras'];
                    $Articulo->path_image = $producto['path_image'];
                    $Articulo->save();

                 }else{

                    //Agregamos los productos
                    $Prods = new Producto();
                    $Prods->articulo = $producto['articulo'];
                    $Prods->descripcion = $producto['descripcion'];
                    $Prods->unidad_medida = $producto['unidad_medida'];
                    $Prods->status = $producto['status'];
                    $Prods->clave_sat = $producto['clave_sat'];
                    $Prods->unidad_sat = $producto['unidad_sat'];
                    $Prods->precio = $producto['precio'];
                    $Prods->costo = $producto['costo'];
                    $Prods->iva = $producto['iva'];
                    $Prods->ieps = $producto['ieps'];
                    $Prods->prioridad = $producto['prioridad'];
                    $Prods->region = $producto['region'];
                    $Prods->codigo_alfa = $producto['codigo_alfa'];
                    $Prods->codigo_barras = $producto['codigo_barras'];
                    $Prods->path_image = $producto['path_image'];
                    $Prods->save();
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
