@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="text-center">
        <h1 class="my-3 p-3">CREATE A COMPANY</h1>
        <p class="my-3 p-3">Please fill the form below to create a company</p>
    </div>
<div>

<div class="container">
    <form action="/company" method="POST" class="pb-5" enctype="multipart/form-data">
        @include('company.form')

        <input type="submit" class="btn btn-primary form-control" value="REGISTER COMPANY"/>
    </form>
</div>


<!-- <script>
    $(document).ready(function() {
 
        $('#register_form').submit(function(e) {
            e.preventDefault();
            var name = $('#name').val();
            var number = $('#number').val();
            var email = $('#email').val();
            var profile = $('#profile').val();
            var address = $('#address').val();
            var state = $('#state').val();
            var country = $('#country').val();

            $(".error").remove();

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

            if (profile.length < 4 || profile == '' || profile == 'null') {
                $('#profile').after('<span class="error">This field is required and must be at least 4 characters</span>');
            }
            else if (profile.length > 500){
                $('#profile').after('<span class="error">Text is too much. Maximum of 500 characters</span>');
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

            if (address.length < 7 || address == '' || address == 'null') {
                $('#address').after('<span class="error">This field is required and must be at least 7 characters</span>');
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

        $('#profile').on('blur', function() {
            if (profile.length < 4 || profile == '' || profile == 'null') {
                $('#profile').after('<span class="error">This field is required and must be at least 4 characters</span>');
            }
            else if (profile.length > 500){
                $('#profile').after('<span class="error">Text is too much. Maximum of 500 characters</span>');
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

        $('#address').on('blur', function() {
            if (address.length < 7 || address == '' || address == 'null') {
                $('#address').after('<span class="error">This field is required and must be at least 7 characters</span>');
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

// </script> -->
@endsection