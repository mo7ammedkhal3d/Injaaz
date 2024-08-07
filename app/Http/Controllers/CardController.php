<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Models\CardComment;
use App\Models\User;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index($user_id, $card_id)
     {
         $card = Card::find($card_id);
     
         if (!$card) {
             return response()->json(['error' => 'Card not found'], 404);
         }
     
         $cardComments = [];
         $assignedUsers = [];
     
         $board = $card->boardList->board;
         $boardMembers = $board->boardMembers;
     
         $cardAssigned = $card->boardMembers()->with('user')->get();
     
         $assignedUserIds = $cardAssigned->pluck('user.id')->toArray();
     
         $unassignedBoardMembers = $boardMembers->reject(function ($boardMember) use ($assignedUserIds) {
             return in_array($boardMember->user->id, $assignedUserIds);
         });
      
         $cardCommentsCollection = CardComment::with('boardMember.user')
             ->where('card_id', $card->id)
             ->orderBy('created_at', 'desc')
             ->get();
     
         foreach ($cardCommentsCollection as $comment) {
             $user = $comment->boardMember->user;
             $newComment = [
                 'user_name' => $user->name,
                 'user_email' => $user->email,
                 'comment_text' => $comment->text,
                 'comment_date' => $comment->created_at->format('Y/m/d h:i A'),
             ];
             $cardComments[] = $newComment;
         }
     
         foreach ($cardAssigned as $boardMember) {
             $user = $boardMember->user;
     
             $assignedUser = [
                 'board_member_id' => $boardMember->id,
                 'user_name' => $user->name,
                 'user_email' => $user->email,
             ];
     
             $assignedUsers[] = $assignedUser;
         }
     
         $boardMembersInfo = [];
         foreach ($unassignedBoardMembers as $boardMember) {
             $user = $boardMember->user;
     
             $boardMembersInfo[] = [
                 'board_member_id' => $boardMember->id,
                 'name' => $user->name,
                 'email' => $user->email,
             ];
         }
     
         $cardDetails = [
             'card_id' => $card->id,
             'card_title' => $card->title,
             'card_description' => $card->description,
             'start_date' => $card->start_date,
             'due_date' => $card->due_date,
             'progress_rate'=>$card->progress_rate,
             'card_owner_name'=>User::find($card->user_id)->name,
             'card_owner_email'=>User::find($card->user_id)->email,
             'card_comments' => $cardComments,
             'card_assigneds' => $assignedUsers,
             'unassigned_board_members' => $boardMembersInfo,
         ];
     
         return response()->json($cardDetails);
     }

     public function cardAssigned(){

     }
     
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        $validatedData = $request->validated();

        $lastCard = Card::where('board_list_id', $validatedData['board_list_id'])
                        ->orderBy('position', 'desc')
                        ->first();

        $position = $lastCard ? $lastCard->position + 1 : 1;

        $validatedData['position'] = $position;

        $card = Card::create($validatedData);

        return response()->json(['card' => $card], 201);
    }

    public function updatePosition(Request $request, $user_id)
    {
        $card = Card::find($request->card_id);
        $oldPosition = $card->position;
        $newPosition = $request->new_position;

        if($newPosition < $oldPosition){
            Card::where('board_list_id', $card->boardList->id)
            ->where('position', '>=', $newPosition)
            ->where('position', '<', $oldPosition)
            ->increment('position');
        } else{
            Card::where('board_list_id', $card->boardList->id)
            ->where('position', '<=', $newPosition)
            ->where('position', '>', $oldPosition)
            ->decrement('position');
        }
        
        $card->update(['position' => $newPosition]);

        return response()->json(['card' => $card], 200);
    }


    public function updateList(Request $request, $userId)
    {
        $card = Card::find($request->card_id);
        $oldBoardListId = $card->board_list_id;
        $oldPosition = $card->position;
        $newBoardListId = $request->new_list_id;
        $newPosition = $request->new_position;

        Card::where('board_list_id', $oldBoardListId)
            ->where('position', '>', $oldPosition)
            ->decrement('position');


        Card::where('board_list_id', $newBoardListId)
            ->where('position', '>=', $newPosition)
            ->increment('position');

        $card->update(['board_list_id' => $newBoardListId, 'position' => $newPosition]);

        return response()->json(['card' => $card], 200);
    }



    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardRequest $request)
    {
        $card = Card::find($request->card_id);

        if (!$card) {
            return response()->json(['error' => 'Card not found'], 404);
        }

        switch ($request->update_type) {
            case 'card_title':
                $card->title = $request->new_title;
                break;
            case 'card_description':
                $card->description = $request->new_description;
                break;
            case 'card_start_date':
                $card->start_date = $request->date;
                break;
            case 'card_due_date':
                $card->due_date = $request->date;
                break;
            case 'card_progress':
                $card->progress_rate = $request->progress;
                break;
            default:
                return response()->json(['error' => 'Invalid update type'], 400);
        }

        $card->save();

        return response()->json([true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}
