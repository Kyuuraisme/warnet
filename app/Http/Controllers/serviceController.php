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

    public function edit(string $id)
    {
        $s = Service::findOrFail($id);
        return view('services.edit', compact('s'));
    }

    public function update(Request $req, string $id)
    {
        $s = Service::findOrFail($id);
        $s->update($req->all());
        return redirect()->route('services.index');
    }

    public function destroy(string $id)
    {
        Service::destroy($id);
        return redirect()->route('services.index');
    }
}
