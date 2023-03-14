@extends('layouts.app')
@section('content')
    <style>
        .box-body {
            padding: 30px;
        }
    </style>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form method="POST" action="{{route('fees.store')}}" id="myForm">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Fee Name" name="name">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Amount<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Amount" name="amount">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success mt-4">Add Fee</button>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"
                                    style="margin-right: 8px;">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Submit</button>
                            </div>

                        </div> --}}

                    </div>

                </form>
            </div>

        </div>
    </div>
    <div class="row mt-5">

        <div class="col-xl-12">
            <div class="card">



                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class="text-fade table table-bordered display no-footer datatable table-responsive-lg dt-table">
                            <thead>
                                <tr class="text-dark">
                                    <th style="width: 10%;">Sl. No</th>
                                    <th style="width: 50%;">Fee Name</th>
                                    <th style="width: 50%;">Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fees as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->amount }}</td>
                                        <td>
                                    <form action="{{route('fees.destroy',[$value->id])}}" method="post">
                                        @csrf

                                        {{-- <a class="btn btn-info" href=""><i class="fa-solid fa-eye"></i></a> --}}

                                        <a class="btn btn-primary" href="{{route('fees.edit',[$value->id])}}"
                                            ><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
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
    {{-- @foreach ($course as $key => $val)
        <div class="modal fade" id="exampleModal{{ $val->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ url('course', $val->id) }}" method="post">
                        {{ method_field('PUT') }}
                        @csrf
                         <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label class="form-label">Course <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Course" name="course"
                                            value="{{ $val->name }}">

                                    </div>
                                </div>
                            </div>
                         </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach --}}
@endsection
