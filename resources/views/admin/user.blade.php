@extends('layouts.app')

@section("content")

    <form method="post" action="{{ route("admin_user_update",$user) }}">
        @csrf
        @include("layouts.messagebox")
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email',$user->email) }}">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ old('name',$user->name) }}">
        </div>
        <div class="form-group">
            <label for="jobTitle">Job Title</label>
            <input type="text" class="form-control @error('jobTitle') is-invalid @enderror" name="jobTitle" id="jobTitle" placeholder="Job Title" value="{{ old('jobTitle',$user->jobTitle) }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Phone" value="{{ old('phone',$user->phone) }}">
        </div>
        <div class="form-group">
            <label for="adress">Adress</label>
            <input type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" id="adress" placeholder="adress" value="{{ old('adress',$user->adress) }}">
        </div>
        <div class="form-group">
            <label for="presentation">Presentation</label>
            <textarea class="form-control @error('presentation') is-invalid @enderror" id="presentation" name="presentation">{{ old('presentation',$user->presentation) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
