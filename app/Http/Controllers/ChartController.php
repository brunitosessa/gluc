<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Charts\LatestUsers;

class ChartController extends Controller
{
    public function index()
    {
    	$chart = new LatestUsers;
    	$chart->labels(['One', 'Two', 'Three', 'Four']);
		$chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
		$chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

    	return view('charts.index', compact('chart'));
    }
}
