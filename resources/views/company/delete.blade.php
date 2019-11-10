@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="text-center">
        <h1 class="my-3 p-3">ARE YOU SURE YOU WANT TO DEACTIVATE YOUR COMPANY'S ACCOUNT?</h1>
    </div>
<div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>{{$company->name}} would be deactivated on click of "deactivate account" button. Be sure before clicking.</h3>
            <p><a href="{{$company->id}}/edit">Edit</a></p>

            <form action="{{$company->id}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger form-control">DEACTIVATE ACCOUNT</button>
            </form>
        </div>
    </div>
</div>