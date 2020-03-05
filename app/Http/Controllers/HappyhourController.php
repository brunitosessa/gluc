<?php

namespace App\Http\Controllers;

use App\happyhour;
use Illuminate\Http\Request;

class HappyhourController extends Controller
{
    public function create()
    {
        $happyhour = new Happyhour($bar_id);
        return view('happyhours.create', compact('happyhour', 'bar_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'frequency' => 'required|numeric',
            'quantity' => 'required|numeric',
            'exclusive' => 'required|boolean',
            'enabled' => 'required|boolean',
        ]);

        Happygluc::updateOrCreate(
            [
                'bar_id' => Auth::id()
            ],
            [
                'frequency' => $request->frequency,
                'quantity' => $request->quantity,
                'exclusive' => $request->exclusive,
                'enabled' => $request->enabled
            ]
        );

        return back()->with('success', 'Happy Gluc editado correctamente!');
    }

    public function destroy(happyhour $happyhour)
    {
        //
    }
}
