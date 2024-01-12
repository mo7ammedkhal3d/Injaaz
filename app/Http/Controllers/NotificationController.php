<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Board;
use App\Models\BoardMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function getAll(){
        $authenticatedUserId = auth()->user()->id;
    
        $notifications = Notification::where('recipient_user_id', $authenticatedUserId)
                                      ->orderBy('created_at', 'desc') 
                                      ->get();
    
        return view('dashboard.notification',['notifications' => $notifications]);
    }

    
    public function getNew() {
        $authenticatedUserId = auth()->user()->id;
    
        $notifications = Notification::where('recipient_user_id', $authenticatedUserId)
                                      ->where('inbox', true)
                                      ->orderBy('created_at', 'desc') 
                                      ->get();
    
        $unReadedNotifiction = $notifications->where('readed', false)->count();
    
        return response()->json(['notifications' => $notifications, 'unReaded_notifiction' => $unReadedNotifiction], 200);
    }

    public function moveToStack(Request $request){
        $notification = Notification::find($request->notification_id);

        if ($notification) {
            $notification->update(['inbox' => false]);
            return response()->json(true, 200);
        } else {
            return response()->json(false, 404); 
        }
    }

    public function changeReadState(){
        $authenticatedUserId = auth()->user()->id;
    
        $notifications = Notification::where('recipient_user_id', $authenticatedUserId)
                                      ->where('readed', false)
                                      ->get();

        foreach($notifications as $notification) {
            $notification->update(['readed' => true]);
        }

        return response()->json(true, 200);
    }

    public function updateNotificationState(Request $request){

        $notification = Notification::find($request->notification_id);

        if($request->update_type == 'reject'){
           $notification->update(['status' => 'reject']);
           return response()->json(['update_type'=>$request->update_type], 200);
        } else{
            $notification->update(['status' => 'confirm']);
            $board = Board::find($notification->board_id);
            BoardMember::create([
                'user_id' => $notification->recipient_user_id,
                'board_id' => $notification->board_id,
            ]);

            return response()->json(['update_type'=>$request->update_type,'board'=>$board], 200); 
        }
    }

    public function delete(Request $request){    
        $notification = Notification::find($request->notification_id);

        if ($notification) {
            $notification->delete();
            return response()->json(true, 200);
        } else {
            return response()->json(false, 404); 
        }
    }
}
