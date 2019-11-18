
        @csrf
            <div class="form-group">
                    <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{old('name') ?? $user->name}}" class="form-control">
                <div>{{$errors->first('name')}}</div>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="{{old('email') ?? $user->email}}" class="form-control">
                <div>{{$errors->first('email')}}</div>
            </div>
            
            <div class="form-group">
                <label for="number">Phone number:</label>
                <input type="text" name="number" id="number" value="{{old('number') ?? $user->number}}" class="form-control">
                <div>{{$errors->first('number')}}</div>
            </div>

            <div class="form-group">
                    <label for="country">Country:</label>
                <input type="text" name="country" id="country" value="{{old('country') ?? $user->country}}" class="form-control">
                <div>{{$errors->first('country')}}</div>
            </div>
            
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" name="state" id="state" value="{{old('state') ?? $user->state}}" class="form-control">
                <div>{{$errors->first('state')}}</div>
            </div>
            
            <div class="form-group">
                <label for="town">Town:</label>
                <input type="text" name="town" id="town" value="{{old('town') ?? $user->town}}" class="form-control">
                <div>{{$errors->first('town')}}</div>
            </div>

            <div class="form-group">
                <label for="BIOS">Write about you:</label>
                <textarea name="BIOS" id="BIOS" class="form-control" cols="60" rows="10">{{old('BIOS') ?? $user->BIOS}}</textarea>
                <div>{{$errors->first('BIOS')}}</div>
            </div>
            
            <div class="form-group">
                <label for="DOB">Date of birth:</label>
                <input type="date" name="DOB" id="DOB" value="{{old('DOB') ?? $user->DOB}}" class="form-control">
                <div>{{$errors->first('DOB')}}</div>
            </div>


            <div class="form-group d-flex flex-column">
                <label for="image">Profile image:</label>
                <input type="file" name="image" class="py-2">
                <div>{{$errors->first('image')}}</div>
            </div>