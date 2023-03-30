@extends('layouts.app')
@section('content')
    <div class="row">


        <div class="col-md-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Mark Entry
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">


                        <div class="panel-content">

                            <ul class="nav nav-tabs nav-tabs-clean" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-home"
                                        role="tab">Theory</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-profile"
                                        role="tab">Practical</a></li>

                            </ul>
                            <div class="tab-content p-3">
                                <div class="tab-pane fade show active" id="tab-home" role="tabpanel"
                                    aria-labelledby="tab-home">
                                    <form method="post" action="{{ route('addmarkstore') }}">
                                        @csrf
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label class="form-label">Subject</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Full Mark</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Pass Mark</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Secure Mark</label>
                                            </div>
                                        </div>
                                        @foreach ($academic as $key => $item)
                                            <div class="row mb-4">
                                                {{-- {{dd($academic)}} --}}
                                                {{-- <input type="hidden" name="dep_id" value="{{$academic->dep_id}}">
                                            <input type="hidden" name="course_id" value="{{$academic->course_id}}">
                                            <input type="hidden" name="semester" value="{{$academic->semester}}"> --}}



                                                <div class="col-md-3">
                                                    <input type="hidden" name="dep_id" value="{{ $dep_id }}">
                                                    <input type="hidden" name="course_id" value="{{ $course }}">
                                                    <input type="hidden" name="semester" value="{{ $sem }}">
                                                    <input type="hidden" name="stu_id" value="{{ $id }}">
                                                    <input type="hidden" name="appid" value="{{ $appid }}">

                                                    <input type="hidden" name="subject_id[]" value="{{ $item->id }}">
                                                    <div class="form-group input-cont">

                                                        <p>{{ $item->subject }}</p>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group input-cont">


                                                        <input type="text" class="form-control"
                                                            value="{{ $item->total_marks }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group input-cont">


                                                        <input type="text" class="form-control"
                                                            value="{{ $item->pass_mark }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group input-cont">


                                                        <input type="text" class="form-control" name="securemark[]"
                                                            value="">
                                                    </div>
                                                </div>



                                            </div>
                                        @endforeach
                                        <div class="row">
                                            <div class="col-md-12 text-center mt-4">

                                                <a href="/mark-entry-list" class="btn btn-danger"> Cancel </a>
                                                <button type="submit" class="btn btn-info pull-right">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile">
                                    <form action="">

                                    </form>
                                </div>

                            </div>
                        </div>




                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')
@endsection
