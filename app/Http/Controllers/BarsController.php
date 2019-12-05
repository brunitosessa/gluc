<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Bar;
use App\City;

class BarsController extends Controller
{
	public function index() {
		$bars = Bar::All();
		return view('bar.index',compact('bars'));
	}

	public function create()
	{
		$bar = new Bar();
		$cities = City::All(['id','name']);
		return view('bar.create', compact('bar','cities'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
        	'name' => 'required|max:255',
        	'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        	'city_id' => 'required|numeric',
        	'address' => 'required|max:200',
        	'description' => 'required|max:200',
        	'phone' => 'required|max:20',
        	'email' => 'required|email|max:100',
        	'lat' => 'required|numeric',
        	'lng' => 'required|numeric',
        	'enabled' => 'required|boolean',
    	]);

		$bar = new Bar();
		$bar->name = $request->name;
		$bar->city_id = $request->city_id;
		$bar->address = $request->address;
		$bar->description = $request->description;
		$bar->phone = $request->phone;
		$bar->email = $request->email;
		$bar->lat = $request->lat;
		$bar->lng = $request->lng;
		$bar->enabled = $request->enabled;
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
		dd($Bar->city());
		//return view('bar.edit', compact('bar'));
	}

	public function update(Request $request)
	{
		$this->validate($request, [
        	'name' => 'required|max:255',
        	'city_id' => 'required|numeric',
        	'address' => 'required|max:200',
        	'description' => 'required|max:200',
        	'phone' => 'required|max:20',
        	'email' => 'required|email|max:100',
        	'lat' => 'required|numeric',
        	'lng' => 'required|numeric',
        	'enabled' => 'required|boolean',
    	]);

		$bar = Bar::findOrFail($request->id);
		$bar->name = $request->name;
		$bar->city_id = $request->city_id;
		$bar->address = $request->address;
		$bar->description = $request->description;
		$bar->phone = $request->phone;
		$bar->email = $request->email;
		$bar->lat = $request->lat;
		$bar->lng = $request->lng;
		$bar->enabled = $request->enabled;

		$bar->save();

		return $this->show($bar->id);

	}

	public function destroy($id)
	{
		$bar = Bar::findOrFail($request->id);
		$bar->delete();
	}
}
	
