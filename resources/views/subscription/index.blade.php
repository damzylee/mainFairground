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
        <h1>List of subscriptions</h1>
        <a href="/subscription/create"><button class="btn btn-primary">create</button></a>
    </div>

        @if(count($subscriptions) > 0)
        <?php
            $subscriptioncount = count($subscriptions);
            $i = 1;
        ?>

        <div id="subscriptions">
            <div class="row text-center">
                @foreach($subscriptions as $subscription)
                @if($i == $subscriptioncount)
                    <div class="col-4">
                        <a href="subscription/{{$subscription->id}}">
                            <h3>{{$subscription->type}}</h3> 
                        </a>
                    </div>
                @else
                    <div class="col-4">
                        <a href="subscription/{{$subscription->id}}">
                            <h3>{{$subscription->type}}</h3> 
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
        <p>No subscription to display</p>
        @endif
    
</body>
</html>