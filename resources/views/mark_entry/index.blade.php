@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Mark Entry
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="filter_data mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Select year</label>
                                    <select name="" class="form-control" id="batch_year">
                                        <option value="">Select Batch Year</option>
                                        <option value="">All</option>
                                        @foreach ($all_batch_year as $item)
                                            <option value="{{ $item->batch_year }}">{{ $item->batch_year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Select Semester</label>
                                    <select name="" class="form-control" id="sem_id">
                                        <option value="">Select Semester</option>
                                        @for ($i = 1; $i <= 8; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>

                                            {{-- @if ($i % 2 != 0)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endif --}}
                                        @endfor
                                    </select>
                                    <input type="hidden" value="1" id="dep_id">
                                </div>
                                <div class="col-md-4">
                                    {{-- <input type="button" class="btn btn-sm btn-success waves-effect waves-themed" value="search"> --}}
                                    <input type="submit" class="btn btn-sm btn-success waves-effect waves-themed mt-4"
                                        id="submit">
                                </div>
                            </div>

                        </div>

                        <ul class="nav nav-tabs nav-tabs-clean" role="tablist">
                            @foreach ($department as $key => $item)
                                <li class="nav-item"><a class="nav-link das {{ $key == 0 ? 'active' : '' }}" data-toggle="tab"
                                        href="#tab-{{ $item->id }}" role="tab" dep-id="{{ $item->id }}" >{{ $item->course_for }}</a></li>
                            @endforeach

                            {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-profile" role="tab">pg</a></li> --}}
                        </ul>
                        <div class="tab-content p-3">
                            @foreach ($department as $key => $value)
                                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="tab-{{ $value->id }}"
                                    role="tabpanel" aria-labelledby="tab-{{ $value->id }}">
                                    <table
                                        class="table table-bordered table-hover table-striped w-100 dataTable1">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Name</th>
                                                <th>College Name</th>
                                                
                                                <th>Course</th>
                                                <th>Semester</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                            {{-- <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile"></div> --}}

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')
    <script>
        // $(document).ready(function() {
        //     $('.dataTable12').DataTable();
        // });
        

        $(function() {
            //alert($dep_id);

            var table = $('.dataTable1').DataTable({
                processing: true,
                serverSide: true,
                orderable: false,
                searching: false,
                ajax: {
                    //url: "{{ route('student_list_ajax') }}",
                    url: "{{ route('mark_list') }}",
                    type: 'GET',
                    data: function(d) {
                        d.batch_year = $('#batch_year').val(),
                        d.sem_id = $('#sem_id').val(),
                        d.dep_val = $('#dep_id').val()
                        // d.stu_name = $('#stu_name').val()
                        // d.search = $('input[type="search"]').val()
                    },
                },
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'college_name',
                        name: 'college_name'
                    },
                    {
                        data: 'course_name',
                        name: 'course_name'
                    },
                    {
                        data: 'current_semester',
                        name: 'current_semester'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        render: function(data, type, row) {

                            return 'action';
                        }
                    },
                ]
            });

            $('#batch_year').change(function() {
                // alert('hi');
                table.draw();
            });
            $('#sem_id').change(function() {
                // alert('hi');
                table.draw();
            });
            $(".das").on("click", function() {
                 $('#dep_id').val($(this).attr('dep-id'));
                 table.draw();
            });
            // $("#stu_name").focusout(function() {
            //     table.draw();
            // });
            // $("#stu_name").keyup(function() {
            //     table.draw();
            // });

        });
    </script>
@endsection
