@extends('layouts.app2')

@section('content')
    <div class="container my-5">
        <div class="text-center">
            <h1 class="my-3 p-3">PROFILE EDIT FORM</h1>
            <p class="p-3">Fill the form below to update your profile details.</p>
        </div>
    <div>

    <div class="container my-5">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="/{{$user->id}}" method="POST" class="pb-5" enctype="multipart/form-data">
                    @method('PATCH')
                    @include('profile.form')
            
                    <button type="submit" class="btn btn-primary form-control">UPDATE</button>
                </form>
                <a href="/{{$user->id}}"><button class="btn btn-warning form-control">CANCEL</button></a>
            </div>
        </div>

    </div>


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
 
        var name = $('#name').val();
        var number = $('#number').val();
        var email = $('#email').val();
        var BIOS = $('#BIOS').val();
        var town = $('#town').val();
        var state = $('#state').val();
        var country = $('#country').val();
        $(".error").remove();

        $('#register_form').submit(function(e) {
            e.preventDefault();


            if (name.length < 4 || name == '' || name == 'null') {
                $('#name').after('<span class="error">This field is required and must be at least 4 characters</span>');
            }

            if (email.length < 1 || name == '' || name == 'null') {
                $('#email').after('<span class="error">This field is required</span>');
            } else {
                var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
                var validEmail = regEx.test(email);
                if (!validEmail) {
                    $('#email').after('<span class="error">Enter a valid email</span>');
                }
            }

            if (BIOS.length < 4 || BIOS == '' || BIOS == 'null') {
                $('#BIOS').after('<span class="error">This field is required and must be at least 4 characters</span>');
            }
            else if (BIOS.length > 255){
                $('#BIOS').after('<span class="error">Text is too much. Maximum of 255 characters</span>');
            }

            if (number.length < 4 || number == '' || number == 'null') {
                $('#number').after('<span class="error">This field is required and must be a number of at least 4 characters</span>');
            } 
            else{
                number = number.replace(/[^0-9]/g,'');
                if (number == '' || number == 'null') {
                    $('#number').after('<span class="error">This field is required and must be a number of at least 4 characters</span>');
                }
            }

            if (town.length < 3 || town == '' || town == 'null') {
                $('#town').after('<span class="error">This field is required and must be at least 3 characters</span>');
            }

            if (state.length < 3 || state == '' || state == 'null') {
                $('#state').after('<span class="error">This field is required and must be at least 3 characters</span>');
            }

            if (country.length < 3 || country == '' || country == 'null') {
                $('#country').after('<span class="error">This field is required and must be at least 3 characters</span>');
            }
        });


        $('#name').on('blur', function() {
            if (name.length < 4 || name == '' || name == 'null') {
                console.log('Yaya');
                $('#name').after('<span class="error">This field is required and must be at least 4 characters</span>');
            }
        });

        $('#email').on('blur', function() {
            if (email.length < 1 || name == '' || name == 'null') {
                $('#email').after('<span class="error">This field is required</span>');
            } else {
                var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
                var validEmail = regEx.test(email);
                if (!validEmail) {
                    $('#email').after('<span class="error">Enter a valid email</span>');
                }
            }
        });

        $('#BIOS').on('blur', function() {
            if (BIOS.length < 4 || BIOS == '' || BIOS == 'null') {
                $('#BIOS').after('<span class="error">This field is required and must be at least 4 characters</span>');
            }
            else if (BIOS.length > 500){
                $('#BIOS').after('<span class="error">Text is too much. Maximum of 255 characters</span>');
            }
        });

        $('#number').on('blur', function() {
            if (number.length < 4 || number == '' || number == 'null') {
                $('#number').after('<span class="error">This field is required and must be a number of at least 4 characters</span>');
            } 
            else{
                number = number.replace(/[^0-9]/g,'');
                if (number == '' || number == 'null') {
                    $('#number').after('<span class="error">This field is required and must be a number of at least 4 characters</span>');
                }
            }
        });

        $('#town').on('blur', function() {
            if (town.length < 7 || town == '' || town == 'null') {
                $('#town').after('<span class="error">This field is required and must be at least 3 characters</span>');
            }
        });

        $('#state').on('blur', function() {
            if (state.length < 3 || state == '' || state == 'null') {
                $('#state').after('<span class="error">This field is required and must be at least 3 characters</span>');
            }
        });

        $('#country').on('blur', function() {
            if (country.length < 3 || country == '' || country == 'null') {
                $('#country').after('<span class="error">This field is required and must be at least 3 characters</span>');
            }
        });

    });

</script> -->
@endsection