@extends('layouts.basic')

@section('content')
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DEMO LARAVEL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                           href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (preg_match('/^(contactGroup|contactGroup\..*)$/', Route::currentRouteName())) ? 'active' : '' }}"
                           href="{{ route('contactGroup.list') }}">Group</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (preg_match('/^(contact|contact\..*)$/', Route::currentRouteName())) ? 'active' : '' }}"
                           href="{{ route('contact.list') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('page_content')
    </main>
@endsection
