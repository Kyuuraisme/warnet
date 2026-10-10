<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\user;
use Illuminate\Http\Request;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['user','order'])->get();
        return view('transactions.indexTransaction', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); return view('transactions.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        Transaction::create($req->all()); return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Transaction::with('user')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $t = Transaction::findOrFail($id); $users = User::all(); return view('transactions.edit', compact('t','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $t = Transaction::findOrFail($id); $t->update($req->all()); return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success','Transaksi berhasil dihapus.');
    }
}
