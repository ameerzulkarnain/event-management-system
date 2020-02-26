@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h2 class="text-center">Company Detail</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">{{$company->name}}</h5>
                        @foreach ($company->user as $user)
                        <ul>
                            <li>{{$user->first_name}} {{$user->last_name}}</td>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
      </div>
@endsection