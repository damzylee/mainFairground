<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>List of reviews</h1>
        <a href="/review/create">create</a>
    </div>

        @if(count($reviews) > 0)
        <?php
            $reviewcount = count($reviews);
            $i = 1;
        ?>

        <div id="reviews">
            <div class="row text-center">
                @foreach($reviews as $review)
                @if($i == $reviewcount)
                    <div class="col-4">
                        <a href="review/{{$review->id}}">
                            <img src="asset{{'storage/' . $review->image}}" alt="image of the selected review" class="img-thumbnail">
                        </a>
                        <br>
                        <a href="review/{{$review->id}}">
                            <h3>{{$review->review}}</h3> 
                        </a>
                    </div>
                @else
                    <div class="col-4">
                        <a href="review/{{$review->id}}">
                            <img src="asset{{'storage/' . $review->image}}" alt="image of the selected review" class="img-thumbnail">
                        </a>
                        <br>
                        <a href="review/{{$review->id}}">
                            <h3>{{$review->review}}</h3> 
                        </a>
                    </div>
                @endif

                @if($i%3 == 0)

                </div></div><div class="row text-center">

                @else

                </div>

                @endif

                <?php 
                    $i++;
                ?>

                @endforeach
                
            </div>
        </div>
        @else
        <p>No review to display</p>
        @endif
    
</body>
</html>