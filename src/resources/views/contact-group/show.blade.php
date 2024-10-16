@extends('layouts.default')

@section('page_content')
    <h3>Edit Contact Group</h3>

    <div class="row">
        <div class="col-6">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" data-bs-dismiss="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="post" action="{{ route('contactGroup.update', [ 'id' => $contactGroup->id ]) }}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $contactGroup->name }}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-regular fa-floppy-disk"></i> Update
                    </button>
                    <a href="{{ route('contactGroup.list') }}" class="btn btn-link">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="module">
        $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert-success").slideUp(500);
        });
    </script>
@endsection
