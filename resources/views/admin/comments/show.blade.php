@extends('layouts.admin')

@section('header')
    Post comments
@endsection

@section('content')
    @if(count($comments) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Post</th>
                <th>Author</th>
                <th>Excerpt</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td><a href="{{route('home.post', $comment->post->id)}}">{{$comment->post->title}}</a></td>
                    <td>{{ $comment->author }}</td>
                    <td>{{str_limit($comment->text, 30)}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::model($comment,['method' =>'patch', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
                        {!! Form::hidden('is_active', $comment->is_active ? 0 : 1) !!}
                        {!! Form::submit($comment->is_active ? 'Reject' : 'Approve', ['class' => $comment->is_active ? 'btn btn-warning' :'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' =>'delete', 'action' => ['PostCommentsController@destroy', $comment->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @else
        <h2 class="text-center">No comments found</h2>
    @endif
@endsection