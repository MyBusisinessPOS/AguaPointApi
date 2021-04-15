<?php

namespace App\Http\Controllers\Rols;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolsController extends Controller
{
   
	public function getAll(Request $request){
		$roles = Rol::all();
        return response()->json(['Roles' => $roles], 200);

	}


	public function saveRol(Request $request){

	}

}
