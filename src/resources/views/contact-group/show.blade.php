@extends('layouts.basic')

@section('content')
    <h2>Edit Contact Group</h2>

    <form method="post" action="{{ route('contactGroup.update', [ 'id' => $contactGroup->id ]) }}">
        @csrf
        @method('put')
        <p>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $contactGroup->name }}">
        </p>
        <p>
            <a href="{{ route('contactGroup.list') }}">Back To List</a>
            <button type="submit">Update</button>
        </p>
    </form>

@endsection
