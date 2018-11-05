@extends('layouts.admin')

@section('header')
    Media
@endsection

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('user_action'))
        <div class="alert alert-success">
            {{session('user_action')}}
        </div>
    @endif
    {!! Form::open(['method' =>'delete', 'action' => ['AdminMediaController@deleteMedia',], 'id' => 'media_bulk_delete']) !!}
    {!! Form::submit('Delete Selected', ['class' => 'btn btn-sm btn-danger']) !!}
    {!! Form::close() !!}

    <table class="table table-striped">
        <thead>
        <tr>
            <th>{!! Form::checkbox(null, null, false, ['id' => 'bulk_delete']) !!}</th>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>

        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{!! Form::checkbox('photosArray[]', $photo->id, false, ['form' => 'media_bulk_delete', 'class' => 'delete-checkbox']); !!}</td>
                    <td>{{$photo->id}}</td>
                    <td><img style="height: 100px" class="img-rounded img-thumbnail" src="{{!file_exists($photo->file) ? $photo->file : 'http://placehold.it/150x100'}}" alt=""></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    {{--<td>--}}
                        {{--{!! Form::open(['method' =>'delete', 'action' => ['AdminMediaController@destroy', $photo->id]]) !!}--}}
                        {{--{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}--}}
                        {{--{!! Form::close() !!}--}}
                    {{--</td>--}}
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
@section('footer')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#bulk_delete').on('change', function () {
                if ($(this).is(':checked')) {
                    $('.delete-checkbox').attr('checked', true);
                } else {
                    $('.delete-checkbox').attr('checked', false);
                }
            })
        })
    </script>
@endsection