@extends('layouts.app2')

@section('content')
    <div id="view">
        <div class="card bg-dark text-white text-center" >
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
                        <button class="btn btn-outline-warning" id="show">deactivate company</button>
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
                                        <a class="float-left" href="/review/{{$review->id}}"><strong>{{$review->user->name}}</strong></a>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    </p>

                                <div class="clearfix"></div>
                                    <p class="py-3">{{$review->review}}</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="padding: .1rem;">
                            <p>
                                <a class="float-right btn btn-outline-danger ml-2" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash"></i></a>
                                <a class="float-right btn btn-outline-primary ml-2" data-toggle="modal" data-target="#exampleModalCenter2"> <i class="fa fa-comment"></i></a>
                                <a class="float-right btn btn-outline-info  ml-2" href="/like/create"> <i class="fa fa-heart"></i></a>
                            </p>

                <!-- Modal for deleting review-->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to delete this review?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{$review->id}}" class="ml-5" method="post">
                                        @method('DELETE')
                                        @csrf
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                <!-- Modal for deleting review-->


            <!-- Modal for creating comment-->
            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Write a comment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <form action="/comment" method="POST" class="pb-5" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="comment">Comment:</label>
                                    <textarea name="comment" id="comment" class="form-control" cols="60" rows="10"></textarea>
                                    <div>{{$errors->first('comment')}}</div>
                                </div>

                                <div class="form-group" hidden>
                                    <input name="review_id" id="review_id" value="{{$review->id}}" class="form-control" cols="60" rows="10">
                                    <div>{{$errors->first('review_id')}}</div>
                                </div>
                                <div class="form-group" hidden>
                                    <input name="company_id" id="company_id" value="{{$company->id}}" class="form-control" cols="60" rows="10">
                                    <div>{{$errors->first('company_id')}}</div>
                                </div>

                                <button type="submit" class="btn btn-primary form-control">post</button>
                            </form>
                    </div>
                </div>
            </div>
            <!-- Modal for creating comment-->



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
    </div>

    <div class="container my-5"  id="delete">
        <div class="text-center">
            <h1 class="my-3 p-3">ARE YOU SURE YOU WANT TO DEACTIVATE YOUR COMPANY'S ACCOUNT?</h1>
            </div>
        <div>

        <div class="container my-5">
            <div class="row text-center">
                <div class="col-12">
                    <h5>{{$company->name}} would be deactivated on click of "deactivate account" button. Be sure before clicking.</h5>
                    <p ><a href="{{$company->id}}/edit">Edit</a></p>

                    <form action="{{$company->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger form-control">DEACTIVATE ACCOUNT</button>
                    </form>
                </div>
            </div>
            <button class="btn btn-warning form-control my-3" id="hide">CANCEL</button>
        </div>
    </div> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#delete").hide();
                $("#hide").click(function(){
                    $("#delete").hide();
                    $("#view").show();
                });
                $("#show").click(function(){
                    $("#delete").show();
                    $("#view").hide();
                });
            });
        </script>
@endsection