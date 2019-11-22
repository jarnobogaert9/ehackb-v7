<form action="{{ route('sponsors.update', $sponsor->id) }}" method="post">
    @csrf
    @method('PUT')

    <label for="name">Naam</label>
    <input type="text" name="name" value="{{ (old('name') !== null) ? old('name') : $sponsor->name }}" id="name" autofocus required/>
    @error('name')
    <p>{{ $errors->first('name') }}</p>
    @enderror
    {{ old('tier') }}
    <label for="tier">Tier</label>
    <select name="tier" id="tier" required>
        <option value="1" {{ (old('tier') == 1) ? 'selected' : (old('tier') === null && $sponsor->tier === 1) ? 'selected' : '' }}>1</option>
        <option value="2" {{ (old('tier') == 2) ? 'selected' : (old('tier') === null && $sponsor->tier === 2) ? 'selected' : '' }}>2</option>
        <option value="3" {{ (old('tier') == 3) ? 'selected' : (old('tier') === null && $sponsor->tier === 3) ? 'selected' : '' }}>3</option>
    </select>
    @error('tier')
    <p>{{ $errors->first('tier') }}</p>
    @enderror
    <label for="logo">Logo</label>
    <input type="text" name="logo" value="{{ (old('logo') !== null) ? old('logo') : $sponsor->logo }}" id="logo" required/>
    @error('logo')
    <p>{{ $errors->first('logo') }}</p>
    @enderror
    <label for="url">Url</label>
    <input type="url" name="url" value="{{ (old('url') !== null) ? old('url') : $sponsor->url }}" id="url" required/>
    @error('url')
    <p>{{ $errors->first('url') }}</p>
    @enderror
    <input type="submit" value="Maak aan">
</form>
<form action="{{ route('sponsors.delete', $sponsor->id) }}" method="post">
    @csrf
    @method('DELETE')

    <input type="submit" value="Verwijder sponsor"/>
</form>