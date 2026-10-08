<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\computer;

class computerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index() {
    $computers = Computer::all();
    return view('computer.indexComputer', compact('computers'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('computers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        Computer::create($req->all()); return redirect()->route('computers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Computer::with('sessions')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $c = Computer::findOrFail($id); return view('computers.edit', compact('c'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $c = Computer::findOrFail($id); $c->update($req->all()); return redirect()->route('computers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Computer::destroy($id); return redirect()->route('computers.index');
    }
}
