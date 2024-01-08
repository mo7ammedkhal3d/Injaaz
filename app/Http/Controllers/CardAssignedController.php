<?php

namespace App\Http\Controllers;

use App\Models\BoardMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use App\Models\Card; // Import your Card model

class CardAssignedController extends Controller
{
    public function addCardAssigned(Request $request)
    {
        $request->validate([
            'card_id' => 'required',
            'board_member_id' => 'required',
        ]);

        DB::table('card_assigned')->insert([
            'card_id' => $request->card_id,
            'board_member_id' => $request->board_member_id,     
        ]);

        $user = BoardMember::find($request->board_member_id)->user;

        return response()->json(['user_name'=>$user->name,'user_email'=>$user->email,'board_member_id'=>$request->board_member_id],201);
    }

    public function deleteCardAssigned(Request $request)
    {
        $request->validate([
            'card_id' => 'required',
            'board_member_id' => 'required',
        ]);

        DB::table('card_assigned')
            ->where('card_id', $request->card_id)
            ->where('board_member_id', $request->board_member_id)
            ->delete();

        return response()->json([true], 201);
    }
}
