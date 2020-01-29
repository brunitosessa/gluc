<?php

namespace App\Http\Controllers;

use App\BusinessHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bar;

class BusinessHourController extends Controller
{
    public function index()
    {
        $bar = Bar::findOrFail(Auth::id());
        $businessHours = $bar->businessHours;
        return view('businessHours.index',compact('businessHours'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(BusinessHour $businessHour)
    {
        //
    }

    public function edit(BusinessHour $businessHour)
    {
        //
    }

    public function update(Request $request, BusinessHour $businessHour)
    {
        echo "ACtualizando";
    }

    public function destroy(BusinessHour $businessHour)
    {
        //
    }
}
