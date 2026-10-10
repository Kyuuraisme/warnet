@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Membership</h1>

    <form action="{{ route('memberships.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Tipe Membership -->
        <div>
            <label class="block font-semibold mb-2">Tipe Membership</label>
            <input type="text" name="type" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Diskon -->
        <div>
            <label class="block font-semibold mb-2">Diskon (%)</label>
            <input type="number" name="discount" class="w-full border px-3 py-2 rounded" min="0" max="100" required>
        </div>

        <!-- Tombol Simpan -->
        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Simpan Membership
            </button>
            <a href="{{ route('memberships.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
