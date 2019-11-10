@extends('layouts.app2')

@section('content')
    <div class="container my-5">
        <div class="text-center">
            <h1 class="my-3 p-3">PROFILE EDIT FORM</h1>
            <p class="p-3">Fill the form below to update your profile details.</p>
        </div>
    <div>

    <div class="container my-5">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="/{{$user->id}}" method="POST" class="pb-5" enctype="multipart/form-data">
                    @method('PATCH')
                    @include('profile.form')
            
                    <button type="submit" class="btn btn-primary form-control">UPDATE</button>
                </form>
                <a href="/{{$user->id}}"><button class="btn btn-warning form-control">CANCEL</button></a>
            </div>
        </div>

    </div>
@endsection