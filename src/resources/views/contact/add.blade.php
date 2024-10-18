@extends('layouts.default')

@section('page_content')
    <h2>Add Contact</h2>

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
            <form method="post" action="{{ route('contact.create') }}">
                @csrf
                <div class="mb-3">
                    <label for="groupId" class="form-label">Contact Group:</label>
                    <select name="groupId" id="groupId" class="form-select @error('groupId') is-invalid @enderror">
                        <option value="">Select Group</option>
                        @foreach($contactGroups as $group)
                            <option value="{{ $group->id }}" {{ old('groupId', '') == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fullname" class="form-label">FullName:</label>
                    <input type="text" name="fullname" id="fullname" class="form-control @error('fullname') is-invalid @enderror" value="{{ old('fullname', '') }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', '') }}">
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Tel:</label>
                    <input type="text" name="tel" id="tel" class="form-control @error('tel') is-invalid @enderror" value="{{ old('tel', '') }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', '') }}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-regular fa-floppy-disk"></i> Add
                    </button>
                    <a href="{{ route('contact.list') }}" class="btn btn-link">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
