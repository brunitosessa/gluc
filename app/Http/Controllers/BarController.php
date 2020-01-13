<?php
namespace App\Http\Controllers;

use App\Bar;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;
use File;
use DB;

class BarController extends Controller
{
    public function index() {
        $bars = DB::table('bars')->paginate(200);
        return view('bars.index',compact('bars'));
    }
    public function create()
    {
        $bar = new Bar();
        $cities = City::pluck('name','id');
        return view('bars.create', compact('bar','cities'));
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
        //Save and get Id
        $bar->save();
        //Image
        if($request->hasFile('image')) {
            $image = $request->image;
            $bar->image = $bar->id.time().'.'.$image->getClientOriginalExtension();
            //Store image
            Image::make($image)->fit(250, 250)->save(public_path('storage/images/bars/') . $bar->image );
            //Save Image info with ID
            $bar->save();
        }
        return redirect()->route('bars.index')->with('success', 'Bar agregado correctamente!');
    }
    
    public function show($id)
    {
        $bar = Bar::findOrFail($id);
        return view('bars.show', compact('bar'));
    }

    public function edit($id)
    {
        $bar = Bar::findOrFail($id);
        $cities = City::pluck('name','id');
        return view('bars.edit', compact('bar','cities'));
    }

    public function update(Request $request)
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
        //Image
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $bar->image = $bar->id.time().'.'.$image->getClientOriginalExtension();
            
            //Store image
            Image::make($image)->fit(250, 250)->save(public_path('storage/images/bars/') . $bar->image );
            //Save Image info with ID
            $bar->save();
        }
        return redirect()->route('bars.show', ['id' => $bar->id])->with('success', 'Bar editado correctamente!');
    }
    public function destroy($id)
    {
        $bar = Bar::findOrFail($id);
        //Remove Image
        $image = public_path('storage/images/bars/').$bar->image;
        if(File::exists($image)) {
            File::delete($image);
        }
        $bar->delete();
        
        return redirect()->route('bars.index')->with('success', 'Bar eliminado correctamente!');
    }
}