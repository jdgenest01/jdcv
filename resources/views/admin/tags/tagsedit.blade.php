@extends('layouts.app')

@section("content")

<form method="post" action="{{ $url }}">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="title" placeholder="Title" value="{{ old('title',$tags->title) }}">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection
