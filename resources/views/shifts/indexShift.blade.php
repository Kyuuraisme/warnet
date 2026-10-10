@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Shift Kerja</h1>

    <a href="{{ route('shifts.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-3 inline-block">
        Tambah Shift
    </a>

    <table class="min-w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Nama Karyawan</th>
                <th class="border px-4 py-2">Jam Masuk</th>
                <th class="border px-4 py-2">Jam Keluar</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shifts as $shift)
            <tr>
                <td class="border px-4 py-2">{{ $shift->employee->name }}</td>
                <td class="border px-4 py-2">{{ $shift->start_time }}</td>
                <td class="border px-4 py-2">{{ $shift->end_time }}</td>
                <td class="border px-4 py-2">
                    <form action="{{ route('shifts.destroy', $shift->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700"
                                onclick="return confirm('Yakin hapus shift ini?')">
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
