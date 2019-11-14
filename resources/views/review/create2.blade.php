@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="text-center">
        <h1 class="my-3 p-3">MAKE A REVIEW</h1>
        <p class="p-3">Make a review about a company's service.</p>
    </div>
<div>

<div class="container">
    <form action="/reviewCom" method="POST" class="pb-5" enctype="multipart/form-data">
        @csrf

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

        <button type="submit" class="btn btn-info form-control">UPLOAD REVIEW</button>
    </form>
    <a href="/home"><button class="btn btn-warning form-control">CANCEL</button></a>
</div>
@endsection