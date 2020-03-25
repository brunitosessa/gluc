<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Happygluc;

class AdminHappyglucController extends Controller
{
    public function create($bar_id)
    {
        $happygluc = new Happygluc();
        return view('happyglucs.create', compact('happygluc', 'bar_id'));
    }

    public function store(Request $request, $bar_id)
    {
        $this->validate($request, [
            'frequency' => 'required|numeric',
            'quantity' => 'required|numeric',
            'exclusive' => 'required|boolean',
            'enabled' => 'required|boolean',
        ]);

        Happygluc::updateOrCreate(
            [
                'bar_id' => $bar_id,
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
}
