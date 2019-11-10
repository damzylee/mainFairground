@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="text-center">
        <h1 class="my-3 p-3">CREATE A COMPANY</h1>
        <p class="my-3 p-3">Please fill the form below to create a company</p>
    </div>
<div>

<div class="container">
    <form action="/company" method="POST" class="pb-5" enctype="multipart/form-data">
        @include('company.form')

        <input type="submit" class="btn btn-primary form-control" value="REGISTER COMPANY"/>
    </form>
</div>
@endsection