@extends('layouts.app2')

@section('content')

        
    <div class="container  my-5">
        <h2 class="text-center my-5">Request Available for {{$company->name}}</h2>
        <div class="d-flex justify-content-center my-5"><a href="/company/{{$company->id}}"><button class="btn btn-warning form-control">BACK</button></a></div>
        @if(count($makeRequests) > 0)
            @foreach($makeRequests as $makeRequest)

            <div class="card">
                <div class="card-body">
                <div class="col-md-12">
                    <p>
                        <a class="float-left" href="/request/{{$makeRequest->id}}"><strong>{{$makeRequest->title}}</strong></a>
                        <!-- <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                        <span class="float-right"><i class="text-warning fa fa-star"></i></span> -->

                    </p>
                    <p class="text-secondary text-center float-right ml-3">posted {{$makeRequest->created_at->diffForHumans()}} by {{$makeRequest->user->name}}</p>
                    <div class="clearfix"></div>
                        <p>
                            {{$makeRequest->detail}}
                        </p>
                        <p>
                            <!-- <a class="float-right btn btn-outline-primary ml-2" data-toggle="modal" data-target="#exampleModalCenter2"> <i class="fa fa-comment"></i></a> -->
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @else
            <p>No request available</p>
        @endif
    </div>
                    <!-- Modal for creating comment-->
                    <!-- <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <div>{{$errors->first('make_request_id')}}</div>
                                </div>
                                <div class="form-group" hidden>
                                    <input name="company_id" id="company_id" value="{{$company->id}}" class="form-control" cols="60" rows="10">
                                    <div>{{$errors->first('company_id')}}</div>
                                </div>

                                <button type="submit" class="btn btn-primary form-control">post</button>
                            </form>
                    </div>
                </div>
            </div> -->
            <!-- Modal for creating comment -->
    
@endsection