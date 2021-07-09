@extends('layouts.app')

@section("content")

@extends('layouts.app')

@section("content")
@include("layouts.messagebox")
{!! Form::model( $details, ['action'=>['DetailsController@update',$details->id], "class"=>"m-2"]  ) !!}
    <div class="form-group">
        {!! Form::label('title', 'Titre') !!}
        {!! Form::text('title', $details->title, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', $details->description, ['class' => 'form-control ckeditor']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('dateBeginning', 'Date de début') !!}
        {!! Form::date('dateBeginning', $details->dateBeginning, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('dateEnding', 'Date de fin') !!}
        {!! Form::date('dateEnding', $details->dateEnding, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('groups_id', "Type d'expérience") !!}
        {!! Form::select('groups_id', App\Groups::pluck('title','id'), $details->groups_id,['class' => 'form-control']) !!}
    </div>

    <button class="btn btn-success" type="submit">Modifier</button>
{!! Form::close() !!}

@endsection


@endsection
