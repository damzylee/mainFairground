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
            <h2 class="card-title ">About {{$company->name}}</h2>
            <p class="card-text p-2">{{$company->profile}}</p>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="text-center">Services offered by {{$company->name}}</h3>
                <div class="row">
                    <div class="col-9">
                @if(count($services) > 0)
                <?php
                    $i = 1;
                ?>
                        @foreach($services as $service)
                            <a href="/service/{{$service->id}}">
                                @if($i%3 == 0)
                                <a href="/service/{{$service->id}}">
                                    <button class="btn btn-info my-1 mx-1">
                                @elseif($i%3 == 1)
                                <a href="/service/{{$service->id}}">
                                    <button class="btn btn-dark my-1 mx-1">
                                @else
                                <a href="/service/{{$service->id}}">
                                    <button class="btn btn-secondary my-1 mx-1">
                                @endif
                                        {{$service->name}}
                                    </button>
                            </a>
                            <?php
                                $i++;
                            ?>
                        @endforeach
                        @endif
                    </div>

                    <div class="col-3">
                        @if(Auth::user()->companies)
                                <div class="p-2">
                                    <a href="/service/create"><button class="btn btn-outline-primary">add service</button></a>
                                </div>
                            @else
                                <div class="p-2">
                                    <a href="/request/create"><button class="btn btn-outline-primary">make a request</button></a>
                                </div>
                            @endif
                    </div>
                </div>
            </div>

            <div class="col-5 offset-1">
                <div class="row">
                    <div class="col-9">
                        <h3>Location</h3>
                        <p>{{$company->address}},</p>
                        <p>{{$company->state}}, {{$company->country}}</p>
                        <p class="card-text"><small class="text-muted">Mail us at {{$company->email}} or call {{$company->number}}</small></p>
                    </div>
                    <div class="col-3">
                        <div class="p-2">
                            <a href="/company/{{$company->id}}/edit"><button class="btn btn-light">edit company's details</button></a>
                        </div>
                        <div class="p-2">
                            <a href="/delete"><button class="btn btn-outline-warning">deactivate company</button></a>
                        </div>
                    </div>
                </div>
                
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
            @if(Auth::user()->type === 'user')
                <div class="p-2">
                    <a href="/review/create"><button class="btn btn-outline-info">make review</button></a>
                </div>
            @endif
            </div>
        </div>
    </div>
@endsection