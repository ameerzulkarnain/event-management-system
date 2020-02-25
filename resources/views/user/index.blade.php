@extends('layouts.app')

@section('content')
    {{-- <h2>Users</h2>
    {{ count($users) }}
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->companies->name }}</td>
    </tr>
    @endforeach --}}

    <div class="container">
        <div class="row justify-content-center">
      
            <h2>Users</h2>
            <div class="table-responsive">
                @if (count($users) > 0)
        
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                            <td>{{ $user->company->name}}</td>
                            <td><a href="/user/{{$user->id}}/edit" class="btn btn-default">Edit</a></td>
                            {{-- <td>Edit</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>No User found</p>
                @endif
            </div>
        </div>
        <a href="/user/create" class="btn btn-success">Add User</a>
      </div>
@endsection