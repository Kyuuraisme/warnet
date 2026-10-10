@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Transaksi</h1>

    <table class="table-auto w-full border-collapse border border-gray-300 shadow-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Order</th>
                <th class="border px-4 py-2">Jumlah</th>
                <th class="border px-4 py-2">Metode Pembayaran</th>
                <th class="border px-4 py-2">Tanggal</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $transaction->id }}</td>
                <td class="border px-4 py-2">{{ $transaction->user->name ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $transaction->order_id }}</td>
                <td class="border px-4 py-2">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                <td class="border px-4 py-2">{{ $transaction->payment_method }}</td>
               <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y H:i') }}</td>

                <td class="border px-4 py-2">
                    <form action="{{ route('transactions.destroy', $transaction->id) }}" 
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700"
                                onclick="return confirm('Yakin hapus transaksi ini?')">
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
