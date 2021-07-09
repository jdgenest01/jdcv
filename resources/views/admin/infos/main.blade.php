@extends('layouts.app')

@section("content")
@include("layouts.messagebox")
{!! Form::model( $infos, ['action'=>['InfosController@update',$infos->id], "class"=>"m-2"]  ) !!}
    <div class="form-group">
        {!! Form::label('title', 'Titre') !!}
        {!! Form::text('title', "", ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', "", ['class' => 'form-control ckeditor']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('link', 'Lien') !!}
        {!! Form::url('link', "", ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('date', 'Date') !!}
        {!! Form::date('date', "", ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('details_id', "Expérience associée") !!}
        {!! Form::select('details_id', App\Groups::pluck('title','id'), null,['class' => 'form-control']) !!}
    </div>

    <button class="btn btn-success" type="submit">Modifier</button>
{!! Form::close() !!}

    <table class="table">
        <thead>
          <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Url</th>
                <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($infos as $info)
            <tr>
                <th scope="row">{{ $info->id }}</th>
                <td>{{ $info->title }}</td>
                <td>
                        {{ $info->link }}
                </td>
                <td><a href="{{ route("admin_infos_update",$info) }}">Update</a>&nbsp;<a href="{{ route("admin_infoss_delete",$info) }}">Delete</a></td>
            </tr>
          @endforeach
        </tbody>
    </table>
@endsection
