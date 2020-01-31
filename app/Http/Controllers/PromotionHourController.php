<?php

namespace App\Http\Controllers;

use App\PromotionHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Promotion;


class PromotionHourController extends Controller
{
    public $dow = [
        'Domingo',
        'Lunes',
        'Martes',
        'Miercoles',
        'Jueves',
        'Viernes',
        'Sabado'
    ];

    public function index($id)
    {
        $promotion = Promotion::findOrFail($id);
        if ($promotion->bar->id == Auth::id())
        {
            $promotionHours = $promotion->hours;
            $dow = $this->dow;
            return view('promotions.hours.index',compact('promotionHours', 'dow'));
        }
        else
            return back()->with('error', 'Esta promoción no le pertenece');
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required|integer|between:-1,6',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'enabled' => 'required|boolean',
        ]);    

        $promotion = Promotion::findOrFail($id);
        if ($promotion->bar->id == Auth::id())
        {
            //if date = -1, same start_time and end_time for every day
            if ( $request->date == -1)
            {
                for($count = 0; $count <= 6; $count++)
                {
                    $promotionHour = new PromotionHour();
                    $promotionHour->date = $count;
                    $promotionHour->start_time = $request->start_time;
                    $promotionHour->end_time = $request->end_time;
                    $promotionHour->enabled = $request->enabled;
                    $promotionHour->promotion_id = $id;
                    $promotionHour->save();
                }
            }
            else
            {
                $promotionHour = new PromotionHour();
                $promotionHour->date = $request->date;
                $promotionHour->start_time = $request->start_time;
                $promotionHour->end_time = $request->end_time;
                $promotionHour->enabled = $request->enabled;
                $promotionHour->promotion_id = $id;

                $promotionHour->save();
            }
            
            return back()->with('success', 'Horario agregado correctamente!');
        }
        else
            return back()->with('error', 'Esta promoción no le pertenece');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required|integer|between:-1,6',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after:start_time',
            'enabled' => 'required|boolean',
        ]);

        $promotionHour = PromotionHour::findOrFail($id);
        if ( $promotionHour->promotion->bar->id == Auth::id())
        {
            $promotionHour->date  = $request->date;
            $promotionHour->start_time = $request->start_time;
            $promotionHour->end_time = $request->end_time;
            $promotionHour->enabled = $request->enabled;
            $promotionHour->save();

            return back()->with('success', 'Horario editado correctamente');

        }
        else
            return back()->with('error', 'Este horario no le pertenece');
    }

    public function destroy($id)
    {
        $promotionHour = PromotionHour::findOrFail($id);
        if ( $promotionHour->promotion->bar->id == Auth::id())
        {
            $promotionHour->delete();
            return back()->with('success', 'Horario eliminado correctamente!');
        }
        else
            return back()->with('error', 'Este horario no le pertenece');
    }
}
