<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\user;
use App\Models\service;
use Illuminate\Http\Request;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::with('user','service')->get(); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); $services = Service::all(); return view('orders.create', compact('users','services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        Order::create($req->all()); return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Order::with('user','service')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $o = Order::findOrFail($id); $users = User::all(); $services = Service::all(); return view('orders.edit', compact('o','users','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $o = Order::findOrFail($id); $o->update($req->all()); return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::destroy($id); return redirect()->route('orders.index');
    }
}