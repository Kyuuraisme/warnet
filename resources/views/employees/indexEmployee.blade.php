@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Daftar Karyawan</h1>

    <a href="{{ route('employees.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-6 inline-block">
        Tambah Karyawan
    </a>

    <table class="min-w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Posisi</th>
                <th class="border px-4 py-2">Telepon</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td class="border px-4 py-2">{{ $employee->name }}</td>
                <td class="border px-4 py-2">{{ $employee->position }}</td>
                <td class="border px-4 py-2">{{ $employee->phone }}</td>
                <td class="border px-4 py-2">...</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection
