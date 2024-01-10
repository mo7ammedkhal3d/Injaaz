<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getAll(){
        // Assuming you are using Laravel's built-in authentication
        $authenticatedUserId = auth()->user()->id;
    
        $notifications = Notification::where('recipient_user_id', $authenticatedUserId)
                                      ->orderBy('created_at', 'desc') // Change 'desc' to 'asc' if you want ascending order
                                      ->get();
    
        return response()->json(['notifications'=>$notifications], 200);
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
