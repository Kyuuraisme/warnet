@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Komputer</h1>

    <!-- Tombol Tambah Komputer -->
    <a href="{{ route('computers.create') }}" 
       class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-4 inline-block">
        + Tambah Komputer
    </a>

    <table class="table-auto w-full border-collapse border border-gray-300 shadow-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Kode PC</th>
                <th class="border px-4 py-2">Spesifikasi</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($computers as $computer)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2 font-semibold">{{ $computer->code }}</td>
                <td class="border px-4 py-2">{{ $computer->specs }}</td>
                <td class="border px-4 py-2">
                    @if($computer->is_available)
                        <span class="text-green-600 font-bold">Tersedia</span>
                    @else
                        <span class="text-red-600 font-bold">Dipakai</span>
                    @endif
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ route('computers.edit', $computer->id) }}" 
                       class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                        Edit
                    </a>
                    <form action="{{ route('computers.destroy', $computer->id) }}" 
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700"
                                onclick="return confirm('Yakin hapus komputer ini?')">
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
