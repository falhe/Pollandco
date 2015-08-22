@extends('app')

@section('content')

    @if (Auth::user())
        {{-- expr --}}
        {{ Auth::user()->name }}
        {{ Auth::user()->email }}
    @else
        <h1>admin pas connecté</h1>
    @endif

    <div class="row">
        <div class="col-sm-4 col-md-4">
            @include('admin.left-menu')
        </div>
        <div class="col-sm-8 col-md-8">
            <div id="search-users-list"></div>
        </div>
    </div>

@stop