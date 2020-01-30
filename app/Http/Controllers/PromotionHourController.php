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
        {
            return back()->with('error', 'Esta promoción no le pertenece');
        }
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
