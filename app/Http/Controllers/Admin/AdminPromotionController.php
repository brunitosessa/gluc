<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Promotion;
use App\Bar;
use Image;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPromotionController extends Controller
{
    public function index($b_id)
    {
        $bar = Bar::findOrFail($b_id);
        $promotions = $bar->promotions;
        return view('admin.promotions.index',compact('promotions', 'bar'));
    }

    public function create($b_id)
    {
        $bar = Bar::findOrFail($b_id);
        $promotion = new Promotion();
        return view('admin.promotions.create', compact('promotion', 'bar'));
    }

    public function store(Request $request, $b_id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:200',
            'enabled' => 'required|boolean',
            'exclusive' => 'required|boolean',
        ]);
        
        $promotion = new Promotion();
        $promotion->title = $request->title;
        $promotion->description = $request->description;
        $promotion->enabled = $request->enabled;
        $promotion->exclusive = $request->exclusive;
        $promotion->bar_id = $b_id;
        
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
        return redirect()->route('admin.bars.promotions.index', [ 'b_id' => $b_id ])->with('success', 'Promocion agregada correctamente!');
    }

    public function show($b_id, $p_id)
    {
        $bar = Bar::findOrFail($b_id);
        $promotion = Promotion::findOrFail($p_id);
        return view('admin.promotions.show', compact('promotion', 'bar'));
    }

    public function edit($b_id, $p_id)
    {
        $bar = Bar::findOrFail($b_id);
        $promotion = Promotion::findOrFail($p_id);
        if ($promotion->bar->id == $b_id)
            return view('admin.promotions.edit', compact('promotion', 'bar'));
        else
            return back()->with('error', 'Esta promoción no pertenece al bar');
    }

    public function update(Request $request, $b_id, $p_id)
    {
        
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:200',
            'enabled' => 'required|boolean',
            'exclusive' => 'required|boolean',
        ]);

        $promotion = Promotion::findOrFail($p_id);
        $promotion->title = $request->title;
        $promotion->description = $request->description;
        $promotion->enabled = $request->enabled;
        $promotion->exclusive = $request->exclusive;
        $promotion->bar_id = $b_id;
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
        
        return redirect()->route('admin.bars.promotions.show', ['p_id' => $promotion->id, 'b_id' => $b_id ])->with('success', 'Promocion editada correctamente!');
    }

    public function destroy($b_id, $p_id)
    {
        $promotion = Promotion::findOrFail($p_id);
        if ($promotion->bar->id == $b_id)
        {
            //Remove Image
            $image = public_path('storage/images/promotions/').$promotion->image;
            if(File::exists($image)) {
                File::delete($image);
            }
            $promotion->delete();
            
            return redirect()->route('admin.bars.promotions.index', [ 'b_id' => $b_id ])->with('success', 'Promocion eliminada correctamente!');
        }
        else
            return back()->with('error', 'Esta promoción no le pertenece');
    }
}
