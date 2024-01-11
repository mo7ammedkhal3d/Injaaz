<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Http\Requests\StoreBoardRequest;
use App\Models\BoardMember;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\InvitationMail;
use App\Http\Requests\UpdateBoardRequest;
use Illuminate\Support\Facades\Mail;

class BoardController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {

        $boards = Board::where('user_id', $userId)
            ->orWhereHas('boardMembers', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->with('boardMembers') 
            ->get();

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
        $validatedData = $request->validate([
            'board_name' => 'required|string|max:255',
            'board_description' => 'required|string',
            'user_id' => 'required|exists:users,id',
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


        $inviteUsersIds= json_decode($request->invite_users);

        if (!empty($inviteUsersIds)){
            $sender_user = User::find($validatedData['user_id'])->name;
            foreach ($inviteUsersIds as $inviteUserId){
                Notification::create([
                    'sender_user_id' => $validatedData['user_id'],
                    'recipient_user_id' => $inviteUserId,
                    'board_id'=>$board->id,
                    'text' => auth()->user()->name . '  قام بدعوتك للإنضمام الى  <span class="invited-to-board">'. $board->name.'<span>',                    
                ]);

                // Send mail invitation
                $reciver_user = User::find($inviteUserId);

                Mail::to($reciver_user->email)->send(new InvitationMail($reciver_user->name,$sender_user,$board->name));
            }
        }

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
