
        @csrf
            <div class="form-group">
                <label for="company_id">Company:</label>
                <select name="company_id" id="company_id" class="form-control">
                    <option value="" disabled>select a company</option>
                    @foreach($companies as $company)
                    <option value="{{$company->id}}"{{$company->id == $review->company_id ? 'selected' : ''}}>{{$company->name}}</option>
                    @endforeach
                </select>
                <div>{{$errors->first('company_id')}}</div>
            </div>


            <div class="form-group">
                <label for="review">Review:</label>
                <textarea name="review" id="review" class="form-control" cols="60" rows="10">enter your review...</textarea>
                <div>{{$errors->first('review')}}</div>
            </div>
            
            <div class="form-group d-flex flex-column">
                <label for="image">Image:</label>
                <input type="file" name="image" class="py-2">
                <div>{{$errors->first('image')}}</div>
            </div>