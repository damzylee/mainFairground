
        @csrf
            <div class="form-group">
                    <label for="name">Sector name</label>
                <input type="text" name="name"  value="{{old('name') ?? $sector->name}}" class="form-control">
                <div>{{$errors->first('name')}}</div>
            </div>

            <div class="form-group d-flex flex-column">
                <label for="image">Image:</label>
                <input type="file" name="image" class="py-2">
                <div>{{$errors->first('image')}}</div>
            </div>