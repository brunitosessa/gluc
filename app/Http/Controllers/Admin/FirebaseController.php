<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class FirebaseController extends Controller
{
    public function sendAll(Request $request)
    {
    	$recipients = User::whereNotNull('device_token')->pluck('device_token')->toArray();
    	fcm()
        	->to($recipients)
        	->data([
           		//'title' => $request->input('title'),
           		//'body' => $request->input('body')
           		'title' => 'Titulo',
           		'body' => 'Cuerpo'
        	])
        	->notification([
           		//'title' => $request->input('title'),
           		//'body' => $request->input('body')
           		'title' => 'Titulo',
           		'body' => 'Cuerpo'
        	])
        	->send();

    	$notification = 'Notificación enviada a todos los usuarios.';
    	return back()->with('success', $notification);
    }
}
