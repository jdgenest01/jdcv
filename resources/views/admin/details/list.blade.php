@extends('layouts.app')

@section("content")
    <table class="table">
        <thead>
          <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Time</th>
                <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($details as $detail)
            <tr>
                <th scope="row">{{ $detail->id }}</th>
                <td>{{ $detail->title }}</td>
                <td>{{ $detail->description }}</td>
                <td>
                    @if( $detail->typeTime == 'during' )
                        {{ $detail->timePassed }} years
                    @else
                        {{ $detail->dateBeginning }} to {{ $detail->dateEnding }}
                    @endif
                </td>
                <td><a class="btn btn-primary" href="{{ route("admin.details.edit",$detail) }}">Update</a>&nbsp;<button type="button" class="deleteModel btn btn-danger" data-route="{{ route("admin.details.delete",$detail) }}">Delete</button></td>
            </tr>
          @endforeach
        </tbody>
    </table>
    @include("layouts.modal")
@endsection
