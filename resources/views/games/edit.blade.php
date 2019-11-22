<form action="{{ route('games.update', $game->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="name">Naam</label>
    <input type="text" name="name" value="{{ old('name') !== null ? old('name') : $game->name }}" id="name" required autofocus/>
    @error('name')
    <p>{{ $errors->first('name') }}</p>
    @enderror
    <label for="photo">Thumbnail</label>
    <input type="text" name="thumbnail" value="{{ old('thumbnail') !== null ? old('thumbnail') : $game->thumbnail }}" id="photo" required/>
    @error('thumbnail')
    <p>{{ $errors->first('thumbnail') }}</p>
    @enderror
    <label for="time">Starttijd</label>
    <input type="time" name="start_time" value="{{ old('start_time') !== null ? old('start_time') : $game->start_time }}" id="time" required/>
    @error('start_time')
    <p>{{ $errors->first('start_time') }}</p>
    @enderror
    <label for="loc">Locatie</label>
    <input type="text" name="location" value="{{ old('location') !== null ? old('location') : $game->location }}" id="loc" required/>
    @error('location')
    <p>{{ $errors->first('location') }}</p>
    @enderror
    <input type="submit" value="Update">
</form>
