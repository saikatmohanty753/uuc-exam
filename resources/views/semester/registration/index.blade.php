@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Semester Registration</h5>
                    <div class="card-actions float-right">
                        @can('role-create')
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#info-alert-modal"><i class="fa-solid fa-plus"></i> New Role</button>

                            {{-- <a class="btn btn-primary btn-sm" href="{{ route('roles.create') }}">
                        <i class="fa-solid fa-plus"></i> Create New Role</a> --}}
                        @endcan
                    </div>
                </div>
                <div class="card-body mb-4">

                    <div class="subheader mt-6">
                        <h1 class="subheader-title">
                            <p class="color-info-500 text-center"><i class="fa-solid fa-graduation-cap"> </i>
                                {{ $college->name }}</p>
                            <p class="color-info-300 text-center" style="font-size: 1.2rem;">Utkal University of Culture
                                Semester Registration for UG</p>
                        </h1>
                    </div>
                    <form action="" class="mb-6">
                        <div class="row mb-6">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Department</label>
                                    <select class="custom-select" id="usertype" aria-label="usertype">
                                        <option value="{{ $dep->id }}">{{ $dep->course_for }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Semester</label>
                                    <select class="custom-select select2" id="usertype" aria-label="usertype">
                                        <option selected="">Select Semester</option>
                                        @foreach ($sem as $key => $item)
                                            <option value="{{ $item }}">{{ App\Helpers\Helpers::number($item) }}
                                                Semester</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Roll No.</label>
                                    <input type="text" placeholder="Enter Roll Number" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa-solid fa-magnifying-glass"></i> Search</button>

                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
