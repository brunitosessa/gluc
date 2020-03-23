<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class FirebaseController extends Controller
{
    public function sendAll(Request $request)
    {
    	//$recipients = User::whereNotNull('device_token')->pluck('device_token')->toArray();
    	$recipients = array('fypBDKG7ENg:APA91bGlvdn57T1-ceKaVPwx3RcoSZtQ3Swz1L529IfjBvV4NXWpNuJz81v7xxnbaB_CiEkj8Tevxydl53hycxuLBKJX6Uiw_ZNqTp5SCNiil142UzMX7QUVu1ZtstLyRJJeUzNRYH6V');

    fcm()
        ->to($recipients)
        ->notification([
            //'title' => $request->input('title'),
            //'body' => $request->input('body')
            'title' => 'Titulo',
            'body' => 'Cuerpo'
        ])
        ->send();

    $notification = 'Notificación enviada a todos los usuarios.';
    return back()->with(compact('notification'));
    }
}
