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
                        <div class="filter_data mb-4">
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
                                    <select name="" class="form-control" id="">
                                        <option value="">Select Semester</option>
                                        @for ($i = 0; $i <= 8; $i++)
                                            @if ($i % 2 != 0)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    {{-- <input type="button" class="btn btn-sm btn-success waves-effect waves-themed" value="search"> --}}
                                    <input type="submit" class="btn btn-sm btn-success waves-effect waves-themed mt-4">
                                </div>
                            </div>

                        </div>

                        <table class="table table-bordered table-hover table-striped w-100 dataTable12">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Name</th>
                                    {{-- <th>College Name</th>
                                    <th>Department</th>
                                    <th>Course</th>
                                    <th>Semester</th>
                                    <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')
    <script>
        // $(document).ready(function() {

        $(function() {

            var table = $('.dataTable12').DataTable({
                processing: true,
                serverSide: true,
                orderable: false,
                ajax: {
                    //url: "{{ route('student_list_ajax') }}",
                    url: "{{ route('student_list') }}",
                    type: 'GET',
                    data: function(d) {
                        d.status = $('#batch_year').val()
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
                    // {data: 'email', name: 'email'},
                    // {data: 'status', name: 'status'},
                ]
            });

            $('#batch_year').change(function() {
                alert('hi');
                table.draw();
            });

        });

        // });
    </script>

    <script>
        // dataTable
        // $(document).ready(function(){

        // });
    </script>
@endsection
