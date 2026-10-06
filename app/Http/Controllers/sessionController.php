<?php

namespace App\Http\Controllers;

use app\Models\session;
use app\Models\user;
use app\Models\computer;
use app\Models\game;
use Illuminate\Http\Request;


class sessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return session::with('user','computer','game')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); $computers = Computer::all(); $games = Game::all(); return view('sessions.create', compact('users','computers','games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        Session::create($req->all()); return redirect()->route('sessions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Session::with('user','computer','game')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $s = Session::findOrFail($id); $users = User::all(); $computers = Computer::all(); $games = Game::all(); return view('sessions.edit', compact('s','users','computers','games'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $s = Session::findOrFail($id); $s->update($req->all()); return redirect()->route('sessions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Session::destroy($id); return redirect()->route('sessions.index');
    }
}
