@extends('layouts.app2')

@section('content')
<div class="container my-3">
    <div class="row">
        <div class="col-3 offset-7">
            <a href="/{{ Auth::user()->id }}"><button class="btn btn-danger float-right">cancel</button></a>
        </div>
    </div>
</div>
    <div class="container my-5">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="/{{$user->id}}" method="POST" class="pb-5" enctype="multipart/form-data">
                    @method('PATCH')
                    @include('profile.form')
            
                    <button type="submit" class="btn btn-primary">update</button>
                </form>
            </div>
        </div>

    </div>
@endsection