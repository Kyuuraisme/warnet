@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Membership</h1>

    <!-- Tombol Tambah Membership -->
    <a href="{{ route('memberships.create') }}" 
       class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-4 inline-block">
        + Tambah Membership
    </a>

    <table class="table-auto w-full border-collapse border border-gray-300 shadow-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Tipe</th>
                <th class="border px-4 py-2">Diskon</th>
                <th class="border px-4 py-2">Created At</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($memberships as $membership)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $membership->id }}</td>
                <td class="border px-4 py-2 font-semibold">{{ $membership->type }}</td>
                <td class="border px-4 py-2">{{ $membership->discount }}%</td>
                <td class="border px-4 py-2">{{ $membership->created_at->format('d M Y H:i') }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('memberships.edit', $membership->id) }}" 
                       class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                        Edit
                    </a>
                    <form action="{{ route('memberships.destroy', $membership->id) }}" 
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700"
                                onclick="return confirm('Yakin hapus membership ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
