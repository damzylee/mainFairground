
        @csrf
            <div class="form-group">
                    <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{old('name') ?? $company->name}}" class="form-control">
                <div>{{$errors->first('name')}}</div>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="{{old('email') ?? $company->email}}" class="form-control">
                <div>{{$errors->first('email')}}</div>
            </div>
            
            <div class="form-group">
                <label for="number">Phone number:</label>
                <input type="text" name="number" id="number" value="{{old('number') ?? $company->number}}" class="form-control">
                <div>{{$errors->first('number')}}</div>
            </div>

            <div class="form-group">
                <label for="sector_id">Sector:</label>
                <select name="sector_id" id="sector_id" class="form-control">
                    @foreach($sectors as $sector)
                    <option value="{{$sector->id}}"{{$sector->id == $company->sector_id ? 'selected' : ''}}>{{$sector->name}}</option>
                    @endforeach
                </select>
                <div>{{$errors->first('sector_id')}}</div>
            </div> 

            <div class="form-group">
                    <label for="country">Country:</label>
                <input type="text" name="country" id="country" value="{{old('country') ?? $company->country}}" class="form-control">
                <div>{{$errors->first('country')}}</div>
            </div>
            
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" name="state" id="state" value="{{old('state') ?? $company->state}}" class="form-control">
                <div>{{$errors->first('state')}}</div>
            </div>
            
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" value="{{old('address') ?? $company->address}}" class="form-control">
                <div>{{$errors->first('address')}}</div>
            </div>

            <div class="form-group">
                <label for="profile">About company:</label>
                <textarea name="profile" id="profile"  class="form-control" cols="60" rows="10">{{old('profile') ?? $company->profile}}</textarea>
                <div>{{$errors->first('profile')}}</div>
            </div>
            
            <div class="form-group">
                <label for="YOE">Year of establishment:</label>
                <input type="date" name="YOE" value="{{old('YOE') ?? $company->YOE}}" class="form-control">
                <div>{{$errors->first('YOE')}}</div>
            </div>


            <div class="form-group d-flex flex-column">
                <label for="image">Profile image:</label>
                <input type="file" name="image" class="py-2">
                <div>{{$errors->first('image')}}</div>
            </div>