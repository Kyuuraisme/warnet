<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.indexEmployee', compact('employees'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.createEmployee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'phone' => 'nullable'
        ]);
        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.editEmployee', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'phone' => 'nullable'
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::destroy($id);
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dihapus');
    }
}
