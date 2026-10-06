<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\membership;

class membershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Membership::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('memberships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        Membership::create($req->all()); return redirect()->route('memberships.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Membership::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $m = Membership::findOrFail($id); return view('memberships.edit', compact('m'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $m = Membership::findOrFail($id); $m->update($req->all()); return redirect()->route('memberships.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Membership::destroy($id); return redirect()->route('memberships.index');
    }
}
