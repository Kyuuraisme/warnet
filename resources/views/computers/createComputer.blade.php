@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Komputer</h1>

    <form action="{{ route('computers.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Kode PC -->
        <div>
            <label class="block font-semibold mb-2">Kode PC</label>
            <input type="text" name="code" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Spesifikasi -->
        <div>
            <label class="block font-semibold mb-2">Spesifikasi</label>
            <input type="text" name="specs" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Status -->
        <div>
            <label class="block font-semibold mb-2">Status</label>
            <select name="is_available" class="w-full border px-3 py-2 rounded" required>
                <option value="1">Tersedia</option>
                <option value="0">Dipakai</option>
            </select>
        </div>

        <!-- Tombol Simpan -->
        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Simpan Komputer
            </button>
            <a href="{{ route('computers.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
