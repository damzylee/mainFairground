
        @csrf
            <div class="form-group">
                    <label for="name">Service title</label>
                <input type="text" name="name"  value="{{old('name') ?? $service->name}}" class="form-control">
                <div>{{$errors->first('name')}}</div>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" cols="60" rows="10">{{old('description') ?? $service->description}}</textarea>
                <div>{{$errors->first('description')}}</div>
            </div>