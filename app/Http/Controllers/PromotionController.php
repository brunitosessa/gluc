<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Bar;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    public function index()
    {
        $bar = Bar::findOrFail(Auth::id());
        $promotions = $bar->promotions;
        return view('promotions.index',compact('promotions'));
    }

    public function create()
    {
        $promotion = new Promotion();
        return view('promotions.create', compact('promotion'));
    }

    public function store(Request $request)
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
        $promotion->bar_id = Auth::id();
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
        return redirect()->route('promotions.index')->with('success', 'Promocion agregada correctamente!');
    }

    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);
        if ($promotion->bar->id == Auth::id())
            return view('promotions.show', compact('promotion'));
        else
            return back()->with('error', 'Esta promoción no le pertenece');
    }

    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        if ($promotion->bar->id == Auth::id())
            return view('promotions.edit', compact('promotion'));
        else
            return back()->with('error', 'Esta promoción no le pertenece');
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
        ]);

        $promotion = Promotion::findOrFail($id);
        if ($promotion->bar->id == Auth::id())
        {
            $promotion = Promotion::findOrFail($id);
            $promotion->title = $request->title;
            $promotion->description = $request->description;
            $promotion->happy_hour = $request->happy_hour;
            $promotion->enabled = $request->enabled;
            $promotion->exclusive = $request->exclusive;
            $promotion->bar_id = Auth::id();
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
        else
            return back()->with('error', 'Esta promoción no le pertenece');
    }

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        if ($promotion->bar->id == Auth::id())
        {
            //Remove Image
            $image = public_path('storage/images/promotions/').$promotion->image;
            if(File::exists($image)) {
                File::delete($image);
            }
            $promotion->delete();
            
            return redirect()->route('promotions.index')->with('success', 'Promocion eliminada correctamente!');
        }
        else
            return back()->with('error', 'Esta promoción no le pertenece');
    }
}
