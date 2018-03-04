@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h3>Add A Course</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <form class="form-horizontal" method="POST" action="/course">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('course-name') ? ' has-error' : '' }}">
                                <label for="course-name" class="col-md-4 control-label">Course Name</label>

                                <div class="col-md-6">
                                    <input id="course-name" class="form-control" placeholder="Enter course name" name="name" value="{{ old('course-name') }}" required autofocus>

                                    @if ($errors->has('course-name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('course-name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                                <label for="duration" class="col-md-4 control-label">Course Duration</label>

                                <div class="col-md-6">
                                    <input id="duration" type="duration" class="form-control" name="duration" placeholder="Enter Duration in months" required>

                                    @if ($errors->has('duration'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('fees') ? ' has-error' : '' }}">
                                <label for="fees" class="col-md-4 control-label">Course Fees</label>

                                <div class="col-md-6">
                                    <input id="fees" type="fees" class="form-control" name="fees" placeholder="Enter course fee" required>

                                    @if ($errors->has('fees'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fees') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create Course
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
