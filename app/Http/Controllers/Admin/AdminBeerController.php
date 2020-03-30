<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Beer;
use App\Bar;
use Illuminate\Support\Facades\Auth;

class AdminBeerController extends Controller
{
    public function index($b_id)
    {
        $bar = Bar::findOrFail($b_id);
        $beers = $bar->beers;
        return view('admin.beers.index',compact('beers', 'bar'));
    }

    public function store(Request $request, $b_id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'style' => 'required|max:255',
            'description' => 'required|max:255',
            'brand' => 'required|max:255',
            'color' => 'required|max:255',
            'ibu' => 'nullable|numeric',
            'alcohol' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'happyhour_price' => 'nullable|numeric',
            'enabled' => 'required|boolean',
        ]);
        
        $beer = new Beer();
        $beer->name = $request->name;
        $beer->style = $request->style;
        $beer->description = $request->description;
        $beer->brand = $request->brand;
        $beer->color = $request->color;
        $beer->ibu = $request->ibu;
        $beer->alcohol = $request->alcohol;
        $beer->price = $request->price;
        $beer->happyhour_price = $request->happyhour_price;
        $beer->enabled = $request->enabled;
        $beer->bar_id = $b_id;
    
        //Save and get Id
        $beer->save();

        return redirect()->route('admin.bars.beers.index', $b_id)->with('success', 'Cerveza agregada correctamente!');
    }

   public function update(Request $request, $b_id, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'style' => 'required|max:255',
            'description' => 'required|max:255',
            'brand' => 'required|max:255',
            'color' => 'required|max:255',
            'ibu' => 'nullable|numeric',
            'alcohol' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'happyhour_price' => 'nullable|numeric',
            'enabled' => 'required|boolean',
        ]);

        $beer = Beer::findOrFail($id);
        $beer->name = $request->name;
        $beer->style = $request->style;
        $beer->description = $request->description;
        $beer->brand = $request->brand;
        $beer->color = $request->color;
        $beer->ibu = $request->ibu;
        $beer->alcohol = $request->alcohol;
        $beer->price = $request->price;
        $beer->happyhour_price = $request->happyhour_price;
        $beer->enabled = $request->enabled;
        $beer->bar_id = $b_id;
    
        $beer->save();

        return redirect()->route('admin.bars.beers.index', $b_id)->with('success', 'Cerveza editada correctamente!');
    }

    public function destroy($id, $b_id)
    {
        $beer = Beer::findOrFail($id);
        $beer->delete();
            
        return redirect()->route('admin.bars.beers.index', $b_id)->with('success', 'Cerveza eliminada correctamente!');
    }
}
