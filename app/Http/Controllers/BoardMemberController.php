<?php

namespace App\Http\Controllers;

use App\Models\BoardMember;
use App\Http\Requests\StoreBoardMemberRequest;
use App\Http\Requests\UpdateBoardMemberRequest;

class BoardMemberController extends Controller
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
    public function store(StoreBoardMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BoardMember $boardMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoardMember $boardMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoardMemberRequest $request, BoardMember $boardMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoardMember $boardMember)
    {
        //
    }
}
