@extends('layouts.basic')

@section('content')
    <h2>Add Contact</h2>

    <form method="post" action="{{ route('contact.create') }}">
        @csrf
        <p>
            <label for="groupId">Contact Group:</label>
            <select name="groupId" id="groupId">
                <option value="">Select Group</option>
                @foreach($contactGroups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </p>
        <p>
            <label for="fullName">FullName:</label>
            <input type="text" name="fullName" id="fullName">
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </p>
        <p>
            <label for="tel">Tel:</label>
            <input type="text" name="tel" id="tel">
        </p>
        <p>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address">
        </p>
        <p>
            <a href="{{ route('contact.list') }}">Back To List</a>
            <button type="submit">Add</button>
        </p>
    </form>

@endsection
