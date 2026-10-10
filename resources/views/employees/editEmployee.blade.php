@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Edit Karyawan</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div>
            <label class="block font-semibold mb-2">Nama</label>
            <input type="text" name="name" value="{{ old('name', $employee->name) }}" 
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Posisi -->
        <div>
            <label class="block font-semibold mb-2">Posisi</label>
            <input type="text" name="position" value="{{ old('position', $employee->position) }}" 
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Telepon -->
        <div>
            <label class="block font-semibold mb-2">Telepon</label>
            <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}" 
                   class="w-full border px-3 py-2 rounded">
        </div>

        <!-- Tombol Update -->
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Karyawan
            </button>
            <a href="{{ route('employees.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
