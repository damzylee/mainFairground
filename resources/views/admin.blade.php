@extends('layouts.app2')

@section('jumbo')
<div class="jumbotron jumbotron-fluid p-0">
    <img src="images/user.jpeg" alt="dashboard image" class="card-img w-100" style="height: 600px; opacity:70%;">
    <div class="container card-img-overlay text-center text-white" style="margin-top: 200px;">
        <h1 class="display-4" style="font-size: 500%; font-weight: bold;">FAIRGROUND</h1>
        <p class="lead mt-5" style="font-size: 150%;">“Nature fits all her children with something to do, he who would write and can't write, can surely review.” <b>―</b><i> James Russell Lowell</i></p>
    </div>
</div>
@endsection
@section('content')

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container">
    <div class="row">

        <div class="col-4">
            <div class="card my-4 text-center">
                <h3 class="card-title p-3">Profile</h3>
                <div class="row p-2">
                    <div class="col-5 text-center p-4">
                        <img src="../storage/{{ Auth::user()->image }}" class="rounded-circle" alt="profile picture"  style="width: inherit;">
                    </div>
                    <div class="col-7 text-center p-2">
                        <h4>Name</h4>
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                </div>
            </div>

            <div class="card my-4">
                <div class="row p-2">
                    <div class="col-6 text-center p-2">
                        <a href="/{{ Auth::user()->id }}"><button class="btn btn-primary">Edit profile</button></a>
                    </div>
                    <div class="col-6 text-center p-2">
                        <a href="/subscription/"><button class="btn btn-primary">Become a Host</button></a>
                    </div>
                </div>

                <div class="text-center my-2">
                    <a href="/review/"><button class="btn btn-primary p-2">Write review</button></a>
                </div>
            </div>
        </div>

        <div class="col-8">
        <h2>Companies</h2>
            <div class="card my-4 text-center">

            @if(count($companiess) > 0)
                <?php
                    $companycount = count($companiess);
                    $i = 1;
                ?>

                <div id="companiess">
                    <div class="row text-center">
                        @foreach($companiess as $company)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                        @if($i === $companycount)
                                <a href="company/{{$company->id}}">
                                    <img src="../storage/{{ $company->image }}" alt="{{$company->name}}" class="img-thumbnail">
                                </a>
                                <br>
                                <a href="company/{{$company->id}}">
                                    <span>{{$company->name}}</span> 
                                </a>
                        @else
                           
                                <a href="company/{{$company->id}}">
                                    <img src="../storage/{{ $company->image }}" alt="{{$company->name}}" class="img-thumbnail">
                                </a>
                                <br>
                                <a href="company/{{$company->id}}">
                                    <span>{{$company->name}}</span> 
                                </a>
                           
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
                <p>No company to display</p>
                @endif


            </div>
            <div class="d-flex justify-content-center">
                {{ $companiess->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
