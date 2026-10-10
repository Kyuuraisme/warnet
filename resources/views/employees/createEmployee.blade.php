@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Karyawan</h1>

    <form action="{{ route('employees.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Nama -->
        <div>
            <label class="block font-semibold mb-2">Nama</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Posisi -->
        <div>
            <label class="block font-semibold mb-2">Posisi</label>
            <input type="text" name="position" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Telepon -->
        <div>
            <label class="block font-semibold mb-2">Telepon</label>
            <input type="text" name="phone" class="w-full border px-3 py-2 rounded">
        </div>

        <!-- Tombol Simpan -->
        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Simpan Karyawan
            </button>
            <a href="{{ route('employees.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
