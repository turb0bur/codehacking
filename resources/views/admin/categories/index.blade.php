@extends('layouts.admin')

@section ('header')
    Categories
@endsection

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('user_action'))
        <div class="alert alert-success">
            {{session('user_action')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['method' =>'post', 'action' => 'AdminCategoriesController@store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' =>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

        <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>

                @if($categories)
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection