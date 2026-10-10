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
        $memberships = Membership::all();   // ambil semua data membership
        return view('memberships.indexMemberhip', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('memberships.createMembership');
    }

    public function store(Request $req)
    {
        Membership::create([
            'type'     => $req->type,
            'discount' => $req->discount,
        ]);

        return redirect()->route('memberships.index')
                        ->with('success', 'Membership berhasil ditambahkan.');
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
    public function edit($id)
{
    $membership = Membership::findOrFail($id);
    return view('memberships.editMembership', compact('membership'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'type'     => 'required|string|max:255',
        'discount' => 'required|numeric|min:0|max:100',
    ]);

    $membership = Membership::findOrFail($id);
    $membership->update($request->only(['type','discount']));

    return redirect()->route('memberships.index')
                     ->with('success','Membership berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Membership::destroy($id); return redirect()->route('memberships.index');
    }
}
