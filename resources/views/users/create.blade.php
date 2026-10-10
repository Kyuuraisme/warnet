@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Tambah User Baru</h1>

    <form action="{{ route('users.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <!-- Nama -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">Nama</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">Email</label>
            <input type="email" name="email" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">Password</label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Membership -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">Membership</label>
            <select name="membership_id" class="w-full border px-3 py-2 rounded">
                <option value="">-- Pilih Membership --</option>
                @foreach($memberships as $membership)
                    <option value="{{ $membership->id }}">
                        {{ $membership->type }} (Diskon {{ $membership->discount }}%)
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan User
        </button>
    </form>
</div>
@endsection
