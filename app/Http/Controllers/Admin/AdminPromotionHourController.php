<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PromotionHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Promotion;
use App\Bar;


class AdminPromotionHourController extends Controller
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

    public function index($b_id, $p_id)
    {
        $bar = Bar::findOrFail($b_id);
        $promotion = Promotion::findOrFail($p_id);
        $promotionHours = $promotion->hours()->orderBy('date')->get();
        $dow = $this->dow;
        return view('admin.promotions.hours.index',compact('promotionHours', 'promotion', 'bar', 'dow'));
    }

    public function store(Request $request, $b_id, $p_id)
    {
        $this->validate($request, [
            'date' => 'required|integer|between:-1,6',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'enabled' => 'required|boolean',
        ]);    

        $bar = Bar::findOrFail($b_id);
        $promotion = Promotion::findOrFail($p_id);
        //if date = -1, same start_time and end_time for every day
        if ( $request->date == -1)
        {
            //Before I've to delete all promotion hours
            $promotion->hours()->delete();
            for($count = 0; $count <= 6; $count++)
            {
                $promotionHour = new PromotionHour();
                $promotionHour->date = $count;
                $promotionHour->start_time = $request->start_time;
                $promotionHour->end_time = $request->end_time;
                $promotionHour->enabled = $request->enabled;
                $promotionHour->promotion_id = $p_id;
                $promotionHour->save();
            }
        }
        else
        {
            PromotionHour::updateOrCreate(
                [
                    'date' => $request->date,
                    'promotion_id' => $p_id
                ],
                [
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'enabled' => $request->enabled,
                ]
            );
        }
        return back()->with('success', 'Horario agregado correctamente!');
    }

    public function update(Request $request, $b_id, $p_id)
    {
        $this->validate($request, [
            'date' => 'required|integer|between:-1,6',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after:start_time',
            'enabled' => 'required|boolean',
        ]);

        $bar = Bar::findOrFail($b_id);
        $promotionHour = PromotionHour::findOrFail($id);
        $promotionHour->date  = $request->date;
        $promotionHour->start_time = $request->start_time;
        $promotionHour->end_time = $request->end_time;
        $promotionHour->enabled = $request->enabled;
        $promotionHour->save();

        return back()->with('success', 'Horario editado correctamente');
    }

    public function destroy($b_id, $p_id)
    {
        $bar = Bar::findOrFail($b_id);
        $promotionHour = PromotionHour::findOrFail($p_id);
        $promotionHour->delete();

        return back()->with('success', 'Horario eliminado correctamente!');
    }
}
