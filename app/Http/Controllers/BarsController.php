<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Bar;

class BarsController extends Controller
{
	public function all() {
		$bars = Bar::All();
		return view('bar.all',compact('bars'));
	}

	public function ver($id)
	{
		echo "BAR CON ID ".$id;
		//return view('bar.ver', ['id' => $id]);
	}

	public function new()
	{
		$bar = new Bar();
		return view('bar.new', compact('bar'));
	}

	public function create(Request $request)
	{
		$this->validate($request, [
        	'nombre' => 'required|max:255',
        	'localidad' => 'required|numeric',
        	'direccion' => 'required|max:200',
        	'descripcion' => 'required|max:200',
        	'telefono' => 'required|max:20',
        	'email' => 'required|email|max:100',
        	'lat' => 'required|numeric',
        	'lng' => 'required|numeric',
        	'habilitado' => 'required|boolean',
    	]);

		$bar = new Bar();
		$bar->nombre = $request->nombre;
		$bar->localidad = $request->localidad;
		$bar->direccion = $request->direccion;
		$bar->descripcion = $request->descripcion;
		$bar->telefono = $request->telefono;
		$bar->email = $request->email;
		$bar->lat = $request->lat;
		$bar->lng = $request->lng;
		$bar->habilitado = $request->habilitado;
		$bar->password = Hash::make('sanclemente');

		$bar->save();

		return $this->all();
	}

	public function createPassword(Request $request)
	{
		$bar = Bar::findOrFail($request->id);
		if ( $request->password == $request->passwordRepeat )
			$bar->password = $request->password;
		
		$bar->save();

		return $this->all();
	}

	public function edit()
	{
		return view('bar.edit');
	}

	public function update(Request $request)
	{
		$bar = Bar::findOrFail($request->id);
		$bar->nombre = $request->nombre;
		$bar->localidad = $request->localidad;
		$bar->direccion = $request->direccion;
		$bar->descripcion = $request->descripcion;
		$bar->telefono = $request->telefono;
		$bar->email = $request->email;
		$bar->lat = $request->lat;
		$bar->lng = $request->lng;
		$bar->habilitado = $request->habilitado;

		$bar->save();

		return $this->all();

	}
}
	
