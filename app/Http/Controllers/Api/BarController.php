<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Bar;
use App\City;
use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Image;
use File;
use DB;

class BarController extends Controller
{
    public function index() {
        return Bar::all();   
    }

    public function show(Request $request)
    {
        return Bar::findOrFail($request->id);
    }

    public function showPromotions(Request $request)
    {
        $bar = Bar::findOrFail($request->id);
        return $bar->promotions;
    }
}