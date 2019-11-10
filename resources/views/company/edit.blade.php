@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="text-center">
        <h1 class="my-3 p-3">COMPANY'S DETAIL EDIT FORM</h1>
        <p class="p-3">Fill the form below to update your company's details.</p>
    </div>
<div>

<div class="container">
    <form action="/company/{{$company->id}}" method="POST" class="pb-5" enctype="multipart/form-data">
        @method('PATCH')
        @include('company.form')

        <button type="submit" class="btn btn-primary form-control">UPDATE</button>
    </form>
    <a href="/company/{{$company->id}}"><button class="btn btn-warning form-control">CANCEL</button></a>
</div>
@endsection