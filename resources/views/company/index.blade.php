@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
      
            <h2>Companies</h2>
            <div class="table-responsive text-center">
                <table class="table table-sm">
                    <thead class="thead-dark ">
                        <tr>
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                        <tr>
                            <td>{{$company->name}}</td>
                            <td><a href="company/{{$company->id}}/detail" class="btn btn-success">View Details</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
@endsection