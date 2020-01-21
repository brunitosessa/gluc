<?php

namespace App\Http\Controllers;

use App\Promotion;
use Image;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index($bar_id)
    {
        $promotions = Promotion::all();
        return view('promotions.index',compact('promotions','bar_id'));
    }

    public function create(Request $request)
    {
        $promotion = new Promotion();
        $bar_id = $request->session()->get('id');
        return view('promotions.create', compact('promotion', 'bar_id'));
    }

    public function store(Request $request, $bar_id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:200',
            'happy_hour' => 'required|boolean',
            'enabled' => 'required|boolean',
            'exclusive' => 'required|boolean',
        ]);
        
        $promotion = new Promotion();
        $promotion->title = $request->title;
        $promotion->description = $request->description;
        $promotion->happy_hour = $request->happy_hour;
        $promotion->enabled = $request->enabled;
        $promotion->exclusive = $request->exclusive;
        $promotion->bar_id = $bar_id;
        //Save and get Id
        $promotion->save();

        //Image
        if($request->hasFile('image')) {
            $image = $request->image;
            $promotion->image = $promotion->id.time().'.'.$image->getClientOriginalExtension();
            //Store image
            Image::make($image)->fit(250, 250)->save(public_path('storage/images/promotions/') . $promotion->image );
            //Save Image info with ID
            $promotion->save();
        }
        return redirect()->route('bars.promotions.index', ['bar_id' => $bar_id])->with('success', 'Promocion agregada correctamente!');
    }

    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('promotions.show', compact('promotion'));
    }

    public function edit(Promotion $promotion)
    {
        $promotion = Promotion::findOrFail($id);
        return view('promotions.edit', compact('promotion'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:200',
            'happy_hour' => 'required|boolean',
            'enabled' => 'required|boolean',
            'exclusive' => 'required|boolean',
            'bar_id' => 'required|numeric',
        ]);
        
        $promotion = Promotion::findOrFail($id);
        $promotion->title = $request->title;
        $promotion->description = $request->description;
        $promotion->happy_hour = $request->happy_hour;
        $promotion->enabled = $request->enabled;
        $promotion->exclusive = $request->exclusive;
        $promotion->bar_id = $request->bar_id;
        $promotion->save();

        //Image
        if($request->hasFile('image')) {
            //If has image, delete it before update
            $image = public_path('storage/images/promotions/').$promotion->image;
            if(File::exists($image) && $promotion->image != 'default.jpg') {
                File::delete($image);
            }
            $image = $request->file('image');
            $promotion->image = $promotion->id.time().'.'.$image->getClientOriginalExtension();
            
            //Store image
            Image::make($image)->fit(250, 250)->save(public_path('storage/images/promotions/') . $promotion->image );
            //Save Image info with ID
            $promotion->save();
        }
        
        return redirect()->route('promotions.show', ['id' => $promotion->id])->with('success', 'Promocion editada correctamente!');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion = Promotion::findOrFail($id);
        //Remove Image
        $image = public_path('storage/images/promotions/').$promotion->image;
        if(File::exists($image)) {
            File::delete($image);
        }
        $promotion->delete();
        
        return redirect()->route('promotions.index')->with('success', 'Promocion eliminada correctamente!');
    }
}
