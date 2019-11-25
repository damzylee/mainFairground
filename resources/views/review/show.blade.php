@extends('layouts.app2')

@section('content')

    <div class="container my-5">
        <div class="text-center my-5">
            <h1>{{$review->user->name}}'s review</h1>
        </div>
        <div class="d-flex justify-content-center my-5"><a href="/company/{{$company->id}}"><button class="btn btn-warning form-control">BACK</button></a></div>
                        
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <a class="float-left" href="/review/{{$review->id}}">
                                <img src="../storage/{{$review->image}}" class="img img-rounded img-fluid"  style="width:100%; height:85%"/>
                                <p class="text-secondary text-center">{{$review->created_at->diffForHumans()}}</p>
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
                            @auth
                            @if(Auth::user()->type == 'user')
                            <p>
                                <a class="float-right btn btn-outline-primary ml-2" data-toggle="modal" data-target="#exampleModalCenter2"> <i class="fa fa-comment"></i></a>
                                <a class="float-right btn btn-outline-info  ml-2" href="/like/create"> <i class="fa fa-heart"></i></a>
                            </p>
                            @else
                            @endif
                            @endauth
                        </p>
                        </div>
                    </div>
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
        @if(count($comments) == 1)
            <h5 class="text-center my-4">Comment</h5>
        @elseif(count($comments) > 1)
            <h5 class="text-center my-4">Comments</h5>
        @else
        @endif
        @foreach($comments as $comment)
            <div class="card card-inner my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="../storage/{{$comment->user->image}}" class="img img-rounded img-fluid"  style="width:100%; height:120px"/>
                            <p class="text-secondary text-center mt-2">{{$comment->created_at->diffForHumans()}}</p>
                        </div>
                        <div class="col-md-10">
                            <p><strong>{{$comment->user->name}}</strong></p>
                            <p>{{$comment->comment}}</p>
                            @auth
                            <p>
                                @if(Auth::user()->id == $comment->user->id)
                          
                            <form action="/comment/{{$comment->id}}" class="mr-3 p-3" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="float-right btn btn-outline-danger ml-2"><i class="fa fa-trash"></i></button> 
                            </form>
                            @else
                            @endif
                            <!-- <a class="float-right btn btn-outline-info  ml-2" href="/like/create"> <i class="fa fa-heart"></i></a> -->
                        </p>
                        @endauth
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
    </div>
@endsection