@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')


        <!-- Password (opsional) -->
        <div>
            <label class="block font-semibold mb-2">Password Baru</label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded">
        </div>


        <!-- Tombol Simpan -->
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update User
            </button>
            <a href="{{ route('users.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
