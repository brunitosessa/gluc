<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Publicity;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use File;

class AdminPublicityController extends Controller
{
    public function index() {
        $publicities = Publicity::paginate(20);
        return view('admin.publicities.index',compact('publicities'));
    }

    public function create()
    {
        $publicity = new Publicity();
        $cities = City::pluck('name','id');
        return view('admin.publicities.create', compact('publicity','cities'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:200',
            'city_id' => 'required|numeric',
            'end_date' => 'date|after:now',
            'enabled' => 'required|boolean',
        ]);

        $publicity = new Publicity();
        $publicity->title = $request->title;
        $publicity->description = $request->description;
        $publicity->city_id = $request->city_id;
        $publicity->end_date = $request->end_date;
        $publicity->enabled = $request->enabled;
        
        $publicity->save();

        //Image
        if($request->hasFile('image')) {
            $image = $request->image;
            $publicity->image = $publicity->id.time().'.'.$image->getClientOriginalExtension();
            //Store image
            Image::make($image)->fit(300, 250)->save(public_path('storage/images/publicities/') . $publicity->image );
            //Save Image info with ID
            $publicity->save();
        }
        
        return redirect()->route('admin.publicities.index')->with('success', 'Publicidad agregado correctamente!');
    }
    
    public function show($p_id)
    {
        $publicity = Publicity::findOrFail($p_id);
        return view('admin.publicities.show', compact('publicity'));
    }

    public function edit($p_id)
    {
        $publicity = Publicity::findOrFail($p_id);
        $cities = City::pluck('name','id');
        return view('admin.publicities.edit', compact('publicity','cities'));
    }

    public function update(Request $request, $p_id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:200',
            'city_id' => 'required|numeric',
            'end_date' => 'date|after:now',
            'enabled' => 'required|boolean',
        ]);

        $publicity = Publicity::findOrFail($p_id);

        $publicity->title = $request->title;
        $publicity->description = $request->description;
        $publicity->city_id = $request->city_id;
        $publicity->end_date = $request->end_date;
        $publicity->enabled = $request->enabled;
        
        $publicity->save();

        //Image
        if($request->hasFile('image')) {
            //If has image, delete it before update
            $image = public_path('storage/images/publicities/').$publicity->image;
            if(File::exists($image) && $publicity->image != 'default.jpg') {
                File::delete($image);
            }
            $image = $request->file('image');
            $publicity->image = $publicity->id.time().'.'.$image->getClientOriginalExtension();
            
            //Store image
            Image::make($image)->fit(300, 250)->save(public_path('storage/images/publicities/') . $publicity->image );
            //Save Image info with ID
            $publicity->save();
        }

        return redirect()->route('admin.publicities.show', [ 'id' => $publicity->id ])->with('success', 'Publicidad editada correctamente!');
    }
    
    public function destroy($p_id)
    {
        $publicity = Publicity::findOrFail($p_id);
        
        $image = public_path('storage/images/publicities/').$publicity->image;
        if(File::exists($image) && $publicity->image != 'default.jpg') {
            File::delete($image);
        }
        
        $publicity->delete();
        
        return redirect()->route('admin.publicities.index')->with('success', 'Publicidad eliminada correctamente!');
    }
}