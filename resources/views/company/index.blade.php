@extends('layouts.app2')

@section('content')
    <div>
        <div class="card bg-dark text-white text-center" style="background: black;">
            <img src="../storage/{{$company->image}}" class="card-img" alt="Company's picture"   style="height: 500px; opacity:60%;">
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

        @auth
        <!-- button -->
        <div class="container d-flex justify-content-center">
            <div>
                @if(Auth::user()->type == 'host')
                    @if(Auth::user()->id == $company->user_id)
                    <div class="p-2">
                        <a href="/service/create"><button class="btn btn-outline-primary">add service</button></a>
                    </div>
                    @else
                    @endif
                @else
                <div class="p-2">
                    <a href="/request/create"><button class="btn btn-outline-primary">make a request</button></a>
                </div>
                @endif
            </div>
            <div class="">
                @if(Auth::user()->type === 'user')
                    <div class="p-2">
                        <a href="/reviewCom/create"><button class="btn btn-outline-info">make review</button></a>
                    </div>
                @else
                    @if(Auth::user()->id == $company->user_id)
                        @if(count($requests) > 0 )
                        <div class="p-2">
                            <a href="/requestAll/{{$company->id}}"><button class="btn btn-outline-info">view request</button></a>
                        </div>
                        @else
                        <div class="p-2">
                        <button class="btn btn-outline-info" data-toggle="tooltip" data-placement="bottom" title="No request available" disabled>view request</button>
                        </div>
                        @endif
                    @else
                    @endif
                @endif
            </div>

            @if(Auth::user()->id == $company->user_id)
                    <div class="p-2">
                        <a href="/company/{{$company->id}}/edit"><button class="btn btn-light">edit company's details</button></a>
                    </div>
                    <div class="p-2">
                        <button class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModalCenter3">deactivate company</button>
                    </div>

                    <!-- Modal for deactivating an account -->
            <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalCenterTitle">ARE YOU SURE YOU WANT TO DEACTIVATE YOUR COMPANY'S ACCOUNT?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <div class="text-center">
                                    <h6>{{$company->name}} would be deactivated on click of "deactivate account" button. Be sure before clicking.</h6>

                                    <form action="{{$company->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger form-control">Deactivate</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary form-control mt-2" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                @endif

            </div>
            <!-- Modal for deactivating an account-->
 
        </div>
        </div>
        <!-- button -->

        @endauth

        <div class="container my-5">
            <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <h3 class="">Services offered by {{$company->name}}</h3>
                <div>
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
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <h3>Location</h3>
                <p>{{$company->address}},</p>
                <p>{{$company->state}}, {{$company->country}}</p>
                <p class="card-text"><small class="text-muted">Mail us at {{$company->email}} or call {{$company->number}}</small></p>
            </div>
        </div>
        </div>

        <div class="container my-5">
                <h1 class="text-center">Reviews on {{$company->name}}</h1>
                <hr>

            @if(count($reviews) > 0)
            <div class="my-5">

                    @foreach($reviews as $review) 
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="float-left" href="/review/{{$review->id}}">
                                        <img src="../storage/{{$review->image}}" class="img img-rounded img-fluid"/>
                                        <p class="text-secondary text-center">{{$review->created_at}}</p>
                                    </a>
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
                @auth
                        <div class="card-footer" style="padding: .1rem;">
                            <p class="float-right">
                            @if(Auth::user()->id == $review->user->id)
                                <a class="float-right btn btn-outline-danger ml-2" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash"></i></a>
                            @endif
                                @if(Auth::user()->type == 'user')
                                <a class="float-right btn btn-outline-primary ml-2" data-toggle="modal" data-target="#exampleModalCenter2"> <i class="fa fa-comment"></i></a>
                                @endif
                                <!-- <a class="float-right btn btn-outline-info  ml-2" href="/like/create"> <i class="fa fa-heart"></i></a> -->
                            </p>
                            <!-- <p class="float-left">
                                <span>comments</span>
                                <span>likes</span>
                            </p> -->

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
                @endauth
                    </div>
                </div>                                
                @endforeach
            </div>
        @else
        <p class="text-center">No review on {{$company->name}} yet. @if(Auth::user()->type == 'user')<a href="/review/create">Click here to review.</a>@else @endif</p>
        @endif
        </div>
    </div>

@endsection