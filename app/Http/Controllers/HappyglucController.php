<?php

namespace App\Http\Controllers;

use App\Happygluc;
use Illuminate\Http\Request;

class HappyglucController extends Controller
{
    public function create($bar_id)
    {
        $happygluc = new Happygluc($bar_id);
        return view('happyglucs.create', compact('happygluc', 'bar_id'));
    }

    public function store(Request $request)
    {
        //
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
