@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar User</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
    <table class="table mt-3">
        <tr><th>Nama</th><th>Email</th><th>Membership</th><th>Aksi</th></tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->membership->type }}</td>
            <td>
                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
