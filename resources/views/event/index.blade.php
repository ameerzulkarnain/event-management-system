@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
      
            <h2>Events</h2>
            <div class="table-responsive text-center">
                <table class="table table-sm">
                    <thead class="thead-dark ">
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr>
                            <td>{{$event->name}}</td>
                            <td>{{$event->location}}</td>
                            <td>{{$event->date}}</td>
                            <td><a href="event/{{$event->id}}/detail" class="btn btn-success">View Details</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
@endsection