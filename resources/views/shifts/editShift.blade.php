@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Edit Shift Kerja</h1>

    <form action="{{ route('shifts.update', $shift->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Pilih Karyawan -->
        <div>
            <label class="block font-semibold mb-2">Karyawan</label>
            <select name="employee_id" class="w-full border px-3 py-2 rounded" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" 
                        {{ $shift->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tanggal Shift -->
        <div>
            <label class="block font-semibold mb-2">Tanggal Shift</label>
            <input type="date" name="shift_date" value="{{ old('shift_date', $shift->shift_date) }}" 
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Jam Masuk -->
        <div>
            <label class="block font-semibold mb-2">Jam Masuk</label>
            <input type="time" name="start_time" value="{{ old('start_time', $shift->start_time) }}" 
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Jam Keluar -->
        <div>
            <label class="block font-semibold mb-2">Jam Keluar</label>
            <input type="time" name="end_time" value="{{ old('end_time', $shift->end_time) }}" 
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Tombol Update -->
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Shift
            </button>
            <a href="{{ route('shifts.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
