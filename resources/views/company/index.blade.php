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


    <div class="container my-5">
        <div class="row">
            <h3 class="text-center">Services offered by {{$company->name}}</h3>
            <div class="col-9">
                @if(count($services) > 0)
                <?php
                    $i = 1;
                ?>
                    @foreach($services as $service)
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

    <div class="container my-5">
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
                <div class="p-2 m-2">
                    <a href="/delete"><button class="btn btn-outline-warning">deactivate company</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-9">
                <h1>Reviews on {{$company->name}}</h1>
                <hr>
                @foreach($reviews as $review) 
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="../storage/{{$review->image}}" class="img img-rounded img-fluid"/>
                                <p class="text-secondary text-center">{{$review->created_at}}</p>
                            </div>
                            <div class="col-md-10">
                                <p>
                                    <a class="float-left" href="/review/{{$review->id}}"><strong>Name</strong></a>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                            </p>
                            <div class="clearfix"></div>
                                <p>{{$review->review}}</p>
                                <p>
                                    <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-comment"></i> comment</a>
                                    <a class="float-right btn btn-outline-info  ml-2"> <i class="fa fa-heart"></i> like</a>
                                    <form action="{{$review->id}}" class="ml-5" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a class="float-right btn btn-outline-danger"> <i class="fa fa-trash"></i> delete</a>
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                                            
                @endforeach


                    
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