<?php

namespace App\Http\Controllers;

use App\Models\Service;   // huruf besar S
use Illuminate\Http\Request;

class serviceController extends Controller
{
    public function index()
    {
        $services = Service::all();   // ambil semua data service
        return view('services.indexService', compact('services'));
    }

    public function create()
    {
        return view('services.createService');
    }

    public function store(Request $req)
    {
        Service::create([
            'name'  => $req->name,
            'price' => $req->price,
        ]);

        return redirect()->route('services.index')
                        ->with('success', 'Service berhasil ditambahkan.');
    }


    public function show(string $id)
    {
        return Service::with('orders')->findOrFail($id);
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.editService', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $service = Service::findOrFail($id);
        $service->update($request->only(['name','price']));

        return redirect()->route('services.index')
                        ->with('success','Service berhasil diperbarui.');
    }


    public function destroy(string $id)
    {
        Service::destroy($id);
        return redirect()->route('services.index');
    }
}
