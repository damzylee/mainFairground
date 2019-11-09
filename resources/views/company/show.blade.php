<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-12">
            <h1>Details of {{$company->name}}</h1>
            <p><a href="{{$company->id}}/edit">Edit</a></p>

            <form action="{{$company->id}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <div>
        <p><strong>Name:</strong>  {{$company->name}}</p>  
        <p><strong>Email:</strong>  {{$company->email}}</p>  
        <p><strong>Number:</strong>  {{$company->number}}</p>  
        <p><strong>Type:</strong>  {{$company->type}}</p> 
        <p><strong>Country:</strong>  {{$company->country}}</p> 
        <p><strong>State:</strong>  {{$company->state}}</p> 
        <p><strong>Address:</strong>  {{$company->address}}</p> 
        <p><strong>Profile:</strong>  {{$company->profile}}</p> 
        <p><strong>Year of Establishment:</strong>  {{$company->YOE}}</p> 
    </div>

    @if($company->image)
        <div class="row">
            <div class="col-12">
                <img src="{{'../storage/' . $company->image}}" alt="{{$company->name}}" class="img-thumbnail">
            </div>
        </div>
    @endif
</body>
</html>