@extends('layouts.app2')

@section('content')

<div>
    <!-- <div class="card bg-dark text-white text-center" >
        <img src="../storage/{{$sector->image}}" class="card-img" alt="Successful"   style="height: 650px; opacity:60%;">
    </div> -->

    <div class="card-body text-center">
        <div class="p-4">
            <h2 class="card-title ">{{$sector->name}} Companies</h2>
        </div>
    </div>

    <div class="container">
        <!-- <h2>Companies u</h2> -->
                <div class="card my-4 text-center">

                @if(count($companies) > 0)
                    <?php
                        $companycount = count($companies);
                        $i = 1;
                    ?>

                    <div id="companies">
                        <div class="row text-center">
                            @foreach($companies as $company)
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
                    {{ $companies->links() }}
                </div>
            </div>
        </div>

            <!-- FETCHING COMPANIES -->
    </div>
</div>
@endsection