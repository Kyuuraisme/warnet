@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Edit Komputer</h1>

    <form action="{{ route('computers.update', $computer->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Kode PC -->
        <div>
            <label class="block font-semibold mb-2">Kode PC</label>
            <input type="text" name="code" value="{{ old('code', $computer->code) }}" 
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Spesifikasi -->
        <div>
            <label class="block font-semibold mb-2">Spesifikasi</label>
            <input type="text" name="specs" value="{{ old('specs', $computer->specs) }}" 
                   class="w-full border px-3 py-2 rounded" required>
        </div>


        <!-- Tombol Simpan -->
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Komputer
            </button>
            <a href="{{ route('computers.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
