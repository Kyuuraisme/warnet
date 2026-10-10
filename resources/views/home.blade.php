@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <div class="flex space-x-2 mb-4">
        <!-- Tombol Order Billing -->
        <a href="{{ route('orders.index') }}" 
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Order Billing
        </a>

        <!-- Tombol Shift Kerja -->
        <a href="{{ route('shifts.index') }}" 
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Shift Kerja
        </a>
    </div>



    <!-- Daftar Komputer -->
    <h2 class="text-xl font-bold mb-4">Daftar Komputer</h2>
    <table class="table-auto w-full border-collapse border border-gray-300 mb-6">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Kode</th>
                <th class="border px-4 py-2">Spesifikasi</th>
                <th class="border px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($computers as $computer)
            <tr>
                <td class="border px-4 py-2">{{ $computer->code }}</td>
                <td class="border px-4 py-2">{{ $computer->specs }}</td>
                <td class="border px-4 py-2">
                    @if($computer->is_available)
                        <span class="text-green-600 font-bold">Tersedia</span>
                    @else
                        <span class="text-red-600 font-bold">Dipakai</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Daftar Pricelist -->
    <h2 class="text-xl font-bold mb-4">Pricelist</h2>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Nama Layanan</th>
                <th class="border px-4 py-2">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td class="border px-4 py-2">{{ $service->name }}</td>
                <td class="border px-4 py-2">Rp {{ number_format($service->price, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
