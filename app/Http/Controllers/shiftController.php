<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Employee;
use Illuminate\Http\Request;

class shiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Shift::with('employee')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('shifts.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $validated = $req->validate([
            'employee_id' => 'required|exists:employees,id',
            'shift_date'  => 'required|date',
            'start_time'  => 'required',
            'end_time'    => 'required'
        ]);

        Shift::create($validated);

        return redirect()->route('shifts.index')->with('success', 'Shift berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Shift::with('employee')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shift = Shift::findOrFail($id);
        $employees = Employee::all();
        return view('shifts.edit', compact('shift','employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $shift = Shift::findOrFail($id);

        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'shift_date'  => 'required|date',
            'start_time'  => 'required',
            'end_time'    => 'required'
        ]);

        $shift->update($validated);

        return redirect()->route('shifts.index')->with('success', 'Shift berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        Shift::destroy($id);
        return redirect()->route('shifts.index')->with('success', 'Shift berhasil dihapus');
    }
}
