<?php

namespace App\Http\Controllers;

use App\Event;
use App\City;
use DB;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = DB::table('events')->paginate(20);
        return view('events.index',compact('events'));

    }

    public function create()
    {
        $event = new Event();
        $cities = City::pluck('name','id');
        return view('events.create', compact('event','cities'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required|max:200',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'description' => 'required|max:200',
            'city_id' => 'required|numeric',
            'enabled' => 'required|boolean',
            'date' => 'required|date',
        ]);
        
        $event = new Bar();
        $event->title = $request->title;
        $event->address = $request->address;
        $event->lat = $request->lat;
        $event->lng = $request->lng;
        $event->description = $request->description;
        $event->city_id = $request->city_id;
        $event->enabled = $request->enabled;
        $event->enabled = $request->date;
    
        //Save and get Id
        $event->save();
        //Image
        if($request->hasFile('image')) {
            $image = $request->image;
            $event->image = $event->id.time().'.'.$image->getClientOriginalExtension();
            //Store image
            Image::make($image)->fit(250, 250)->save(public_path('storage/images/events/') . $event->image );
            //Save Image info with ID
            $event->save();
        }
        return redirect()->route('events.index')->with('success', 'Bar agregado correctamente!');
    }

    public function show(Event $event)
    {
        //
    }

   public function edit(Event $event)
    {
        //
    }

    public function update(Request $request, Event $event)
    {
        //
    }

    public function destroy(Event $event)
    {
        //
    }
}
