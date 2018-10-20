@extends('layouts.admin')

@section('header')
    Posts
@endsection
@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('admin.users.edit', $post->user_id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category_id}}</td>
                    <td><img height="100" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/150x100'}}" alt="{{$post->name}} photo"></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
