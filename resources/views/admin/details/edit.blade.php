@extends('layouts.app')

@section("content")

<form method="post" action="{{ route("admin.details.update",$groups) }}">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="title" placeholder="Title" value="{{ old('title',$groups->title) }}">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection
