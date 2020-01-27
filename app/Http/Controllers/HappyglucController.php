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

        $happygluc = new Happygluc();
        $happygluc->frequency = $request->frequency;
        $happygluc->quantity = $request->quantity;
        $happygluc->exclusive = $request->exclusive;
        $happygluc->enabled = $request->enabled;
        $happygluc->bar_id = Auth::id();

        $happygluc->save();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}