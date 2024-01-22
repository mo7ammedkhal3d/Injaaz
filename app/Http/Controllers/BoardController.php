<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Http\Requests\StoreBoardRequest;
use App\Models\BoardList;
use App\Models\BoardMember;
use App\Models\Card;
use App\Models\CardComment;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
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
    public function show($user_id,$board_id)
    {
        $board = Board::find($board_id);

        return view('dashboard.board', ['board' => $board]);
    }

    public function getBoardDetails($board_id){

        $boardInfo = Board::getBoardInfo($board_id);
        $listes=[];
        $cards=[];
        $boardMemebers=[];

        foreach ($boardInfo->lists as $list) {
            $newList=[
                'list_title'=>$list->title,
                'cards_no'=>$list->cards->count(),
            ];
            $listes[]=$newList;
            foreach ($list->cards as $card){
                $card_assigneds=[];
                foreach ($card->boardMembers as $boardMember) {
                    $newCardAssigned=[
                        'assgined_name'=>$boardMember->user->name,
                        'assgined_email'=>$boardMember->user->email,
                    ];
                    $card_assigneds[]=$newCardAssigned;
                }

                $newCard=[
                    'card_title'=>$card->title,
                    'card_list'=>$card->boardList->title,
                    'card_start_date'=>$card->start_date,//->format('Y/m/d h:i A'),
                    'card_progress'=>$card->progress_rate,
                    'card_due_date'=>$card->due_date,//->format('Y/m/d h:i A'),
                    'card_assigneds'=>$card_assigneds,
                ];
                $cards[]=$newCard;
            }
        }

        foreach ($boardInfo->boardMembers as $boardMember){
            $newboard_member=[
                'member_id'=>$boardMember->user->id,
                'member_name'=>$boardMember->user->name,
                'member_email'=>$boardMember->user->email,
            ];
            $boardMemebers[]=$newboard_member;
        }


        $board_details=[
            'board_id'=>$boardInfo->id,
            'board_user_id'=>$boardInfo->user_id,
            'board_name'=>$boardInfo->name,
            'board_dexcription'=>$boardInfo->description,
            'board_listes'=>$listes,
            'board_cards'=>$cards,
            'board_members'=>$boardMemebers
        ];

        return $board_details;
    }

    public function generalSettings($user_id,$board_id){

        $board_details = $this->getBoardDetails($board_id);
        $section = 'board_general';

        return view('dashboard.boardSettings', compact('board_details', 'section'));
    }

    public function boardMembres($user_id,$board_id){
        $board_details = $this->getBoardDetails($board_id);
        $section = 'board_membres';

        return view('dashboard.boardSettings', compact('board_details', 'section'));
    }

    public function updategeneralSettings(Request $request ,$user_id){

        $board = Board::find($request->board_id);
    
        $board->update([
            'name' => $request->board_name,
            'description' => $request->board_description,
        ]);
    
        return response()->json(['message'=>'تم التعديل','user'=>$board], 200);
    }

    public function delelteBoardMember(Request $request ,$user_id){

        $this->deleteBoardMemberRelated($request->member_id,$request->board_id);
        
        $boardMember = BoardMember::where('board_id', $request->board_id)
        ->where('user_id', $request->member_id)
        ->first();

        if ($boardMember) {
            $boardMember->delete();

            return response()->json(['message' => 'تم الحذف']);
        }

        return response()->json(['message' => 'حذتث مشكلة أتناء عملية الحذف'], 404);
    }

    public function sendInvitation(Request $request,$user_id){
        $sender_user = User::find($user_id)->name;
        $board = Board::find($request->board_id);

        Notification::create([
            'sender_user_id' => $user_id,
            'recipient_user_id' => $request->recipient_userId,
            'board_id'=>$request->board_id,
            'text' => auth()->user()->name . '  قام بدعوتك للإنضمام الى  <span class="invited-to-board">'. $board->name.'<span>',                    
        ]);

        $reciver_user = User::find($request->recipient_userId);
        Mail::to($reciver_user->email)->send(new InvitationMail($reciver_user->name,$sender_user,$board->name));

        return response()->json(['message' => 'تم أرسال الدعوة بنجاح']);
    }

    public function deleteForMe(Request $request){

        $board = Board::findOrFail($request->board_id);
    
        if ($board->user_id == $request->member_id) {
            $otherBoardMembers = BoardMember::where('board_id', $request->board_id)
                ->where('user_id', '<>', $request->member_id)
                ->exists();
    
            if ($otherBoardMembers) {
                $firstBoardMember = BoardMember::where('board_id', $request->board_id)
                    ->where('user_id', '<>', $request->member_id)
                    ->first();
    
                $board->user_id = $firstBoardMember->user_id;
                $board->save();
    
                $this->deleteBoardMemberRelated($request->member_id,$board->id);

                BoardMember::where('board_id', $request->board_id)
                ->where('user_id', $request->member_id)
                ->delete();

                return response()->json(['message' => 'تم الحذف']);
            } else {

                $this->deleteBoardAndRelated($board);
                return response()->json(['message' => 'تم الحذف']);
            }
        } else {

            $this->deleteBoardMemberRelated($request->member_id,$board->id);

            BoardMember::where('board_id', $request->board_id)
            ->where('user_id', $request->member_id)
            ->delete();
    
            return response()->json(['message' => 'تم الحذف']);
        }
    }

    private function deleteBoardMemberRelated($memberId, $boardId){
        $board = Board::findOrFail($boardId);
    
        $board->lists->each(function ($list) use ($memberId) {
            $list->cards->each(function ($card) use ($memberId) {
                $card->cardComments()->where('board_member_id', $memberId)->delete();
                $card->boardMembers()->where('board_member_id', $memberId)->detach();
            });
        });
    }
    
    private function deleteBoardAndRelated(Board $board){

        $boardLists = BoardList::where('board_id',$board->id)->get();

        if($boardLists){
            foreach ($boardLists as $list) {
                if($list->cards->count()>0){
                    foreach ($list->cards as $card){
                        CardComment::where('card_id',$card->id)
                        ->delete();

                        DB::table('card_assigned')
                        ->where('card_id', $card->id)
                        ->delete();
                        $card->delete();
                    }
                }
                $list->delete();
            }
        }

        Notification::where('board_id',$board->id)
        ->delete();

        BoardMember::where('board_id', $board->id)
        ->delete();

        $board->delete();
    }

}
