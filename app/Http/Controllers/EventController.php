<?php

namespace App\Http\Controllers;

use App\Event;
use App\City;
use Illuminate\Http\Request;
use Image;
use File;
use DB;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(20);
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
        
        $event = new Event();
        $event->title = $request->title;
        $event->address = $request->address;
        $event->lat = $request->lat;
        $event->lng = $request->lng;
        $event->description = $request->description;
        $event->city_id = $request->city_id;
        $event->enabled = $request->enabled;
        $event->date = $request->date;
    
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
        return redirect()->route('events.index')->with('success', 'Evento agregado correctamente!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

   public function edit($id)
    {
        $event = Event::findOrFail($id);
        $cities = City::pluck('name','id');
        return view('events.edit', compact('event','cities'));
    }

    public function update(Request $request, $id)
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
        
        $event = Event::findOrFail($id);
        $event->title = $request->title;
        $event->address = $request->address;
        $event->lat = $request->lat;
        $event->lng = $request->lng;
        $event->description = $request->description;
        $event->city_id = $request->city_id;
        $event->enabled = $request->enabled;
        $event->date = $request->date;
        //Save and get Id
        $event->save();

        //Image
        if($request->hasFile('image')) {
            //If has image, delete it before update
            $image = public_path('storage/images/events/').$event->image;
            if(File::exists($image) && $event->image != 'default.jpg') {
                File::delete($image);
            }
            $image = $request->file('image');
            $event->image = $event->id.time().'.'.$image->getClientOriginalExtension();
            
            //Store image
            Image::make($image)->fit(250, 250)->save(public_path('storage/images/events/') . $event->image );
            //Save Image info with ID
            $event->save();
        }

        return redirect()->route('events.show', ['id' => $event->id])->with('success', 'Evento editado correctamente!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        //Remove Image
        $image = public_path('storage/images/events/').$event->image;
        if(File::exists($image)) {
            File::delete($image);
        }
        $event->delete();
        
        return redirect()->route('events.index')->with('success', 'Evento eliminado correctamente!');
    }
}
