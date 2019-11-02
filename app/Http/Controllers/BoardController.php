<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Requests\Board\BoardRequest;
use App\Repositories\Contract\BoardContract;
use App\Repositories\Contract\CardListContract;
use Illuminate\Support\Facades\Auth;


class BoardController extends Controller
{
    public function __construct(
        BoardContract $boardContract,
        CardListContract $cardListContract
    ){
        $this->board = $boardContract;
        $this->card_list = $cardListContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BoardRequest $request)
    {
        $this->board->registBoard($request);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Board $board
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        $board = $this->board->getBoard($board->id);
        $card_lists = $this->card_list->getCardList($board);

        return view('board.show')
                ->with('board',$board)
                ->with('card_lists',$card_lists);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Board $board
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Board               $board
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board)
    {
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param \App\Board $board
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board, Request $request)
    {
        $borad = Board::findOrFail($request->id);
        $board->delete();
    }
}
