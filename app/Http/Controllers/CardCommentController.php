<?php

namespace App\Http\Controllers;

use App\Models\BoardMember;
use App\Models\CardComment;
use App\Http\Requests\StoreCardCommentRequest;
use App\Http\Requests\UpdateCardCommentRequest;
use App\Models\User;

class CardCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCardCommentRequest $request)
    {
        $board_member_id = BoardMember::where('user_id', $request->user_id)
        ->where('board_id', $request->board_id)
        ->pluck('id')
        ->first();

        $comment = new CardComment();
        $comment->board_member_id = $board_member_id;
        $comment->card_id = $request->card_id;
        $comment->text = $request->comment_text;
        $comment->save();

        $user = User::find($request->user_id);

        return response()->json(['user_name' => $user->name,'user_email'=>$user->email,'comment_date'=>$comment->created_at->format('Y/m/d h:i A'),'comment_text'=>$comment->text], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CardComment $cardComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CardComment $cardComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardCommentRequest $request, CardComment $cardComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CardComment $cardComment)
    {
        //
    }
}
