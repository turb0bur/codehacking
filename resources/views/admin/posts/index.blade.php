@extends('layouts.admin')

@section('header')
    Posts
@endsection
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('user_action'))
        <div class="alert alert-success">
            {{session('user_action')}}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Photo</th>
            <th>Category</th>
            <th>Author</th>
            <th>Link</th>
            <th>Comments</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('admin.posts.edit', $post->slug)}}">{{str_limit($post->title, 30)}}</a></td>
                    <td><img height="100" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/150x100'}}" alt="{{$post->name}} photo"></td>
                    <td>{{$post->category_id ? $post->category->name : 'Uncategorised'}}</td>
                    <td><a href="{{route('admin.users.edit', $post->user_id)}}">{{$post->user->name}}</a></td>
                    <td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>
                    <td><a href="{{route('admin.comments.show', $post->id)}}">Show comments</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
