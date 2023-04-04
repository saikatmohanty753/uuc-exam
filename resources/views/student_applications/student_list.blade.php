@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Regular Examination Student List (UG)
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        {{-- <div class="filter_data mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Select year</label>
                                    <select name="" class="form-control" id="batch_year">
                                        <option value="">Select Batch Year</option>
                                        @foreach ($all_batch_year as $item)
                                            <option value="{{ $item->batch_year }}">{{ $item->batch_year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Select Semester</label>
                                    <select name="" id="sem_id" class="form-control" id="">
                                        <option value="">Select Semester</option>
                                        @for ($i = 0; $i <= 8; $i++)
                                            @if ($i % 2 != 0)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Serch By Student Name</label>
                                    <input type="text" id="stu_name" class="form-control">
                                </div>
                               
                            </div>

                        </div> --}}

                        <table class="table table-bordered table-hover table-striped w-100 dataTable12">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Name</th>
                                    {{-- <th>College Name</th> --}}
                                    <th>Badge Year</th>
                                    <th>Department</th>
                                    <th>Course</th>
                                    <th>Semester</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->batch_year}}</td>
                                        <td>{{$item->department->course_for}}</td>
                                        <td>{{$item->course->name}}</td>
                                        <td>{{$item->current_semester}}</td>
                                        <td><a href="{{route('ug_student_view',[$item->id])}}">view</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')
   
@endsection
