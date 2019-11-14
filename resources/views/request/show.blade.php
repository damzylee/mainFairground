@extends('layouts.app2')

@section('content')

    <div class="container my-5">
        <div class="text-center">
            <h1 class="my-3 p-3">{{$makeRequest->user->name}}'s Request</h1>
        </div>
    <div>
    <div class="d-flex justify-content-center my-5"><a href="/requestAll/{{$company->id}}"><button class="btn btn-warning form-control">BACK</button></a></div>
    <div class="container">
        <div class="card">
                <div class="card-body">
                        <div class="col-md-12">
                            <p>
                                <a class="float-left" href="/makeRequest/{{$makeRequest->id}}"><strong>{{$makeRequest->title}}</strong></a>
                                <!-- <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span> -->
                            </p>
                            <p class="text-secondary text-center float-right ml-3">posted {{$makeRequest->created_at->diffForHumans()}} by {{$makeRequest->user->name}}</p>
                        <div class="clearfix"></div>
                            <p> {{$makeRequest->detail}}</p>
                            <p>
                                <a class="float-right btn btn-outline-primary ml-2" data-toggle="modal" data-target="#exampleModalCenter2"> <i class="fa fa-comment"></i></a>
                            </p>

                        </p>
                        </div>
                    </div>
                        <div class="card card-inner">

                            @if(count($comments) == 1)
                            <h5 class="text-center my-4">Comment</h5>
                            @elseif(count($comments) > 1)
                            <h5 class="text-center my-4">Comments</h5>
                            @else
                            @endif

                            @foreach($comments as $comment)
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="../storage/{{$comment->user->image}}" class="img img-rounded img-fluid"/>
                                        <p class="text-secondary text-center">15 Minutes Ago</p>
                                    </div>
                                    <div class="col-md-10">
                                        <p><strong>{{$comment->user->name}}</strong></p>
                                        <p>{{$comment->comment}}</p>
                                        <p>
                                        @if(Auth::user()->id == $comment->user_id)
                                        <a class="float-right btn btn-outline-danger ml-2" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash"></i></a>
                                        @else
                                        @endif
                                        <a class="float-right btn btn-outline-info  ml-2" href="/like/create"> <i class="fa fa-heart"></i></a>
                                    </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>


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
                            <form action="/commentrequest" method="POST" class="pb-5" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="comment">Comment:</label>
                                    <textarea name="comment" id="comment" class="form-control" cols="60" rows="10"></textarea>
                                    <div>{{$errors->first('comment')}}</div>
                                </div>

                                <div class="form-group" hidden>
                                    <input name="make_request_id" id="make_request_id" value="{{$makeRequest->id}}" class="form-control" cols="60" rows="10">
                                    <!-- <div>{{$errors->first('make_request_id')}}</div> -->
                                </div>
                                <div class="form-group" hidden>
                                    <input name="company_id" id="company_id" value="{{$company->id}}" class="form-control" cols="60" rows="10">
                                    <!-- <div>{{$errors->first('company_id')}}</div> -->
                                </div>

                                <button type="submit" class="btn btn-primary form-control">post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal for creating comment-->


        </div>

    </div>
@endsection