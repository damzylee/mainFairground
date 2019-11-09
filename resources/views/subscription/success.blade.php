@extends('layouts.app2')

@section('content')
    <div class="card bg-dark text-white text-center">
        <img src="../storage/uploads/success.jpg" class="card-img" alt="Successful"   style="height: 500px; opacity:70%;">
        <div class="card-img">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Congratulations {{ Auth::user()->name }}!</h4>
                <p>Your {{ $subscription->type }} subscription was successful. You are now a host. Fairground is happy to have you on board.</p>
                <hr>
                <p class="mb-0">To create a company <a href="/company/create"><button class="btn btn primary">click here</button></a></p>
            </div>
        </div>
    </div>



@endsection