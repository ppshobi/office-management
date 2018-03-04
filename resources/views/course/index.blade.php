@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h4>Manage Courses</h4>
                            </div>
                            <div class="peer">
                                <h5 class="text-right">{{"Total " . $courses->count() ." Courses" }}</h5>
                            </div>
                        </div>
                    </div>
                    <course-index inline-template>
                        <div class="table-responsive p-20">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class=" bdwT-0">Course ID</th>
                                <th class=" bdwT-0">Name</th>
                                <th class=" bdwT-0">Duration</th>
                                <th class=" bdwT-0">Fee</th>
                                <th class=" bdwT-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($courses as $course)
                                <tr id="">
                                    <td class="fw-600">{{ $course->id }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->duration }} Months</td>
                                    <td>
                                        <span class="text-success">&#8377; {{ $course->price }}</span>
                                    </td>
                                    <td>
                                        <action :id="{{ $course->id }}"
                                                :index="{{$course->id}}"
                                                :url="'course'"
                                                :message="'If you delete a course, The associated students and their data will be deleted, You can\'t undo this Operation'"
                                                @removed="remove(index)"></action>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"> No Courses Available</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                    </course-index>
                </div>
            </div>
        </div>
    </div>
@endsection
