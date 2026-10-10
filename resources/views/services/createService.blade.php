@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Layanan</h1>

    <form action="{{ route('services.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Nama Layanan -->
        <div>
            <label class="block font-semibold mb-2">Nama Layanan</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Harga -->
        <div>
            <label class="block font-semibold mb-2">Harga</label>
            <input type="number" name="price" class="w-full border px-3 py-2 rounded" min="0" required>
        </div>

        <!-- Tombol Simpan -->
        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Simpan Service
            </button>
            <a href="{{ route('services.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
