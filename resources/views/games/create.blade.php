<form action="{{ route('games.store') }}" method="post">
    @csrf
    <label for="name">Naam</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus/>
    @error('name')
    <p>{{ $errors->first('name') }}</p>
    @enderror
    <label for="photo">Thumbnail</label>
    <input type="text" name="thumbnail" value="{{ old('thumbnail') }}" id="photo" required/>
    @error('thumbnail')
    <p>{{ $errors->first('thumbnail') }}</p>
    @enderror
    <label for="time">Starttijd</label>
    <input type="time" name="start_time" value="{{ old('start_time') }}" id="time" required/>
    @error('start_time')
    <p>{{ $errors->first('start_time') }}</p>
    @enderror
    <label for="loc">Locatie</label>
    <input type="text" name="location" value="{{ old('location') }}" id="loc" required/>
    @error('location')
    <p>{{ $errors->first('location') }}</p>
    @enderror
    <input type="submit" value="Maak aan">
</form>
