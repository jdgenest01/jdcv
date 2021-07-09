@extends('layouts.app')

@section("content")

@extends('layouts.app')

@section("content")
@include("layouts.messagebox")
{!! Form::model( $infos, ['action'=>['InfosController@update',$infos->id], "class"=>"m-2"]  ) !!}
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
        {!! Form::url('link', $infos->link, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('date', 'Date') !!}
        {!! Form::date('date', $infos->date, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('details_id', "Expérience associée") !!}
        {!! Form::select('details_id', App\Groups::pluck('title','id'), $infos->details_id,['class' => 'form-control']) !!}
    </div>

    <button class="btn btn-success" type="submit">Modifier</button>
{!! Form::close() !!}

@endsection


@endsection
