<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user');    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = auth()->user()->watchlist;
        return view('layouts.watchlist', compact('favorites'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Home $home)
    {
            auth()->user()->watchlist()->attach($home->id);
            return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
            auth()->user()->watchlist()->detach($home->id);
            return back();
    }
}