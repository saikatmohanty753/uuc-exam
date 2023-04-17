@extends('layouts.app')
@section('content')
    <div class="row mt-5">

        <div class="col-xl-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Notice List</h5>
                    <div class="card-actions float-right">
                        @if (Auth::user()->role_id != 12)
                            @can('notice-create')
                                <a class="btn btn-primary btn-sm" href="{{ url('/add-notices') }}">
                                    <i class="fa-solid fa-plus"></i> Create Notice</a>
                            @endcan
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class="text-fade table table-bordered display no-footer datatable table-responsive-lg dt-table">
                            <thead>
                                <tr class="text-dark">
                                    <th style="width: 10%;">Sl. No</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    {{-- <th>Course</th> --}}
                                    {{-- <th>Semester</th> --}}
                                    <th>Department</th>
                                    <th>College</th>
                                    <th>Action</th>
                                    <th>IsVerified</th>

                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($ugapplied->concat($pgapplied) as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->dept }}</td>
                                        <td>{{ $item->clgname }}</td>
                                        <td><a href="{{ url('applied_student_view/' . $item->id) }}"
                                                class="btn  waves-effect waves-themed btn-outline-primary">
                                                <i class="fa-solid fa-eye"></i></a></td>
                                        <td>
                                            @if ($item->status == 2)
                                                <p class="badge badge-success">Approved</p>
                                            @elseif($item->status == 3)
                                                <p class="badge badge-danger">Rejected</p>
                                            @else
                                                <p class="badge badge-warning">Pending</p>
                                            @endif
                                        </td>


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
