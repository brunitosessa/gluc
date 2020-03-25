<?php

namespace App\Http\Controllers;

use App\BusinessHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bar;

class BusinessHourController extends Controller
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

    public function index()
    {
        $bar = Bar::findOrFail(Auth::id());
        $businessHours = $bar->businessHours()->orderBy('date')->get();
        $dow = $this->dow;
        return view('businessHours.index',compact('businessHours', 'dow'));
    }

    public function store(Request $request)
    {
        $bar = Bar::findOrFail(Auth::id());

        $this->validate($request, [
            'date' => 'required|integer|between:-1,6',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'enabled' => 'required|boolean',
        ]);    

        //if date = -1, same start_time and end_time for every day
        if ( $request->date == -1)
        {
            //Before I've to delete all business hours
            $bar->businessHours()->delete();
            for($count = 0; $count <= 6; $count++)
            {
                $businessHour = new BusinessHour();
                $businessHour->date = $count;
                $businessHour->start_time = $request->start_time;
                $businessHour->end_time = $request->end_time;
                $businessHour->enabled = $request->enabled;
                $businessHour->bar_id = Auth::id();
                $businessHour->save();
            }
        }
        else
        {
            BusinessHour::updateOrCreate(
                [
                    'date' => $request->date,
                    'bar_id' => Auth::id(),
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

        $businessHour = BusinessHour::findOrFail($id);
        if ( $businessHour->bar->id == Auth::id())
        {
            $businessHour->date  = $request->date;
            $businessHour->start_time = $request->start_time;
            $businessHour->end_time = $request->end_time;
            $businessHour->enabled = $request->enabled;
            $businessHour->save();

            return back()->with('success', 'Horario editado correctamente');

        }
        else
            return back()->with('error', 'Este horario no le pertenece');
    }

    public function destroy($id)
    {
        $businessHour = BusinessHour::findOrFail($id);
        if ($businessHour->bar->id == Auth::id())
        {
            $businessHour->delete();
            return back()->with('success', 'Horario eliminado correctamente!');
        }
        else
            return back()->with('error', 'Este horario no le pertenece');
    }
}
