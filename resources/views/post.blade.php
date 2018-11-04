@extends('layouts.blog-post')

@section('content')

    @if(\Illuminate\Support\Facades\Session::has('user_action'))
        <div class="alert alert-success">
            {{session('user_action')}}
        </div>
    @endif

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->toCookieString()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : $post->photoPlaceholder()}}" alt="{{$post->title}}">

    <hr>

    <!-- Post Content -->
    <div>{!! $post->content !!}</div>

    <hr>

    <!-- Blog Comments -->
    @if (Auth::check())
        <!-- Comments Form -->
        <div class="well">
            {!! Form::open(['method' =>'post', 'action' => 'PostCommentsController@store']) !!}

            {!! Form::hidden('post_id', $post->id) !!}
            <div class="form-group">
                {!! Form::label('text', 'Leave a Comment:') !!}
                {!! Form::textarea('text', null,['class' =>'form-control', 'rows' => 15]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Add comment', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

        <hr>
    @endif

    <!-- Posted Comments -->
    @if (count($comments) > 0)
        @foreach($comments  as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    {{--{!! dd($comment->user) !!}--}}
                    <img class="media-object" src="{{$comment->user->gravatar}}" alt="{{$comment->author}}">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->format('F jS \, Y \a\t g:i A')}}</small>
                    </h4>
                    <div>{{$comment->text}}</div>
                    {{--                @if (Auth::user()->id != $comment->user->id)--}}
                    <hr>
                    <!-- Nested Comment -->
                    <div class="well">

                        <div class="media-body">
                            {!! Form::open(['method' =>'post', 'action' => 'CommentRepliesController@createReply']) !!}

                            {!! Form::hidden('comment_id', $comment->id) !!}
                            <div class="form-group">
                                {!! Form::label('text', 'Leave a Reply:') !!}
                                {!! Form::textarea('text', null,['class' =>'form-control', 'rows' => 3]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Add reply', ['class' => 'btn btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                    @if (count($comment->replies) > 0)
                        @foreach( $comment->replies as $reply)
                            @if ($reply->is_active)
                                <div class="media">
                                    <div class="pull-left">
                                        <img class="media-object" src="{{$reply->user->gravatar}}" alt="{{$reply->author}}">
                                    </div>
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->format('F jS \, Y \a\t g:i A')}}</small>
                                    </h4>
                                    <div>{{$reply->text}}</div>
                                </div><!-- End Nested Comment -->
                                <hr>
                            @endif
                        @endforeach
                    @endif
                    {{--@endif--}}
                </div>
            </div>
            <hr>
        @endforeach
    @endif
@endsection

@section('sidebar')
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
        </div><!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a></li>
                    <li><a href="#">Category Name</a></li>
                    <li><a href="#">Category Name</a></li>
                    <li><a href="#">Category Name</a></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a></li>
                    <li><a href="#">Category Name</a></li>
                    <li><a href="#">Category Name</a></li>
                    <li><a href="#">Category Name</a></li>
                </ul>
            </div>
        </div><!-- /.row -->
    </div>


    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>
@endsection