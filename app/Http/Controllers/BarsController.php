<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Bar;

class BarsController extends Controller
{
	public function index() {
		$bars = Bar::All();
		return view('bar.index',compact('bars'));
	}

	public function create()
	{
		$bar = new Bar();
		return view('bar.create', compact('bar'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
        	'nombre' => 'required|max:255',
        	'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

		return $this->index();
	}

	public function show($id)
	{
		$bar = Bar::findOrFail($id);
		return view('bar.show', compact('bar'));
	}

	public function edit($id)
	{
		$bar = Bar::findOrFail($id);
		return view('bar.edit', compact('bar'));
	}

	public function update(Request $request)
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

		return $this->show($bar->id);

	}

	public function destroy($id)
	{
		$bar = Bar::findOrFail($request->id);
		$bar->delete();
	}
}
	
