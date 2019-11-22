<form action="{{ route('talks.store') }}" method="post">
    @csrf

    <label for="title">Titel</label>
    <input type="text" name="title" id="title" autofocus required/>
    @error('title')
    <p>{{ $errors->first('title') }}</p>
    @enderror
    <label for="photo">Foto</label>
    <input type="text" name="photo" id="photo" required/>
    @error('photo')
    <p>{{ $errors->first('photo') }}</p>
    @enderror
    <label for="excerpt">Samenvatting</label>
    <textarea name="excerpt" id="excerpt" cols="30" rows="10" required></textarea>
    @error('excerpt')
    <p>{{ $errors->first('excerpt') }}</p>
    @enderror
    <label for="body">Body</label>
    <textarea name="body" id="body" cols="30" rows="10" required></textarea>
    @error('body')
    <p>{{ $errors->first('body') }}</p>
    @enderror
    <label for="speaker">Spreker</label>
    <input type="text" name="speaker" id="speaker" required/>
    @error('speaker')
    <p>{{ $errors->first('speaker') }}</p>
    @enderror
    <label for="startTime">Starttijd</label>
    <input type="time" name="start_time" id="startTime" required/>
    @error('start_time')
    <p>{{ $errors->first('start_time') }}</p>
    @enderror
    <label for="endTime">Eindtijd</label>
    <input type="time" name="end_time" id="endTime" required/>
    @error('end_time')
    <p>{{ $errors->first('end_time') }}</p>
    @enderror
    <label for="places">Aantal plaatsen</label>
    <input type="number" name="max_places" id="places" required/>
    @error('max_places')
    <p>{{ $errors->first('max_places') }}</p>
    @enderror
    <input type="submit" value="Maak aan"/>
</form>