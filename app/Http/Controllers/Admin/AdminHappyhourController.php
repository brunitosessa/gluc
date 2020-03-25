<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Happyhour;
use App\Bar;

class AdminHappyhourController extends Controller
{
    public $dow = [
        -1 => 'Todos los días',
        0 => 'Domingo',
        1 => 'Lunes',
        2 => 'Martes',
        3 => 'Miercoles',
        4 => 'Jueves',
        5 => 'Viernes',
        6 => 'Sabado'
    ];

    public function index($bar_id)
    {
        $bar = Bar::findOrFail($bar_id);
        $happyhours = $bar->happyhours()->orderBy('date')->get();        
        $dow = $this->dow;
        return view('admin.happyhours.index',compact('happyhours', 'bar', 'dow'));
    }

    public function store(Request $request, $b_id)
    {
        $bar = Bar::findOrFail($b_id);

        $this->validate($request, [
            'date' => 'required|integer|between:-1,6',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'enabled' => 'required|boolean',
        ]);    

        //if date = -1, same start_time and end_time for every day
        if ( $request->date == -1)
        {
            //Before I've to delete all happy hours
            $bar->happyhours()->delete();
            for($count = 0; $count <= 6; $count++)
            {
                $happyhour = new happyhour();
                $happyhour->date = $count;
                $happyhour->start_time = $request->start_time;
                $happyhour->end_time = $request->end_time;
                $happyhour->enabled = $request->enabled;
                $happyhour->bar_id = $b_id;

                $happyhour->save();
            }
        }
        else
        {
            happyhour::updateOrCreate(
                [
                    'date' => $request->date,
                    'bar_id' => $b_id,
                ],
                [
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'enabled' => $request->enabled,
                ]
            );
        }
        
        return back()->with('success', 'Horarios agregado correctamente!');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required|integer|between:-1,6',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'enabled' => 'required|boolean',
        ]);

        $happyhour = happyhour::findOrFail($id);
        $happyhour->date  = $request->date;
        $happyhour->start_time = $request->start_time;
        $happyhour->end_time = $request->end_time;
        $happyhour->enabled = $request->enabled;
        $happyhour->save();

        return back()->with('success', 'Horario editado correctamente');
    }

    public function destroy($id)
    {
        $happyhour = happyhour::findOrFail($id);
		$happyhour->delete();
        
        return back()->with('success', 'Horario eliminado correctamente!');
    }
}
