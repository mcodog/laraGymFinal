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
    <div class="programs-container" id="programDeck">
        
    </div>
</div>

<script src="{{ asset('js/browse_programs.js') }}"></script>
@endsection