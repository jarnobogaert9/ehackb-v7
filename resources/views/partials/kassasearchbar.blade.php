<div class="searchBar">
    <form action="{{route('sales.search')}}" method="get">
        @csrf
        <div class="form-group">
            <small id="autocomplete-small" class="form-text text-muted">Wie zijn balance wil je beheren?</small>
            <div class="d-flex">
                <input type="search" name="search" class="form-control" id="autocomplete" aria-describedby="searchUser"
                       placeholder="Gebruikersnaam..." @if(isset($user)) value="{{ $user->username }}" @endif autofocus required/>
                <button type="submit" class="btn inlineBtn" id="autocomplete-btn">Zoek</button>
            </div>
            <ul class="autofillList" id="autofillList"></ul>
        </div>
    </form>
</div>

<script>
    let usernames = @json(\App\User::all()->map(function ($user){
        return strtolower($user->username);
    }));
</script>
<script src="{{ asset('js/autocompleteUsernames.js') }}"></script>