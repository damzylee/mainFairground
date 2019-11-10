@extends('layouts.app2')

@section('content')

    <div class="container my-5">
        <div class="text-center">
            <h1 class="my-3 p-3">{{$company->name}}</h1>
        </div>
    <div>
    <div class="container text-center">

        <h1>Details of {{$service->name}} service</h1>
        <p><a href="{{$service->id}}/edit" class="my-2">Edit</a></p>

        <div class="d-flex justify-content-center my-3">
            <form action="{{$service->id}}" class="mr-3 p-3" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
            <a href="/company/{{$company->id}}" class="ml-3 p-3"><button class="btn btn-warning ">Cancel</button></a>
        </div>

        <div class="p-2">
            <p><strong>Name:</strong>  {{$service->name}}</p>  
            <p><strong>Description:</strong>  {{$service->description}}</p>  
        </div>
    </div>
@endsection