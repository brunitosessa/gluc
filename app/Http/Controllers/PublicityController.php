<?php

namespace App\Http\Controllers;

use App\Publicity;
use App\City;
use Illuminate\Http\Request;
use Image;
use File;
use DB;

class PublicityController extends Controller
{
    public function index()
    {
        $publicities = Publicity::paginate(15);
        return view('publicities.index',compact('publicities'));
    }

    public function create()
    {
        $publicities = new Publicity();
        $cities = City::pluck('name','id');
        return view('publicities.create', compact('publicity','cities'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:200',
            'city_id' => 'required|numeric',
            'enabled' => 'required|boolean',
            'end_date' => 'required|date',
        ]);
        
        $publicity = new Publicity();
        $publicity->title = $request->title;
        $publicity->description = $request->description;
        $publicity->city_id = $request->city_id;
        $publicity->enabled = $request->enabled;
        $publicity->end_date = $request->end_date;
    
        //Save and get Id
        $publicity->save();

        //Image
        if($request->hasFile('image')) {
            $image = $request->image;
            $publicity->image = $publicity->id.time().'.'.$image->getClientOriginalExtension();
            //Store image
            Image::make($image)->fit(250, 250)->save(public_path('storage/images/publicities/') . $publicity->image );
            //Save Image info with ID
            $publicity->save();
        }
        return redirect()->route('publicities.index')->with('success', 'Publicidad agregada correctamente!');
    }

    public function show($id)
    {
        $publicity = Publicity::findOrFail($id);
        return view('publicities.show', compact('publicity'));
    }

    public function edit($id)
    {
        $publicity = Publicity::findOrFail($id);
        $cities = City::pluck('name','id');
        return view('publicities.edit', compact('publicity','cities'));
    }

    public function update(Request $request, Publicity $publicity)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:200',
            'city_id' => 'required|numeric',
            'enabled' => 'required|boolean',
            'end_date' => 'required|date',
        ]);

        $publicity = Publicity::findOrFail($request->id);
        $publicity->title = $request->title;
        $publicity->description = $request->description;
        $publicity->city_id = $request->city_id;
        $publicity->enabled = $request->enabled;
        $publicity->end_date = $request->end_date;
        //Save and get Id
        $publicity->save();

        //Image
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $publicity->image = $publicity->id.time().'.'.$image->getClientOriginalExtension();
            
            //Store image
            Image::make($image)->fit(250, 250)->save(public_path('storage/images/publicities/') . $publicity->image );
            //Save Image info with ID
            $publicity->save();
        }

        return redirect()->route('publicities.show', ['id' => $publicity->id])->with('success', 'Publicidad editada correctamente!');
    }

    public function destroy(Publicity $publicity)
    {
        $publicity = Publicity::findOrFail($id);
        //Remove Image
        $image = public_path('storage/images/publicities/').$publicity->image;
        if(File::exists($image)) {
            File::delete($image);
        }
        $publicity->delete();
        
        return redirect()->route('publicities.index')->with('success', 'Publicidad eliminada correctamente!');
    }
}
