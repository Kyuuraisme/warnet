@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Shift Kerja</h1>

    <form action="{{ route('shifts.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Pilih Karyawan -->
        <div>
            <label class="block font-semibold mb-2">Karyawan</label>
            <select name="employee_id" class="w-full border px-3 py-2 rounded" required>
                <option value="">-- Pilih Karyawan --</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tanggal Shift -->
        <div>
            <label class="block font-semibold mb-2">Tanggal Shift</label>
            <input type="date" name="shift_date" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Jam Masuk -->
        <div>
            <label class="block font-semibold mb-2">Jam Masuk</label>
            <input type="time" name="start_time" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Jam Keluar -->
        <div>
            <label class="block font-semibold mb-2">Jam Keluar</label>
            <input type="time" name="end_time" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Tombol Simpan -->
        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Simpan Shift
            </button>
            <a href="{{ route('shifts.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
