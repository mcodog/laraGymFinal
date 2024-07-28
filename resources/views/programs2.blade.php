@extends('layouts.client')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/program.css') }}">
<div class="main-section">
    
</div>

<div class="main-container">
    <div class="side-container">
        <div class="search-container">
            <div>
                Search
            </div>
            <div>
                <input type="text">
            </div>
        </div>

        <div class="filter-container">

        </div>
    </div>
    <div class="programs-container">
        @foreach($programs as $program)
            <a href="/programs/{{ $program->id }}">
                <div class="program-card">
                    <div class="program-img-container">
                        <img class="program-img" src="{{ asset('storage/images/' . $program->image) }}" alt="">
                    </div>
                    <div class="program-body">
                        <div class="program-title">{{ $program->title }}</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

<script src="{{ asset('js/browse_programs.js') }}"></script>
@endsection