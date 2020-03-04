@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="searchBar">
            <form action="{{route('kassa.search')}}" method="get">
                @csrf
                <div class="form-group">
                    <input type="search" name="search" class="form-control" id="autocomplete" aria-describedby="searchUser"
                           placeholder="Gebruikersnaam..." value="{{ old('search') }}" autofocus required/>
                    <button type="submit" class="btn btn-primary" id="autocomplete-btn">Zoek</button>
                    <small id="autocomplete-small" class="form-text text-muted">Wie zijn balance wil je beheren?</small>
                </div>
            </form>
        </div>

    @yield('manageBalance')

    </div>
@endsection


