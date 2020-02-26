@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h2 class="text-center">Event Detail</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">{{$event->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$event->date}}</h6>
                        <p class="card-text">{{$event->location}}</p>
                        @foreach ($event->eventParticipant as $eventParticipant)
                        <ul>
                            <li>{{$eventParticipant->user->first_name}} {{$eventParticipant->user->last_name}}</td>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
      </div>
@endsection