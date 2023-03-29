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
                                        <div class="row">
                                            {{-- {{dd($academic)}} --}}
                                            {{-- <input type="hidden" name="dep_id" value="{{$academic->dep_id}}">
                                            <input type="hidden" name="course_id" value="{{$academic->course_id}}">
                                            <input type="hidden" name="semester" value="{{$academic->semester}}"> --}}

                                            @foreach ($academic as $key => $item)
                                                <div class="col-md-3">
                                                    <input type="hidden" name="dep_id" value="{{$item->dep_id}}">
                                                    <input type="hidden" name="course_id" value="{{$item->course_id}}">
                                                    <input type="hidden" name="semester" value="{{$item->semester}}">
                                                    <div class="form-group input-cont">
                                                        <label class="form-label">Subject</label>
                                                        <p>{{ $item->subject }}</p>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group input-cont">
                                                        <label class="form-label">Full Mark</label>

                                                        <input type="text" class="form-control" value="{{ $item->total_marks }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group input-cont">
                                                        <label class="form-label">Pass Mark</label>

                                                        <input type="text" class="form-control" value="{{ $item->pass_mark }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group input-cont">
                                                        <label class="form-label">Secure Mark</label>

                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                               
                                            @endforeach

                                        </div>
                                        <div class="row">
                                        <div class="col-md-12 text-center mt-4">

                                            <a href="{{ url('/*') }}" class="btn btn-danger"> Cancel </a>
                                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                                        </div>

                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile">
                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                    artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
                                    enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud
                                    organic. </div>

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
