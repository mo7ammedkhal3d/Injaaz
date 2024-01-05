<?php

namespace App\Http\Controllers;

use App\Models\BoardList;
use App\Http\Requests\StoreBoardListRequest;
use App\Http\Requests\UpdateBoardListRequest;

class BoardListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($board_id)
    {
        $lists = BoardList::where('board_id', $board_id)->get();

        return view('dashboard.board', ['lists' => $lists]);
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
    public function store(StoreBoardListRequest $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'board_id' => 'required|exists:boards,id',
        ]);
    
        $boardList = BoardList::create($validatedData);
    
        return response()->json(['boardList' => $boardList], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BoardList $boardList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoardList $boardList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoardListRequest $request, BoardList $boardList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoardList $boardList)
    {
        //
    }
}
