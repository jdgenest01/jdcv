@extends('layouts.app')

@section("content")

    <form method="post" action="{{ $url }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="title" placeholder="Title" value="{{ old('title') }}">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

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
                <td><a href="{{ route("admin_tags_edit",$tag) }}">Update</a>&nbsp;<a href="{{ route("admin_tags_delete",$tag) }}">Delete</a></td>
            </tr>
          @endforeach
        </tbody>
    </table>
@endsection
