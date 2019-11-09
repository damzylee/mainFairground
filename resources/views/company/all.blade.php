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
        <h1>List of Companies</h1>
        <a href="/company/create">create</a>
    </div>

        @if(count($companies) > 0)
        <?php
            $companycount = count($companies);
            $i = 1;
        ?>

        <div id="companies">
            <div class="row text-center">
                @foreach($companies as $company)
                @if($i == $companycount)
                    <div class="col-4">
                        <a href="company/{{$company->id}}">
                            <img src="asset{{'storage/' . $company->image}}" alt="{{$company->name}}" class="img-thumbnail">
                        </a>
                        <br>
                        <a href="company/{{$company->id}}">
                            <h3>{{$company->name}}</h3> 
                        </a>
                    </div>
                @else
                    <div class="col-4">
                        <a href="company/{{$company->id}}">
                            <img src="asset{{'storage/' . $company->image}}" alt="{{$company->name}}" class="img-thumbnail">
                        </a>
                        <br>
                        <a href="company/{{$company->id}}">
                            <h3>{{$company->name}}</h3> 
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
        <p>No company to display</p>
        @endif
    
</body>
</html>