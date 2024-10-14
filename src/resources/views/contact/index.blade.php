@extends('layouts.basic')

@section('content')
    <h2>Contact</h2>

    <a href="{{ route('contact.add') }}">Add Contact</a>

    @if ($contacts->isEmpty())
        <p>No contact found</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FullName</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Address</th>
                    <th>Group</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->fullname }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->tel }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->contactGroup->name }}</td>
                        <td>
                            <a href="{{ route('contact.show', [ 'id' => $contact->id ]) }}">Edit</a>
                            <form method="post" action="{{ route('contact.delete', [ 'id' => $contact->id ]) }}">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.btn-delete').forEach(function (button) {
            button.addEventListener('click', function (event) {
                if (confirm('Are you sure you want to delete this contact?')) {
                    event.target.closest('form').submit();
                }
            });
        });
    </script>
@endsection
