<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../fontawesome/css/fontawesome.min">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))

                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
      
                    
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>

                <div class="top-left links">
                    @auth
                        <!-- <a href="{{ url('/home') }}">Home</a> -->
                    @else
                        <a href="{{ route('login') }}"><span>Fair</span><span id="gold">Ground</span></a>

                        @if (Route::has('register'))
                            <!-- <a href="{{ route('register') }}">Register</a> -->
                        @endif
                    @endauth
                </div>
            @endif
            <form action="{{ route('search') }}" method="POST" class="form-inline my-2 my-lg-0">
                @csrf
                <input type="text" name="query" class="form-control mr-3" />
                <input type="submit" class="btn btn-outline-primary my-2 my-sm-0" value="Search" />
            </form>
        </div>

            <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-ride="carousel" style="background:black;">
                <div class="overlape">
                    <h1 class="text-center overlapetext">FAIRGROUND</h1>
                    <h5 class="text-center overlapetextsmall mt-5">Want direct interaction with companies?</h5>
                    <p class="text-center overlapetextsmall mt-3">Use FairGround.</p>
                </div>
            
                <div class="carousel-inner">

                    <div class="carousel-item active" data-interval="2000">
                        <img src="../images/caro1.jpeg" class="d-block w-100 welcome" alt="...">
                    </div>
                    
                    <div class="carousel-item" data-interval="2000">
                        <img src="../images/caro3.jpeg" class="d-block w-100 welcome" alt="...">
                    </div>

                    <div class="carousel-item">
                        <img src="../images/caro2.jpeg" class="d-block  w-100 welcome" alt="...">
                    </div>
                    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


            <!-- FETCHING COMPANIES -->

        <div class="container text-center my-3">


            <h2>Sectors</h2>
            <div class="card my-4 text-center">

            @if(count($sectors) > 0)
                <?php
                    $sectorcount = count($sectors);
                    $i = 1;
                ?>

                <div id="sectors">
                    <div class="row text-center">
                        @foreach($sectors as $sector)
                        <div class="col-md-3 col-sm-2 col-xs-1">
                        @if($i === $sectorcount)
                                <a href="/sector/{{$sector->id}}">
                                    <img src="../storage/{{ $sector->image }}" alt="{{$sector->name}}" class="img-thumbnail" style="width:100%; height:85%">
                                </a>
                                <br>
                                <a href="/sector/{{$sector->id}}">
                                    <span>{{$sector->name}}</span> 
                                </a>
                            
                        @else
                           
                                <a href="/sector/{{$sector->id}}">
                                    <img src="../storage/{{ $sector->image }}" alt="{{$sector->name}}" class="img-thumbnail" style="width:100%; height:85%">
                                </a>
                                <br>
                                <a href="/sector/{{$sector->id}}">
                                    <span>{{$sector->name}}</span> 
                                </a>
                           
                        @endif

                        @if($i%4 == 0)

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
                        <div class="col-md-3 col-sm-2 col-xs-1">
                        @if($i === $companycount)
                                <a href="/company/{{$company->id}}">
                                    <img src="../storage/{{ $company->image }}" alt="{{$company->name}}" class="img-thumbnail" style="width:100%; height:85%">
                                </a>
                                <br>
                                <a href="/company/{{$company->id}}">
                                    <span>{{$company->name}}</span> 
                                </a>
                            
                        @else
                           
                                <a href="/company/{{$company->id}}">
                                    <img src="../storage/{{ $company->image }}" alt="{{$company->name}}" class="img-thumbnail" style="width:100%; height:85%">
                                </a>
                                <br>
                                <a href="/company/{{$company->id}}">
                                    <span>{{$company->name}}</span> 
                                </a>
                           
                        @endif

                        @if($i%4 == 0)

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

            <!-- FETCHING COMPANIES -->

        
        <!-- Contact us  -->

        <div class="imageOn">
            <div class="jumbotron jumbotron-fluid jumbosco">
                <div class="container jack" style="opacity:0.9">
                    <h1 class="display-4">CONTACT US</h1>
                    <form action="/contact" method="POST" class="">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" >
                            <div class="text-danger"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" class="form-control">
                            <div class="text-danger"></div>
                        </div>

                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea name="message" id="message"  class="form-control" cols="60" rows="10"></textarea>
                            <div class="text-danger">{{$errors->first('message')}}</div>
                        </div>
                        <input type="submit" value="SEND MAIL"  class="btn btn-primary form-control">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <!-- Contact us  -->




       <!-- Footer -->
       <footer class="pt-4 w-100" style="bottom:0%;">

            <!-- Footer Links -->
            <div class="container text-center text-md-left">

            <!-- Footer links -->
            <div class="row text-center text-md-left mt-3 pb-3">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">FAIRGROUND</h6>
                    <p>Fairground connects you to companies and aim at making your opinion to count.
                    </p>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">About</h6>
                    <p>
                        <a href="#!">Contact</a>
                    </p>
                    <p>
                        <a href="#!">Community</a>
                    </p>
                    <p>
                        <a href="#!">Log in</a>
                    </p>
                    <p>
                        <a href="#!">Register</a>
                    </p>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
                    <p>
                        <a href="#!">Your Account</a>
                    </p>
                    <p>
                        <a href="#!">Become an Affiliate</a>
                    </p>
                    <p>
                        <a href="#!">Help</a>
                    </p>
                </div>

                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                <p>
                    <i class="fa fa-home mr-3"></i> Gbagada, Lagos, Nigeria</p>
                <p>
                    <i class="fa fa-envelope mr-3"></i> fairground@gmail.com</p>
                <p>
                    <i class="fa fa-phone mr-3"></i>+2348 137 896 883</p>
                <p>
                    <i class="fa fa-print mr-3"></i> + 01 549 678 89</p>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Footer links -->

            <hr>

            <!-- Grid row -->
            <div class="row d-flex align-items-center">

                <!-- Grid column -->
                <div class="col-md-7 col-lg-8">

                <!--Copyright-->
                <p class="text-center text-md-left">© 2018 Copyright:
                    <a href="/">
                    <strong>fairground.test</strong>
                    </a>
                </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-5 col-lg-4 ml-lg-0">

                <!-- Social buttons -->
                <div class="text-center text-md-right">
                    <ul class="list-unstyled list-inline">
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                        <i class="fa fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                        <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                        <i class="fa fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                        <i class="fa fa-linkedin-in"></i>
                        </a>
                    </li>
                    </ul>
                </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

            </div>
            <!-- Footer Links -->

        </footer>
        <!-- Footer -->


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
