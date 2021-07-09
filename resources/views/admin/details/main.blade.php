@extends('layouts.app')

@section("content")
@include("layouts.messagebox")

    {!! Form::model( $infos, ['action'=>['DetailsController@update',$infos->id], "class"=>"m-2"]  ) !!}
        <div class="form-group">
            {!! Form::label('title', 'Titre') !!}
            {!! Form::text('title', $infos->title, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', $infos->description, ['class' => 'form-control ckeditor']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('link', 'Lien') !!}
            {!! Form::url('link', $infos->dateBeginning, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('date', 'date') !!}
            {!! Form::date('date', $infos->dateEnding, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('details_id', "Expérience associés") !!}
            {!! Form::select('details_id', App\Groups::pluck('title','id'), null,['class' => 'form-control']) !!}
        </div>

      <button class="btn btn-success" type="submit">Modifier</button>
    {!! Form::close() !!}
    <table class="table">
        <thead>
          <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Time</th>
                <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($details as $detail)
            <tr>
                <th scope="row">{{ $detail->id }}</th>
                <td>{{ $detail->title }}</td>
                <td>
                        {{ $detail->dateBeginning }} / {{ $detail->dateEnding }}
                </td>
                <td><a href="{{ route("admin_details_edit",$detail) }}">Update</a>&nbsp;<a href="{{ route("admin_details_delete",$detail) }}">Delete</a></td>
            </tr>
          @endforeach
        </tbody>
    </table>
@endsection
