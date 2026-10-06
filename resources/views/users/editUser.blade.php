@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ $user->name }}" class="form-control mb-2">
        <input type="email" name="email" value="{{ $user->email }}" class="form-control mb-2">
        <input type="password" name="password" placeholder="Password baru (opsional)" class="form-control mb-2">
        <select name="membership_id" class="form-select mb-2">
            @foreach($memberships as $m)
                <option value="{{ $m->id }}" @if($user->membership_id==$m->id) selected @endif>{{ $m->type }}</option>
            @endforeach
        </select>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
