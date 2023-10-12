<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $query = notification::query();

        if ($request->has('notification_title')) {
            $query->where('notification_title', $request->input('notification_title'));
        }

        $notify = $query->paginate($perPage);

        return response()->json($notify);
    }

    public function Home()
    {
        $notification = notification::all();

        // echo $notification;
        return view('index', ['notification' => $notification]);
        // return view('index');
    }

    public function ListNotifications()
    {
        return notification::all();
    }

    public function Create(Request $request)
    {

        $Notification = new notification();
        $Notification->notification_title = $request->input('notification_title');
        $Notification->notification_describe = $request->input('notification_describe');
        $Notification->notification_img = $request->input('notification_img');
        $Notification->notification_date = date('Y-m-d H:i:s');
        $Notification->retry_count = $request->input('retry_count');
        $Notification->notification_date = date('Y-m-d H:i:s');
        $Notification->user = 'LC';
        echo $Notification->save();

        $data = [
            'name' => 'Tùng',
            'content' => $request->input('notification_describe')
        ];

        Mail::send("mail", $data, function ($message) {
            $message->to("tungit04315@gmail.com")->subject("Test Code Email Queues.");
        });

        return redirect('/admin');
    }

    public function Update(Request $request, $id)
    {

        $notify = notification::find($id);
        echo $notify . $id;

        if (!$notify) {
            return response()->json(['message' => 'Thông báo không tồn tại'], 404);
        }

        $notify->notification_title = $request->input('title');
        $notify->notification_describe = $request->input('about');
        $notify->notification_img = $request->input('img');
        $notify->notification_date = date('Y-m-d H:i:s');
        $Notification->retry_count = $request->input('retry_count');
        $Notification->notification_date = date('Y-m-d H:i:s');
        $notify->user = 'LC';
        echo $notify->save();
        return redirect('/admin');
    }

    public function Delete(Request $request, $id)
    {

        $notify = notification::find($id);

        if (!$notify) {
            return response()->json(['message' => 'Thông báo không tồn tại'], 404);
        }

        $notify->delete();
        return redirect('/admin');
    }

    public function FindById(Request $request)
    {

        // $notify = notification::find($notification_id);

        $id = $request->input('id');

        $notify = notification::Where('id', $id);
        $results = $notify->get();

        if ($results == null) {
            return response()->json(['message' => 'Thông báo không tồn tại'], 404);
        }

        echo $results;
    }
}
