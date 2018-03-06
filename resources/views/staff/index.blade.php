@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h3><i class="fa fa-graduation-cap"></i>Manage Staff</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <staff-index inline-template>
                            <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Staff ID</th>
                                <th>Staff Name</th>
                                <th>Designation</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Salary</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($staffs as $staff)
                                <tr id="staff-{{$staff->id}}">
                                    <td>{{ $staff->id }}</td>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{ $staff->designation }}</td>
                                    <td>{{ $staff->address }}</td>
                                    <td>{{ $staff->phone_number }}</td>
                                    <td>{{ $staff->salary }}</td>
                                    <td>
                                        <action :id="{{ $staff->id }}"
                                                :index="{{$staff->id}}"
                                                :url="'staff'"
                                                :message="'If you delete a staff, The associated transactions and other data will be deleted, You can\'t undo this Operation'"
                                                @removed="remove({{$staff->id}})"></action>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </staff-index>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
