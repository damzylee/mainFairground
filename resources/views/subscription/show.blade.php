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
            <h1>Details of {{$subscription->name}}</h1>
            <p><a href="{{$subscription->id}}/edit">Edit</a></p>

            <form action="{{$subscription->id}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <div>
        <p><strong>Subscription type:</strong>  {{$subscription->type}}</p>  
        <p><strong>Amount:</strong>  {{$subscription->amount}}</p>  
    </div>
</body>
</html>