@extends('layouts.default')

@section('page_content')
    <h2>Edit Contact</h2>

    <form method="post" action="{{ route('contact.update', [ 'id' => $contact->id ]) }}">
        @csrf
        @method('put')
        <p>
            <label for="groupId">Contact Group:</label>
            <select name="groupId" id="groupId">
                <option value="">Select Group</option>
                @foreach($contactGroups as $group)
                    <option value="{{ $group->id }}"
                        {{ $contact->group_id === $group->id ? 'selected' : '' }} >
                        {{ $group->name }}
                    </option>
                @endforeach
            </select>
        </p>
        <p>
            <label for="fullName">FullName:</label>
            <input type="text" name="fullName" id="fullName" value="{{ $contact->fullname }}">
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="{{ $contact->email }}">
        </p>
        <p>
            <label for="tel">Tel:</label>
            <input type="text" name="tel" id="tel" value="{{ $contact->tel }}">
        </p>
        <p>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="{{ $contact->address }}">
        </p>
        <p>
            <a href="{{ route('contact.list') }}">Back To List</a>
            <button type="submit">Update</button>
        </p>
    </form>

@endsection
