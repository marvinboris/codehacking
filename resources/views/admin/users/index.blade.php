@extends('layouts.admin')

@section('content')
    @if (Session::has('deleted_user'))
        <div class="alert alert-danger">{{ session('deleted_user') }}</div>
    @endif
    @if (Session::has('created_user'))
        <div class="alert alert-success">{{ session('created_user') }}</div>
    @endif
    @if (Session::has('updated_user'))
        <div class="alert alert-info">{{ session('updated_user') }}</div>
    @endif
    <h1>Users</h1>
    @if (count($users) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td><img src="{{ $user->photo ? $user->photo->path : 'http://placehold.it/400x400' }}" alt="User photo" height="30"></td>
                    <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->is_active === 1 ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                </tr>    
            @endforeach
            </tbody>
        </table>
    @else
        <p>There is no user</p>
    @endif
@endsection