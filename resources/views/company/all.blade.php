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
    


        

        <div class="container">
                        <h2 class="text-center">Bootstrap 4 User Rating Form / Comment Form</h2>
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                        <p class="text-secondary text-center">15 Minutes Ago</p>
                                    </div>
                                    <div class="col-md-10">
                                        <p>
                                            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                                    </p>
                                    <div class="clearfix"></div>
                                        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        <p>
                                            <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
                                            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                                    </p>
                                    </div>
                                </div>
                                    <div class="card card-inner">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                                    <p class="text-secondary text-center">15 Minutes Ago</p>
                                                </div>
                                                <div class="col-md-10">
                                                    <p><a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a></p>
                                                    <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                    <p>
                                                        <a class="float-right btn btn-outline-primary ml-2">  <i class="fa fa-reply"></i> Reply</a>
                                                        <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                                                </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
</body>
</html>