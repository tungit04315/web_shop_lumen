<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\notification;

class HomeController extends Controller
{
    public function Home() {
        return view('index');
    }

    public function Create(Request $request){

        $Notification = new notification();
        $Notification->notification_title = $request->input('title');
        $Notification->notification_describe = $request->input('about');
        $Notification->notification_date = date('Y-m-d H:i:s');
        $Notification->user = 'LC';
        echo $Notification->save();
        return redirect('/admin');
    }
}
