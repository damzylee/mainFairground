@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="text-center">
        <h1 class="my-3 p-3">ADD A SERVICE</h1>
        <p class="my-3 p-3">Please fill the form below to add a service your company provides.</p>
    </div>
<div>

<div class="container">
    <form action="/service" method="POST" class="pb-5" enctype="multipart/form-data">
        @include('service.form')

        <input type="submit" value="UPLOAD SERVICE"  class="btn btn-primary form-control">
    </form>
    <a href="/company/{{$company->id}}"><button class="btn btn-warning form-control">CANCEL</button></a>
</div>
@endsection