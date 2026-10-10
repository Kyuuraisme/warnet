@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Edit Membership</h1>

    <form action="{{ route('memberships.update', $membership->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')


        <!-- Diskon -->
        <div>
            <label class="block font-semibold mb-2">Diskon (%)</label>
            <input type="number" name="discount" value="{{ old('discount', $membership->discount) }}" 
                   class="w-full border px-3 py-2 rounded" min="0" max="100" required>
        </div>

        <!-- Tombol Update -->
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Membership
            </button>
            <a href="{{ route('memberships.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
