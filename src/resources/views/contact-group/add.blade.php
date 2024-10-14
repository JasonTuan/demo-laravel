@extends('layouts.basic')

@section('content')
    <h2>Add Contact Group</h2>

    <form method="post" action="{{ route('contactGroup.create') }}">
        @csrf
        <p>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </p>
        <p>
            <a href="{{ route('contactGroup.list') }}">Back To List</a>
            <button type="submit">Add</button>
        </p>
    </form>

@endsection
