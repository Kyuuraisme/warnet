@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Komputer</h1>
    <table class="table-auto w-full border-collapse border border-gray-300 shadow-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Kode PC</th>
                <th class="border px-4 py-2">Spesifikasi</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($computers as $computer)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $computer->id }}</td>
                <td class="border px-4 py-2 font-semibold">{{ $computer->code }}</td>
                <td class="border px-4 py-2">{{ $computer->specs }}</td>
                <td class="border px-4 py-2">
                    @if($computer->is_available)
                        <span class="text-green-600 font-bold">Tersedia</span>
                    @else
                        <span class="text-red-600 font-bold">Dipakai</span>
                    @endif
                </td>
                <td class="border px-4 py-2">{{ $computer->created_at->format('d M Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
