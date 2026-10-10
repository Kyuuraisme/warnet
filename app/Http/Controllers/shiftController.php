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
        $shifts = Shift::with('employee')->get();
        return view('shifts.indexShift', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('shifts.createShift', compact('employees'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        Shift::create([
            'employee_id' => $req->employee_id,
            'shift_date'  => $req->shift_date,
            'start_time'  => $req->start_time,
            'end_time'    => $req->end_time,
        ]);

        return redirect()->route('shifts.index')
                        ->with('success', 'Shift berhasil ditambahkan.');
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
    public function edit($id)
    {
        $shift = Shift::findOrFail($id);
        $employees = Employee::all();
        return view('shifts.editShift', compact('shift','employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'shift_date'  => 'required|date',
            'start_time'  => 'required',
            'end_time'    => 'required',
        ]);

        $shift = Shift::findOrFail($id);
        $shift->update($request->only(['employee_id','shift_date','start_time','end_time']));

        return redirect()->route('shifts.index')->with('success','Shift berhasil diperbarui.');
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
