<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\computer;

class computerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computers = Computer::all();   // ambil semua data komputer
        return view('computers.indexComputer', compact('computers'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('computers.createComputer');
    }

    public function store(Request $req)
    {
        Computer::create([
            'code'        => $req->code,
            'specs'       => $req->specs,
            'is_available'=> $req->is_available,
        ]);

        return redirect()->route('computers.index')->with('success', 'Komputer berhasil ditambahkan.');
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
        $computer = Computer::findOrFail($id); 
        return view('computers.editComputer', compact('computer'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'        => 'required|string|max:10',
            'specs'       => 'required|string|max:255',
            'is_available'=> 'required|boolean',
        ]);

        $computer = Computer::findOrFail($id);
        $computer->update($request->all());

        return redirect()->route('computers.index')->with('success', 'Komputer berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Computer::destroy($id); return redirect()->route('computers.index');
    }
}
