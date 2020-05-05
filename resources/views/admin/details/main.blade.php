@extends('layouts.app')

@section("content")

    <form method="post" action="{{ route("admin_groups_insert") }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="title" placeholder="Title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" aria-describedby="description" placeholder="Title">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="group">Group</label>
            <select class="form-control" name="group">
                @foreach ($groups as $group)
                    <option value={{ $group->id }}>{{ $group->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select class="form-control" name="tags" multiple>
                @foreach ($tags as $tag)
                    <option value={{ $tag->id }}>{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <p>Duration type:</p>
            <input type="radio" class="form-control typeRadio" id="date" name="title" aria-describedby="date" value="date" checked><label for="date">Date to Date</label>
            <input type="radio" class="form-control typeRadio" id="during" name="title" aria-describedby="during"  value="during"><label for="during">Number of years</label>
        </div>
        <div class="form-group row" id="timeDiv">
            <label for="dateBeginning">Start</label>
            <input type="date" class="form-control @error('dateBeginning') is-invalid @enderror" id="dateBeginning" name="dateBeginning" aria-describedby="dateBeginning" placeholder="Start" value="{{ old('dateBeginning') }}">
            to
            <label for="dateEnding">End</label>
            <input type="date" class="form-control @error('dateEnding') is-invalid @enderror" id="dateEnding" name="dateEnding" aria-describedby="dateEnding" placeholder="End" value="{{ old('dateEnding') }}">
        </div>
        <div class="form-group d-none" id="duringDiv">
            <label for="timePassed">Date to Date</label>
            <select class="form-control" name="timePassed">
                @for ($i = 0; $i < 10; $i++)
                    <option value="{{ $i }}">{{ $i }} years</option>
                @endfor
            </select>
        </div>

        <fieldset>
            <legend>More informations</legend>
            <table class="table">
                <thead>
                  <tr>
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Link</th>
                      <th scope="col">Date</th>
                        <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody id="interactiveBody">
                    <tr class="d-none" id="hiddenRow">
                        <input type="hidden" class="idHidden" name="info_id" value="">
                        <td><input type="text" name="info_title[]"></td>
                        <td><input type="text" name="info_description[]"></td>
                        <td><input type="url" name="info_link[]"></td>
                        <td><input type="date" name="info_date[]"></td>
                        <td><a class="btn btn-red deleteRow">Delete</a></td>
                    </tr>
                    <tr>
                        <input type="hidden" class="idHidden" name="info_id" value="">
                        <td><input type="text" name="info_title[]"></td>
                        <td><input type="text" name="info_description[]"></td>
                        <td><input type="url" name="info_link[]"></td>
                        <td><input type="date" name="info_date[]"></td>
                        <td><a class="btn btn-red deleteRow">Delete</a></td>
                    </tr>
                </tbody>
            </table>
            <input type="button" class="btn btn-green" id="addRow" value="Add">
            <input type="hidden" name="deletedRows" id="deletedRows" value="">
        </fieldset>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>

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
                <td>{{ $detail->Description }}</td>
                <td>
                    @if( $detail->typeTime == 'During' )
                        {{ $detail->timePassed }}
                    @else
                        {{ $detail->dateBeginning }} to {{ $detail->dateEnding }}
                    @endif
                </td>
                <td><a href="{{ route("admin_groups_edit",$detail) }}">Update</a>&nbsp;<a href="{{ route("admin_groups_delete",$detail) }}">Delete</a></td>
            </tr>
          @endforeach
        </tbody>
    </table>
@endsection
