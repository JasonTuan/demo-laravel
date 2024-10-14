@extends('layouts.basic')

@section('content')
    <h2>Contact Group</h2>

    <a href="{{ route('contact.list') }}">Contact List</a> |
    <a href="{{ route('contactGroup.add') }}">Add Contact Group</a> |

    @if ($contactGroups->isEmpty())
        <p>No contact groups found</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contactGroups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->name }}</td>
                        <td>
                            <a href="{{ route('contactGroup.show', [ 'id' => $group->id ]) }}">Edit</a>
                            <form method="post" action="{{ route('contactGroup.delete', [ 'id' => $group->id ]) }}">
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
                if (confirm('Are you sure you want to delete this contact group?')) {
                    event.target.closest('form').submit();
                }
            });
        });
    </script>
@endsection
