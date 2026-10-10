@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Edit Layanan</h1>

    <form action="{{ route('services.update', $service->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nama Layanan -->
        <div>
            <label class="block font-semibold mb-2">Nama Layanan</label>
            <input type="text" name="name" value="{{ old('name', $service->name) }}" 
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Harga -->
        <div>
            <label class="block font-semibold mb-2">Harga</label>
            <input type="number" name="price" value="{{ old('price', $service->price) }}" 
                   class="w-full border px-3 py-2 rounded" min="0" required>
        </div>

        <!-- Tombol Update -->
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Service
            </button>
            <a href="{{ route('services.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
