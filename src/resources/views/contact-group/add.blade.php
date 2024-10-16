@extends('layouts.default')

@section('page_content')
    <h3>Add Contact Group</h3>

    <div class="row">
        <div class="col-6">
            <form method="post" action="{{ route('contactGroup.create') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-regular fa-floppy-disk"></i> Add
                    </button>
                    <a href="{{ route('contactGroup.list') }}" class="btn btn-link">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
