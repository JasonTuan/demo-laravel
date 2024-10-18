@extends('layouts.default')

@section('page_content')
    <h2>Contact</h2>

    <p class="mb-4">
        <a href="{{ route('contact.add') }}" class="btn btn-success">
            <i class="fa-solid fa-plus"></i>
            Add Contact
        </a>
    </p>

    @if ($contacts->isEmpty())
        <div class="alert alert-primary" role="alert">
            No contact found
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col">FullName</th>
                    <th class="col">Email</th>
                    <th class="col">Tel</th>
                    <th class="col">Address</th>
                    <th class="col">Group</th>
                    <th class="col-1">Actions</th>
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
                            <a href="{{ route('contact.show', [ 'id' => $contact->id ]) }}" class="btn btn-info">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <form method="post" action="{{ route('contact.delete', [ 'id' => $contact->id ]) }}" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-danger btn-delete">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this contact?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                        Cancel
                    </button>
                    <button type="button" class="btn btn-danger btn-confirm-delete">
                        <i class="fa-solid fa-trash-can"></i>
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="module">
        $('.btn-delete').on('click', function (event) {
            $('#confirmModal')
                .on('show.bs.modal', function () {
                    const form = event.target.closest('form');
                    $('.btn-confirm-delete').click(function () {
                        form.submit();
                    });
                })
                .on('hidden.bs.modal', function () {
                    $('.btn-confirm-delete').off('click');
                })
                .modal('show');
        });
    </script>
@endsection
