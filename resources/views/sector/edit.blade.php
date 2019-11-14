@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="text-center">
        <h1 class="my-3 p-3">SERVICE EDIT FORM</h1>
        <p class="p-3">Be sure before editing and submitting the form.</p>
    </div>
<div>

<div class="container">
    <form action="/service/{{$service->id}}" method="POST" class="pb-5" enctype="multipart/form-data">
    @method('PATCH')
        @include('service.form')

        <button type="submit" class="btn btn-primary form-control">UPDATE SERVICE</button>
    </form>
    <a href="/company/{{$company->id}}"><button class="btn btn-warning form-control">CANCEL</button></a>
</div>
@endsection