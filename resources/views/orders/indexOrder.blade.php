@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Billing</h1>

    <form action="{{ route('orders.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <!-- Pilih User -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">User</label>
            <select name="user_id" class="w-full border px-3 py-2 rounded">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <select name="service_id">
            <option value="">-- Pilih Paket Billing --</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}">
                    {{ $service->name }} - Rp {{ number_format($service->price,0,',','.') }}
                </option>
            @endforeach
        </select>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Jumlah</label>
            <input type="number" name="quantity" class="w-full border px-3 py-2 rounded" min="1" value="1">
        </div>

        <!-- Payment Method -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">Metode Pembayaran</label>
            <select name="payment_method" class="w-full border px-3 py-2 rounded">
                <option value="cash">Cash</option>
                <option value="transfer">Transfer</option>
                <option value="ewallet">E-Wallet</option>
            </select>
        </div>


        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Billing
        </button>
    </form>
</div>


@endsection
