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
                @if (count($errors) > 0)

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif
                <form method="POST" action="{{route('notice-type.store')}}" id="ExamNotice">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Notice Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Notice Name" name="examnotice">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                
                                <button type="submit" class="btn btn-info pull-right">Submit</button>
                            </div>

                        </div>

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
                                    <th style="width: 50%;">Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($examnotice as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->notice_name }}</td>
                                        <td>
                                                <a class="btn btn-primary" href="#" 
                                                data-toggle="modal" data-target="#exampleModal{{ $value->id }}"><i class="fa fa-edit"></i></a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['notice-type.destroy', $value->id], 'style' => 'display:inline']) !!}
                                                {!! Form::button('<i class="fa fa-trash"></i>', [
                                                    'type' => 'submit',
                                                    'class' => 'waves-effect waves-light  btn  btn-danger',
                                                    'id' => 'deleteThis',
                                                ]) !!}
                                                {!! Form::close() !!}
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

    @foreach ($examnotice as $key => $val)
    <div class="modal fade" id="exampleModal{{ $val->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('notice-type.update', $val->id) }}" method="post">
                    {{ method_field('PUT') }}
                    @csrf
                     <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">

                                    <label class="form-label">Notice Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="" name="examnotice"
                                        value="{{ $val->notice_name }}">

                                </div>
                            </div>
                        </div>
                     </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger"  href="{{url('/notice-type')}}">Cancel</a>
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
