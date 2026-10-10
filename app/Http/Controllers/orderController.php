<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\user;
use App\Models\service;
use App\Models\transaction;
use Illuminate\Http\Request;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();  
        $services = Service::all();
        return view('orders.indexOrder', compact('users','services'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(User $users)
    {
        if ($users->membership && $users->membership->type === 'Reguler') {
            $services = Service::where('is_member_only', 0)->get();
        } else {
            $services = Service::where('is_member_only', 1)->get();
        }

        return view('orders.indexOrder', compact('users','services'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $service = Service::findOrFail($req->service_id);
        $quantity = $req->quantity ?? 1; // default 1 kalau tidak ada input
        $totalPrice = $service->price * $quantity;

        // Simpan order
        $order = Order::create([
            'user_id'     => $req->user_id,
            'service_id'  => $req->service_id,
            'quantity'    => $quantity,
            'total_price' => $totalPrice,
        ]);

        // Simpan transaksi otomatis
        Transaction::create([
            'user_id'  => $req->user_id,
            'order_id' => $order->id,
            'amount'   => $totalPrice,
            'payment_method' => $req->payment_method, // atau sesuai kebutuhan
            'transaction_date' => now(),
        ]);

        return redirect()->route('orders.index')->with('success', 'Billing & transaksi berhasil disimpan.');
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