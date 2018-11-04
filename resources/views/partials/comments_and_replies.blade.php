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
                {!! dd($comment->user) !!}
                <img class="media-object" src="{{$comment->user->gravatar}}" alt="{{$comment->author}}">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->format('F jS \, Y \a\t g:i A')}}</small>
                </h4>
                <div>{{$comment->text}}</div>
                @if (Auth::user()->id != $comment->user->id)
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
                @endif
            </div>
        </div>
        <hr>
    @endforeach
@endif