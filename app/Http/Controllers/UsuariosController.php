<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
	public function ver($id)
	{
		return view('usuario.ver', ['id' => $id]);
	}
}
