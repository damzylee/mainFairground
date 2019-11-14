
        @csrf
            <div class="form-group">
                    <label for="title">Title:</label>
                <input type="text" name="title" class="form-control">
                <div>{{$errors->first('title')}}</div>
            </div>

            <div class="form-group">
                <label for="detail">Make request:</label>
                <textarea name="detail" id="detail" class="form-control" cols="60" rows="10">make a request...</textarea>
                <div>{{$errors->first('detail')}}</div>
            </div>