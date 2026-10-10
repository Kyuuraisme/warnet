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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $memberships = Membership::all();
        return view('users.editUser', compact('user','memberships'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6',
            'membership_id' => 'nullable|exists:memberships,id',
        ]);

        $user = User::findOrFail($id);
        $data = $request->only(['name','email','membership_id']);
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        return redirect()->route('users.index')->with('success','User berhasil diperbarui.');
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
