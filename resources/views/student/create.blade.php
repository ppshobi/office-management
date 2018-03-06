@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h3>Add A Student</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <create-student>

                        </create-student>
                        <form class="form-horizontal" method="POST" action="/student">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Student Name</label>

                                <div class="col-md-6">
                                    <input id="name" class="form-control" placeholder="Enter Student Name" name="name"
                                           required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="guardians-name" class="col-md-4 control-label">Guardians Name</label>

                                <div class="col-md-6">
                                    <input id="guardians-name" class="form-control" placeholder="Enter Guardians Name" name="guardians_name"
                                           required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <textarea id="address" type="address" class="form-control" name="address"
                                           placeholder="Enter Address">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-md-4 control-label">Phone No.</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number" class="form-control" name="phone"
                                           placeholder="Enter Phone Number" required>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="col-md-4 control-label">Date Of Birth</label>
                                    <div class="input-group date col-md-6">
                                        <input name="dob" type="date" class="form-control">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="course" class="col-md-4 control-label">Course</label>

                                <div class="col-md-6">
                                    <!-- Single button -->
                                    <select class="form-control" name="course">
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
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
