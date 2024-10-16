@extends('layouts.default')

@section('page_content')
    <h3>Add Contact Group</h3>

    <div class="row">
        <div class="col-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('contactGroup.create') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
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
