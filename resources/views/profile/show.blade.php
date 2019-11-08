@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="row">

    <div class="col-4">
        <div class="card" style="width: 18rem;">
                @if($user->image)
                <img src="{{'../storage/' . $user->image}}" alt="{{$user->name}}" class="card-img-top rounded-circle p-3" style="width: inherit;">
                @endif
            <div class="card-body text-center">
                <h5 class="card-title">User profile</h5>
                <p class="card-text">{{$user->BIOS}}</p>
                <div class="d-flex flex-row justify-content-around">
                    <a href="{{$user->id}}/edit" class="btn btn-primary" style="height:fit-content !important;">Edit</a>
                    <form action="{{$user->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Deactivate Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table  class="table-striped table-hover table-light col-8 text-center">
        <thead>
            <tr>
                <th class="p-3" colspan="2">
                    <h1>{{$user->name}} profile page</h1>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="p-3"> Name</th>
                <td class="p-3">{{$user->name}}</td>
            </tr>
            <tr>
                <th class="p-3">Email</th>
                <td class="p-3">{{$user->email}}</td>
            </tr>
            <tr>
                <th class="p-3">Number</th>
                <td class="p-3">{{$user->number}}</td>
            </tr>
            <tr>
                <th class="p-3">Country</th>
                <td class="p-3">{{$user->country}}</td>
            </tr>
            <tr>
                <th class="p-3">State</th>
                <td class="p-3">{{$user->state}}</td>
            </tr>
            <tr>
                <th class="p-3">Town</th>
                <td class="p-3">{{$user->town}}</td>
            </tr>

            <tr>
                <th class="p-3">Date of birth</th>
                <td class="p-3">{{$user->DOB}}</td>
            </tr>
        </tbody>
    </table>

    </div>
</div>
@endsection