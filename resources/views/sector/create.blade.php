@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="text-center">
        <h1 class="my-3 p-3">ADD A SECTOR</h1>
        <p class="my-3 p-3">Please fill the form below to add a sector ehre companies can fall under.</p>
    </div>
<div>

<div class="container">
    <form action="/sector" method="POST" class="pb-5" enctype="multipart/form-data">
        @include('sector.form')

        <input type="submit" value="UPLOAD SECTOR"  class="btn btn-primary form-control">
    </form>
</div>
@endsection