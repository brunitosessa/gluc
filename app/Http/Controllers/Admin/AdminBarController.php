<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Bar;
use App\City;
use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Image;
use File;
use DB;

class AdminBarController extends Controller
{
    public function index() {
        $bars = Bar::paginate(20);
        return view('admin.bars.index',compact('bars'));
    }

    public function create()
    {
        $bar = new Bar();
        $cities = City::pluck('name','id');
        return view('admin.bars.create', compact('bar','cities'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'password' => 'required|min:8',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        $bar->password = Hash::make($request->password);
        //Save and get Id
        $bar->save();

        //Image
        if($request->hasFile('image')) {
            $image = $request->image;
            $bar->image = $bar->id.time().'.'.$image->getClientOriginalExtension();
            //Store image
            Image::make($image)->fit(300, 250)->save(public_path('storage/images/bars/') . $bar->image );
            //Save Image info with ID
            $bar->save();
        }
        //Logo
        if($request->hasFile('logo')) {
            $logo = $request->logo;
            $bar->logo = $bar->id.time().'.'.$logo->getClientOriginalExtension();
            //Store logo
            Image::make($logo)->fit(250, 250)->save(public_path('storage/images/bars/logos/') . $bar->logo );
            //Save Image info with ID
            $bar->save();
        }
        return redirect()->route('admin.bars.index')->with('success', 'Bar agregado correctamente!');
    }
    
    public function show($b_id)
    {
        $bar = Bar::findOrFail($b_id);
        return view('admin.bars.show', compact('bar'));
    }

    public function edit($b_id)
    {
        $bar = Bar::findOrFail($b_id);
        $cities = City::pluck('name','id');
        return view('admin.bars.edit', compact('bar','cities'));
    }

    public function update(Request $request, $b_id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'city_id' => 'required|numeric',
            'address' => 'required|max:200',
            'description' => 'required|max:200',
            'phone' => 'required|max:20',
            'email' => 'required|email|max:100',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'enabled' => 'required|boolean',
        ]);
        
        $bar = Bar::findOrFail($b_id);
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
            //If has image, delete it before update
            $image = public_path('storage/images/bars/').$bar->image;
            if(File::exists($image) && $bar->image != 'default.jpg') {
                File::delete($image);
            }
            $image = $request->file('image');
            $bar->image = $bar->id.time().'.'.$image->getClientOriginalExtension();
            
            //Store image
            Image::make($image)->fit(300, 250)->save(public_path('storage/images/bars/') . $bar->image );
            //Save Image info with ID
            $bar->save();
        }

        //Logo
        if($request->hasFile('logo')) {
            //If has logo, delete it before update
            $logo = public_path('storage/images/bars/logos/').$bar->logo;
            if(File::exists($logo) && $bar->logo != 'default.jpg') {
                File::delete($logo);
            }

            $logo = $request->logo;
            $bar->logo = $bar->id.time().'.'.$logo->getClientOriginalExtension();
            //Store logo
            Image::make($logo)->fit(250, 250)->save(public_path('storage/images/bars/logos/') . $bar->logo );
            //Save Image info with ID
            $bar->save();
        }

        return redirect()->route('admin.bars.show', [ 'id' => $bar->id ])->with('success', 'Bar editado correctamente!');
    }
    
    public function destroy($b_id)
    {
        $bar = Bar::findOrFail($b_id);
        //Remove Bar Image
        $image = public_path('storage/images/bars/').$bar->image;
        if(File::exists($image) && $bar->image != 'default.jpg') {
            File::delete($image);
        }
        
        //Remove Logo
        $logo = public_path('storage/images/bars/logos/').$bar->logo;
        if(File::exists($logo) && $bar->logo != 'default.jpg') {
            File::delete($logo);
        }
        
        //Remove Promotions Images
        foreach($bar->promotions as $promotion)
        {
            $image = public_path('storage/images/promotions/').$promotion->image;
            if(File::exists($image) && $promotion->image != 'default.jpg') {
                File::delete($image);
            }
        }

        $bar->delete();
        
        return redirect()->route('admin.bars.index')->with('success', 'Bar eliminado correctamente!');
    }

    public function showPromotions($b_id)
    {
        $bar = Bar::findOrFail($b_id);
        $promotions = $bar->promotions;
        return view('admin.promotions.index', compact('promotions', 'bar'));
    }
}