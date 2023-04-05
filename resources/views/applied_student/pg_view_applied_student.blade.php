@extends('layouts.app')
@section('content')
    <div class="row">
{{-- {{dd($departmentid)}} --}}
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Preview Applied Student
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="logo-2 none-2" style="text-align: center">
                            <a href="login-25.html">
                                <img src="{{ asset('backend/img/logo.jpg') }}" alt="logo">
                            </a>
                        </div>
                        @if ($appstatus->app_status == 3)
                        <div class="alert alert-danger mt-4" role="alert">
                            <p>Application has been rejected.</p>
                            {{-- <p>Please contact the admissions office for further information.</p> --}}
                        </div>
                        @elseif($appstatus->app_status == 2)
                        <div class="alert alert-success mt-4" role="alert">
                            <p>Application has been Verified.</p>
                            {{-- <p>Please contact the admissions office for further information.</p> --}}
                        </div>
                        @endif
                        <div
                            class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-primary-500">
                            <h6 class="text-light">
                                Applied Student Details
                            </h6>
                        </div>
                        <div class="panel-tag border-left-0">
                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="table-responsive">
                                        <table class="table table-bordered">

                                            <tbody>

                                                <tr>
                                                    {{-- <th style="width: 10%;">Sl. No</th> --}}
                                                    <th>Student Name</th>
                                                    <th>Email</th>
                                                    <th>Department</th>
                                                    <th>College</th>

                                                </tr>
                                                {{-- {{dd($appliedstu)}} --}}
                                                {{-- @foreach ($appliedstu as $key => $item) --}}
                                                <tr>
                                                  

                                                    <td>{{ $appliedstu->name }}</td>
                                                    <td>{{ $appliedstu->email }}</td>
                                                    <td>{{ $appliedstu->department->course_for }}</td>
                                                    <td>{{ $appliedstu->college->name }}</td>
                                                  


                                                </tr>
                                                {{-- @endforeach --}}

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>


                        @if ($appstatus->app_status == 1)
                            <form action="{{ route('uuc-verify-appliedstu') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="hidden" name="department_id" value="{{ $departmentid }}">
                                <div class="row">
                                    <div class="col-sm-12 d-flex">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Remarks</label>
                                                <textarea name="remarks" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <select class="form-control" name="status" id="regStatus">
                                                    <option value="">Select</option>
                                                    <option value="2">Verified</option>
                                                    <option value="3">Rejected</option>
                                                    <option value="4">Backed</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div
                                    class="panel-content border-faded border-top-0 border-left-0 border-right-0 border-bottom-0 d-flex flex-row justify-content-center">

                                    <button class="btn btn-outline-success waves-effect waves-themed ml-4"
                                        type="submit">Submit
                                    </button>
                                </div>
                            </form>
                            {{-- {{dd($appstatus->app_status)}} --}}
                       
                        
                        @else 
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="{{ route('applied_student_list') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        
                        
                        
                    @endif
                    












                    </div>
                </div>
            </div>


        </div>
    </div>


    <!-- // upload image view -->
@endsection

@section('js')
@endsection
