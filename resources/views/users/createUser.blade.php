@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama" class="form-control mb-2">
        <input type="email" name="email" placeholder="Email" class="form-control mb-2">
        <input type="password" name="password" placeholder="Password" class="form-control mb-2">
        <select name="membership_id" class="form-select mb-2">
            @foreach($memberships as $m)
                <option value="{{ $m->id }}">{{ $m->type }}</option>
            @endforeach
        </select>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
