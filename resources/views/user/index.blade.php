@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
      
            <h2>Users</h2>
            <div class="table-responsive text-center">
                @if (count($users) > 0)
        
                <table class="table table-sm">
                    <thead class="thead-dark ">
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Events</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                            <td>{{ $user->company->name}}</td>
                            <td>
                                @foreach ($user->eventParticipant as $eventParticipant)
                                    <table class="table table-borderless text-center" >
                                        <tr>
                                            <td><a href="event/{{$eventParticipant->event->id}}/detail">{{$eventParticipant->event->name}}</a></td>
                                            <td><form action="{{ url('/user/event/'.$eventParticipant->id) }}" method="POST" >
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                
                                                <button style="float: right;" type="submit" id="delete-task-{{ $eventParticipant->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i> x
                                                </button>
                                            </form></td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                            <td><a href="/user/{{$user->id}}/edit" class="btn btn-success">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>No User found</p>
                @endif
            </div>
        </div>
        <a href="/user/create" class="btn btn-primary">Add User</a>
      </div>
@endsection