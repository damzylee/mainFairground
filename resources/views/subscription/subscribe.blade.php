@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="text-center">
        <h1 class="my-3 p-3">BECOME A HOST</h1>
        <p class="my-3 p-3">Fairground help you get to you your company's market in no time. To become a host and register your company, subscribe to a plan. </p>
    </div>

        @if(count($subscriptions) > 0)
        <?php
            $subscriptioncount = count($subscriptions);
            $i = 1;
        ?>

        <div id="subscriptions" class="container my-5">
            <div class="card-group text-center">
                @foreach($subscriptions as $subscription)
                @if($i == $subscriptioncount)
                    <div class="card text-center">
                            
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="../storage/uploads/sub.png" class="card-img h-100" alt="subscribe">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$subscription->type}}</h5>
                                <p class="card-text">{{$subscription->type}} subscription for 1 month cost {{$subscription->amount}} only</p>
                                <form action="/subscribe/{{$subscription->id}}" method="POST">
                                    <button class="btn btn-primary" type="submit">subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @else
                    <div class="card text-center">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="../storage/uploads/sub.png" class="card-img h-100" alt="subscribe">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$subscription->type}}</h5>
                                <p class="card-text">{{$subscription->type}} subscription for 1 month cost {{$subscription->amount}} only</p>
                                
                                <a href="/subscribe/{{$subscription->id}}"><button class="btn btn-primary" type="submit">subscribe</button></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($i%3 == 0)

                </div></div><div class="card-group text-center">

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
    
@endsection