<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\membership;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $users = user::with('membership')->get();
        return view('users.indexUser', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $memberships = membership::all();
        return view('users.create', compact('memberships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'membership_id' => 'required'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return user::with('sessions','transactions','orders')->findOrFail($id);    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $memberships = Membership::all();
        return view('users.edit', compact('user','memberships'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'membership_id' => 'required'
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
