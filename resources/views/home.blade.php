@extends('layouts.blog')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <!-- First Blog Post -->
                        <h2>
                            <a href="/post/{{$post->slug}}">{{$post->title}}</a>
                        </h2>
                        <p class="lead">
                            by {{$post->user->name}}
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->toCookieString()}}</p>
                        <hr>
                        <img class="img-responsive" src="{{$post->photo ? $post->photo->file : $post->photoPlaceholder()}}" alt="{{$post->title}}">
                        <hr>
                    <div>
                        {!! \Illuminate\Support\Str::limit($post->content, 100) !!}
                    </div>
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>--}}
                        <a class="btn btn-primary" href="/post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                @endforeach
            @endif
            <!-- Pagination -->
                {{$posts->links()}}
            </div>
            <!-- Blog Sidebar -->
            @include('partials.front_sidebar')

        </div><!-- /.row -->
    </div><!-- /.container -->
@endsection
