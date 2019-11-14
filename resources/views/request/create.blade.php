@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="text-center">
        <h1 class="my-3 p-3">MAKE A REQUEST TO THE COMPANY</h1>
        <p class="my-3 p-3">Please fill the form below to make a request.</p>
    </div>
<div>

<div class="container">
    
    <form action="/request" method="POST" class="pb-5" enctype="multipart/form-data">
        @include('request.form')

        <button type="submit" class="btn btn-primary form-control">MAKE A REQUEST</button>
    </form>
    <a href="/company/{{$company->id}}"><button class="btn btn-warning form-control">CANCEL</button></a>
</div>
@endsection