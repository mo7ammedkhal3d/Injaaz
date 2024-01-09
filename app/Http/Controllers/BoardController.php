<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Http\Requests\StoreBoardRequest;
use App\Models\BoardMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateBoardRequest;

class BoardController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        $boards = Board::where('user_id', $userId)->get();

        return view('dashboard.index', ['boards' => $boards]);
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
    public function store(StoreBoardRequest $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'board_name' => 'required|string|max:255',
            'board_description' => 'required|string',
            'user_id' => 'required|exists:users,id',
            // 'invite_users' => 'nullable|array',
        ]);

        $board = Board::create([
            'name' => $validatedData['board_name'],
            'description' => $validatedData['board_description'],
            'user_id' => $validatedData['user_id'],
        ]);

        BoardMember::create([
            'user_id' => $validatedData['user_id'],
            'board_id' => $board->id,
        ]);

        // if (!empty($validatedData['invite_users'])) {
        //     foreach ($validatedData['invite_users'] as $inviteUserId) {
        //         Notification::create([
        //             'sender_user_id' => $validatedData['user_id'],
        //             'receiver_user_id' => $inviteUserId,
        //             'time'=>date('Y:m:d h:m A'),
        //             'message' => 'User ' . auth()->user()->name . ' invites you to join board ' . $board->name,
        //         ]);
        //     }
        // }

        return response()->json(['board' => $board], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($board_id)
    {
        $board = Board::find($board_id);

        return view('dashboard.board', ['board' => $board]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Board $board)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoardRequest $request, Board $board)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        //
    }
}
