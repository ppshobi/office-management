@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add a Student</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/student">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Student Name</label>

                                <div class="col-md-6">
                                    <input id="name" class="form-control" placeholder="Enter Student Name" name="name"
                                           value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('guardians-name') ? ' has-error' : '' }}">
                                <label for="guardians-name" class="col-md-4 control-label">Guardians Name</label>

                                <div class="col-md-6">
                                    <input id="guardians-name" class="form-control" placeholder="Enter Guardians Name" name="guardians_name"
                                           value="{{ old('guardians_name') }}" required autofocus>

                                    @if ($errors->has('guardians-name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('guardians-name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <textarea id="address" type="address" class="form-control" name="address"
                                           placeholder="Enter Address">
                                    </textarea>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Phone No.</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number" class="form-control" name="phone"
                                           placeholder="Enter Phone Number" required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                <label for="dob" class="col-md-4 control-label">Date Of Birth</label>

                                <div class="col-md-6" id="datetimepicker1">
                                    <div class="input-group date">
                                        <input type="date" name="dob" class="form-control" value="01/01/2000">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>

                                    @if ($errors->has('dob'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
                                <label for="course" class="col-md-4 control-label">Course</label>

                                <div class="col-md-6">
                                    <!-- Single button -->
                                    <select class="form-control" name="course">
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('course'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fees') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create Student
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
