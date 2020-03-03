<?php
namespace App\Http\Controllers\Api;

use App\Bar;
use App\City;
use App\User;
use App\Promotion;
use App\Http\Controllers\Controller;
use App\Http\Resources\BarResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Image;
use File;
use DB;
use Carbon\Carbon;

class BarController extends Controller
{
    public function index() {
        $return1 = BarResource::collection(Bar::All());   
        $return2 = BarResource::collection(Bar::All());   
        return ($return1->merge($return2));
    }

    public function show($b_id)
    {
        return new BarResource(Bar::find($b_id));
    }
}