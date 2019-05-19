@extends('layouts.admin')

@section('content')
    @if (Session::has('deleted_post'))
        <div class="alert alert-danger">{{ session('deleted_post') }}</div>
    @endif
    @if (Session::has('created_post'))
        <div class="alert alert-success">{{ session('created_post') }}</div>
    @endif
    @if (Session::has('updated_post'))
        <div class="alert alert-info">{{ session('updated_post') }}</div>
    @endif
    <h1>Posts</h1>
    @if (count($posts) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td><img src="{{ $post->photo ? $post->photo->path : 'http://placehold.it/400x400' }}" alt="post photo" height="30"></td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category ? $post->category->name : 'No category' }}</td>
                    <td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                </tr>    
            @endforeach
            </tbody>
        </table>
    @else
        <p>There is no post.</p>
    @endif
@endsection