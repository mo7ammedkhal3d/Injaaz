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

        $cardComments = CardComment::with('boardMember')
            ->where('card_id', $card->id)
            ->get()->first();

        // $cardComment= CardComment::
            
        dd($cardComments->boardMember->user);

        // dd($cardComments);

        // Now, you can access the user names for each comment
            foreach ($cardComments as $comment){
                foreach ($comment->boardMember as $boardMember) {
                    foreach ($boardMember->users as $user) {
                        echo $user->name;
                        echo $cardComments->text;
                    }
                }
            }

        // $cardDetails=[
        //    'card_title' => $card->title,
        //    'card_description' => $card->description,
        //    'start_date'=>$card->start_date,
        //    'due_date'=>$card->due_date,
        //    'card_comment'=>[
        //     'user_name'=>$cardComments->user_id,
        //     'text'=>$card->text
        //    ],
        // ];

        // return json_encode($cardDetails);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        //
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
