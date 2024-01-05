<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Models\CardComment;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index($user_id,$card_id)
    {   

        $card = Card::find($card_id);

        $cardComments = [];
        $assignedUsers = [];

        $cardCommentsCollection = CardComment::with('boardMember.user')
            ->where('card_id', $card->id)
            ->get();

        $boardMembers = $card->boardMembers()->with('user')->get();

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

        foreach ($boardMembers as $boardMember) {
            $user = $boardMember->user;

            $assignedUser = [
                'user_name' => $user->name,
                'user_email' => $user->email,
            ];

            $assignedUsers[] = $assignedUser;
        }

            $cardDetails=[
               'card_title' => $card->title,
               'card_description' => $card->description,
               'start_date'=>$card->start_date,
               'due_date'=>$card->due_date,
               'card_comments'=>$cardComments,
               'card_assigneds' => $assignedUsers,
            ];

            return json_encode($cardDetails);
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
        $validatedData = $request->validate([
            'title' => 'required|string',
            'board_list_id' => 'required|exists:board_lists,id',
        ]);
    
        $card = Card::create($validatedData);
    
        return response()->json(['card' => $card], 201);
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
    public function update(UpdateCardRequest $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}
