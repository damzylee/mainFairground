@extends('layouts.app2')

@section('content')
    
        <div class="card bg-dark text-white text-center">
            <img src="../storage/{{$company->image}}" class="card-img" alt="Successful"   style="height: 500px; opacity:60%;">
            <div class="card-img-overlay mt-5">
                <h1 class="card-title mt-5 text-xl">{{ $company->name }}</h1>
                <p class="card-text mt-5">{{$company->name}} offers {{$company->type}} services.</p>
                <p class="card-text">Since {{$company->YOE}}</p>
            </div>
        </div>

        <div class="card-body text-center">
            <div class="p-4">
                <h2 class="card-title ">ABOUT {{$company->name}}</h2>
                <p class="card-text p-2">{{$company->profile}}</p>
            </div>
        </div>



    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="text-center">Services offered by {{$company->name}}</h3>
                <div class="row">
                    <div class="col-9">

                    </div>
                    <div class="col-3">
                        <div class="p-2">
                            <a href="/service/create"><button class="btn btn-primary">add service</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-5 offset-1">
                <h3>Location</h3>
                <p>{{$company->address}},</p>
                <p>{{$company->state}}, {{$company->country}}</p>
                <p class="card-text"><small class="text-muted">Mail us at {{$company->email}} or call {{$company->number}}</small></p>
            </div>

        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-9">
                <h1>Reviews</h1>
                <hr>

            </div>
            <div class="col-3 mt-4">
                <div class="p-2">
                    <a href="/review/create"><button class="btn btn-primary">make review</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection