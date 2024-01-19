<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardMember;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getAll(){

        $users = User::where('id', '!=', Auth::user()->id)->get();
        return response()->json(['users'=>$users],200);
    }

    public function getUninvite($user_Id,$board_id){
        
        $usersInBoard = BoardMember::where('board_id', $board_id)
            ->pluck('user_id'); 

        $users = User::whereNotIn('id', $usersInBoard) 
            ->whereNotIn('id', function ($query) use ($board_id) {
                $query->select('recipient_user_id')
                    ->from('notifications')
                    ->where('board_id', $board_id)
                    ->where('status', 'inprogress');
            })
            ->where('id', '<>', auth()->id()) 
            ->get();

        return response()->json(['users'=>$users],200);
    }


    public function viewGetUserProfile(){

        $user = User::find(auth()->user()->id);

        return view('dashboard.profile',['section'=>'user_profile','user'=>$user]);
    }

    public function viewGetUserBoards(){

        $boards = $this->GetUserBoards();

        return view('dashboard.profile',['section'=>'user_boards','boards'=>$boards]);
    }

    
    public function viewGetUserCards(){

        $cards= $this->GetUserCards();

        return view('dashboard.profile',['section'=>'user_cards','cards'=>$cards]);
    }


    public function jsonGetUserProfile(){
        $user = User::find(auth()->user()->id);

        return response()->json(['user_name'=>$user->name,'user_bio'=>$user->bio], 200);
    }

    public function saveProfile(Request $request)
    {
        $user = User::find(auth()->user()->id);
    
        $user->update([
            'name' => $request->user_name,
            'bio' => $request->user_bio,
        ]);
    
        return response()->json(['message'=>'تم التعديل','user'=>$user], 200);
    }


    public function GetUserBoards(){

        $userId =  auth()->user()->id;
        $userBoards = Board::where('user_id', $userId)
        ->orWhereHas('boardMembers', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->with('boardMembers') 
        ->get();

        $boards=[];
        

        foreach($userBoards as $board){
            $cardsNo =0;
            foreach ($board->lists as  $list) {
                $cardsNo+=$list->cards->count();
            }
            $board=[
                'id'=>$board->id,
                'name'=>$board->name,
                'board_member_no'=>$board->boardMembers->count(),
                'board_list_no'=>$board->lists->count(),
                'board_card_no'=>$cardsNo,
            ];

            $boards[]=$board;
        }

       return $boards;
    }

    public function GetUserCards(){

        $userId =  auth()->user()->id;
        $userCards = Card::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

        $cards =[];

        $counter=0;
        foreach($userCards as $card){
            $counter++;
            $card=[
                'id'=>$card->id,
                'card_title'=>$card->title,
                'list_title'=>$card->boardList->title,
                'board_name'=>$card->boardList->board->name,
                'created_at' => $card->created_at->format('Y/m/d'),
            ];
            $cards[]=$card;
        }
        return $cards;
    }



    public function jsonGetUserBoards(){

        $boards = $this->GetUserBoards();

        return response()->json(['boards'=>$boards], 200);
    }


    public function jsonGetUserCards(){

        $cards= $this->GetUserCards();

        return response()->json(['cards'=>$cards], 200);
    }

    public function getAccountSettings(){
        return view('dashboard.accountSettings',['user'=>User::find(auth()->user()->id)]);
    }
}
