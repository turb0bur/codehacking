@extends('layouts.admin')

@section('header')
    Comment replies
@endsection

@section('content')
    @if(count($replies) > 0)
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
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->id)}}">{{\Illuminate\Support\Str::limit($reply->comment->post->title, 30)}}</a></td>
                    <td>{{ $reply->author }}</td>
                    <td>{{\Illuminate\Support\Str::limit($reply->text, 30)}}</td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::model($reply,['method' =>'patch', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
                        {!! Form::hidden('is_active', $reply->is_active ? 0 : 1) !!}
                        {!! Form::submit($reply->is_active ? 'Reject' : 'Approve', ['class' => $reply->is_active ? 'btn btn-warning' :'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method' =>'delete', 'action' => ['CommentRepliesController@destroy', $reply->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @else
        <h2 class="text-center">No replies found</h2>
    @endif
@endsection
