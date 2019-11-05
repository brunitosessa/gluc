<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarController extends Controller
{
	public function ver($id)
	{
		echo "BAR CON ID ".$id;
		//return view('bar.ver', ['id' => $id]);
	}

	public function nuevo()
	{
		return view('bar.nuevo');
	}

	public function guardar(Request $request)
	{
		echo $request->input("nombre");
	}
}
