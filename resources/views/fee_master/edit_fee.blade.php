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
                <form method="POST" action="{{route('fees.update',[$id])}}" id="myForm">
                    @csrf
                    @method('PATCH')
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Fee Name" name="name" value="{{$fee->name}}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Amount<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Amount" name="amount" value="{{$fee->amount}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success mt-4">Update</button>
                                </div>
                            </div>
                        </div>

                      
                    </div>

                </form>
            </div>

        </div>
    </div>

   
@endsection
