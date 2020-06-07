@extends('layouts.app')

@section("content")

    <form method="post" action="{{ route("admin.tags.store") }}">
        @csrf
        @include("layouts.messagebox")
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="title" placeholder="Title" value="{{ old('title') }}">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
    <br>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tags as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->title }}</td>
                <td><a class="btn btn-primary" href="{{ route("admin.tags.edit",$tag) }}">Update</a>&nbsp;<button type="button" class="deleteModel btn btn-danger" data-route="{{ route("admin.tags.delete",$tag) }}">Delete</button></td>
            </tr>
          @endforeach
        </tbody>
    </table>
    @include("layouts.modal")
@endsection
