<?php

namespace App\Http\Controllers;

use App\Beer;
use App\Bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeerController extends Controller
{
    public function index()
    {
        $bar = Bar::findOrFail(Auth::id());
        $beers = $bar->beers;
        return view('beers.index',compact('beers'));
    }

    public function store(Request $request)
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
        $beer->bar_id = Auth::id();
    
        //Save and get Id
        $beer->save();

        return redirect()->route('beers.index')->with('success', 'Cerveza agregada correctamente!');
    }

   public function update(Request $request, $id)
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
        if ($beer->bar->id == Auth::id())
        {
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
            $beer->bar_id = Auth::id();
        
            $beer->save();

            return redirect()->route('beers.index')->with('success', 'Cerveza editada correctamente!');
        }
        else
            return back()->with('error', 'Esta cerveza no le pertenece');
    }

    public function destroy($id)
    {
        $beer = Beer::findOrFail($id);
        if ($beer->bar->id == Auth::id())
        {
            $beer->delete();
            
            return redirect()->route('beers.index')->with('success', 'Cerveza eliminada correctamente!');
        }
        else
            return back()->with('error', 'Esta cerveza no le pertenece');
    }
}
