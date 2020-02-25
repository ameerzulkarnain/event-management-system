@extends('layouts.app')

@section('content')
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Edit User</h3>
                </div>
                <div class="card-body">
                    <!-- Display Validation Errors -->
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/'.$user->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} row">
                        <label for="first_name" class="col-sm-3 form-control-label">First Name</label>

                        <div class="col-sm-9">
                            <input id="first_name" type="text" class="form-control" name="first_name"
                                value="{{ old('first_name') }}"
                                required autofocus>

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} row">
                        <label for="last_name" class="col-sm-3 form-control-label">Last Name</label>

                        <div class="col-sm-9">
                            <input id="last_name" type="text" class="form-control" name="last_name"
                                value="{{ old('last_name') }}"
                                required autofocus>

                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }} row">
                        <label for="company_id" class="col-sm-3 form-control-label">Company</label>

                        <div class="col-sm-9">
                            <select id="company" class="form-control" name="company_id" required>
                                <option disabled selected value> -- Select a company -- </option>
                                @foreach ($companies as $company)
                                    <option value={{$company->id}}> {{$company->name}} </option>
                                @endforeach
                            </select>

                            @if ($errors->has('company_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-3">Events</div>
                    <div class="col-sm-9 form-check">
                        @foreach ($events as $event)
                            <input class="form-check-input" type="checkbox" name="event_id[]" value="{{$event->id}}" id="{{$event->id}}">
                            <label class="form-check-label" for="event_id[]">
                                {{$event->name}}
                            </label>
                            <br>
                        @endforeach
                    </div>
                    <div class="line"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>

                        <a class="btn btn-link" href="{{ url('/user') }}">
                            Cancel
                        </a>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection