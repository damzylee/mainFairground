@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="text-center">
        <h1 class="my-3 p-3">MAKE A REVIEW</h1>
        <p class="p-3">Make a review about a company's service.</p>
    </div>
<div>

<div class="container">
    <form action="/review" method="POST" class="pb-5" enctype="multipart/form-data">
        @include('review.form')

        <button type="submit" class="btn btn-info form-control">UPLOAD REVIEW</button>
    </form>
    <a href="/home"><button class="btn btn-warning form-control">CANCEL</button></a>
</div>
@endsection