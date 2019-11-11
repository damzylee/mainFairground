
        @csrf
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea name="comment" id="comment" class="form-control" placeholder="{{old('email') ?? $comment->comment}}" cols="60" rows="10"></textarea>
                <div>{{$errors->first('comment')}}</div>
            </div>