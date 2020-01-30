<?php

namespace App\Http\Controllers;

use App\Happygluc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HappyglucController extends Controller
{
    public function create($bar_id)
    {
        $happygluc = new Happygluc($bar_id);
        return view('happyglucs.create', compact('happygluc', 'bar_id'));
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

        return back()->with('success', 'Happy Gluc editado correctamente!');;
    }

    public function destroy($id)
    {
        //
    }
}