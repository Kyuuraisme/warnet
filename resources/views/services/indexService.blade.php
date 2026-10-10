@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Layanan</h1>

    <!-- Tombol Tambah Service -->
    <a href="{{ route('services.create') }}" 
       class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-4 inline-block">
        + Tambah Service
    </a>

    <table class="table-auto w-full border-collapse border border-gray-300 shadow-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Jenis Layanan</th>
                <th class="border px-4 py-2">Harga</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $service->id }}</td>
                <td class="border px-4 py-2 font-semibold">{{ $service->name }}</td>
                <td class="border px-4 py-2">Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('services.edit', $service->id) }}" 
                       class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                        Edit
                    </a>
                    <form action="{{ route('services.destroy', $service->id) }}" 
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700"
                                onclick="return confirm('Yakin hapus service ini?')">
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
