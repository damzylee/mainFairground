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
            <h1>Details of review</h1>
            <p><a href="{{$review->id}}/edit">Edit</a></p>

            <form action="{{$review->id}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    @if($review->image)
        <div class="row">
            <div class="col-12">
                <img src="asset{{'storage/' . $review->image}}" alt="image of the selected review" class="img-thumbnail">
            </div>
        </div>
    @endif

    <div>
        <p><strong>Review:</strong>  {{$review->review}}</p>  
    </div>

</body>
</html>