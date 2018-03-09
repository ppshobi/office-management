@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h3>Add A Staff</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <create-staff inline-template>
                            <form class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Staff Name</label>

                                <div class="col-md-6">
                                    <input id="name" v-model="name" class="form-control" placeholder="Enter Staff Name" name="name"
                                           required autofocus>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <textarea id="address" v-model="address" type="address" class="form-control" name="address"
                                           placeholder="Enter Address">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-md-4 control-label">Phone No.</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number" v-model="phone" class="form-control" name="phone"
                                           placeholder="Enter Phone Number" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="col-md-4 control-label">Date Of Birth</label>
                                <div class="input-group date col-md-6">
                                    <input name="dob" id="dob" class="form-control bill-date">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="salary" class="col-md-4 control-label">Salary</label>

                                <div class="col-md-6">
                                    <input id="salary" v-model="salary" type="number" class="form-control" name="salary"
                                           placeholder="Enter Salary" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="designation" class="col-md-4 control-label">Designation</label>

                                <div class="col-md-6">
                                    <input id="designation" v-model="designation" type="text" class="form-control" name="designation"
                                           placeholder="Enter Designation" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" @click="submit" class="btn btn-primary">
                                        Create Staff
                                    </button>
                                </div>
                            </div>
                        </form>
                        </create-staff>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
