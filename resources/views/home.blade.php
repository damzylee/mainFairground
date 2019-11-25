@if(Auth::user()->is_admin == 0)
@extends('layouts.app2')

@if(Auth::user()->type == 'user')
    @section('jumbo')
    <div class="jumbotron jumbotron-fluid p-0" style="background: black;">
        <img src="images/user.jpeg" alt="dashboard image" class="card-img w-100" style="height: 690px; opacity:70%;">
        <div class="container card-img-overlay text-center text-white" style="margin-top: 200px;">
            <h1 class="display-4" style="font-size: 500%; font-weight: bold;">FAIRGROUND</h1>
            <p class="lead mt-5" style="font-size: 150%;">“Nature fits all her children with something to do, he who would write and can't write, can surely review.” <b>―</b><i> James Russell Lowell</i></p>
        </div>
    </div>
    @endsection
@else
    @section('jumbo')
    <div class="jumbotron jumbotron-fluid p-0" style="background: black;">
        <img src="images/company.jpeg" alt="dashboard image" class="card-img w-100" style="height: 690px; opacity:70%;">
        <div class="container card-img-overlay text-center text-white" style="margin-top: 200px;">
            <h1 class="display-4" style="font-size: 500%; font-weight: bold;">FAIRGROUND</h1>
            <p class="lead mt-5" style="font-size: 150%;">“Nature fits all her children with something to do, he who would write and can't write, can surely review.” <b>―</b><i> James Russell Lowell</i></p>
        </div>
    </div>
    @endsection
@endif

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

<div class="container mb-5">
    <div class="row">

        <div class="col-md-4 col-sm-12 my-5">
            <div class="card my-4 text-center">
                <!-- <h3 class="card-title p-3">Profile</h3> -->
                <div class="row p-2">
                    <div class="col-6 text-center p-4">
                        <img src="../storage/{{ Auth::user()->image }}" class="rounded-circle" alt="profile picture"  style="width: inherit; height:200px;">
                    </div>
                    <div class="col-6 text-center py-5">
                        <h4>{{ Auth::user()->name }}</h4>
                    </div>
                </div>
            </div>

            <div class="card my-4">
                <div class="row p-2">
                    <div class="col-6 text-center p-2">
                        <a href="/{{ Auth::user()->id }}"><button class="btn btn-outline-secondary p-2">View profile</button></a>
                    </div>
                    <div class="col-6 text-center p-2">
                        <a href="/review/create"><button class="btn btn-outline-info p-2">Write review</button></a>
                    </div>
                </div>
                
                @if(Auth::user()->subscription_id == null)
                <div class="text-center my-2">
                    <a href="/subscribe/create"><button class="btn btn-outline-dark p-2">Become a Host</button></a>
                </div>
                @else
                <div class="text-center my-2">
                    <a href="/company/create"><button class="btn btn-outline-dark p-2">Create a Company</button></a>
                </div>
                @endif
            </div>
        </div>

        <div class="col-md-8 col-sm-12">

        <h2 class="my-5">Sectors</h2>
            <div class="card my-4 text-center">

            @if(count($sectors) > 0)
                <?php
                    $sectorcount = count($sectors);
                    $i = 1;
                ?>

                <div id="sectors">
                    <div class="row text-center">
                        @foreach($sectors as $sector)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                        @if($i === $sectorcount)
                                <a href="sector/{{$sector->id}}">
                                    <img src="../storage/{{ $sector->image }}" alt="{{$sector->name}}" class="img-thumbnail" style="width:100%; height:85%">
                                </a>
                                <br>
                                <a href="sector/{{$sector->id}}">
                                    <span>{{$sector->name}}</span> 
                                </a>
                        @else
                           
                                <a href="sector/{{$sector->id}}">
                                    <img src="../storage/{{ $sector->image }}" alt="{{$sector->name}}" class="img-thumbnail" style="width:100%; height:85%">
                                </a>
                                <br>
                                <a href="sector/{{$sector->id}}">
                                    <span>{{$sector->name}}</span> 
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
                <p>No sector to display</p>
                @endif


            </div>
            <!-- <div class="d-flex justify-content-center">
                {{ $sectors->links() }}
            </div> -->


            <h2 class="my-5">Companies</h2>
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
                                    <img src="../storage/{{ $company->image }}" alt="{{$company->name}}" class="img-thumbnail" style="width:100%; height:85%">
                                </a>
                                <br>
                                <a href="company/{{$company->id}}">
                                    <span>{{$company->name}}</span> 
                                </a>
                        @else
                           
                                <a href="company/{{$company->id}}">
                                    <img src="../storage/{{ $company->image }}" alt="{{$company->name}}" class="img-thumbnail" style="width:100%; height:85%">
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

@else 
  <script>window.location = "/admin";</script>
@endif