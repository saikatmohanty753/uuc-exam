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
                                    <label class="form-label">Start Date</label>
                                    <input type="text" class="form-control yearPicker" id="from_date" name="from_date">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">End Date</label>
                                    <input type="text" class="form-control yearPicker" id="to_date" name="to_date">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Select Semester</label>
                                    <select name="" class="form-control" id="">
                                        <option value="">Select Semester</option>
                                        @for ($i = 1; $i <= 8; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>

                                            {{-- @if ($i % 2 != 0)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endif --}}
                                        @endfor
                                    </select>
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
                                <li class="nav-item"><a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab"
                                        href="#tab-{{ $item->id }}" role="tab">{{ $item->course_for }}</a></li>
                            @endforeach

                            {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-profile" role="tab">pg</a></li> --}}
                        </ul>
                        <div class="tab-content p-3">
                            @foreach ($department as $key => $value)
                                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="tab-{{ $value->id }}"
                                    role="tabpanel" aria-labelledby="tab-{{ $value->id }}">
                                    <table class="table table-bordered table-hover table-striped w-100 dataTable12">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>College Name</th>
                                                {{-- <th>Department</th> --}}
                                                <th>Course</th>
                                                <th>Semester</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student as $item)
                                                @if ($item->department_id == $value->id)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->clg_id }}</td>
                                                        {{-- <td>{{ $item->department->course_for }}</td> --}}
                                                        <td>{{ $item->course_name }}</td>
                                                        <td>{{ $item->current_semester }}</td>
                                                        <td>Action</td>
                                                    </tr>
                                                @endif
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                            <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile"></div>

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            // add Examined Section
            var countOtherDocRow = 1;
            var counterOtherDocRow = 0;

            $('#button_examine').click(function(e) {
                alert('hi');
                e.preventDefault();
                var bde_course = $('#bde_course').val();
                var bde_theo_prac = $('#bde_theo_prac').val();
                var bde_description = $('#bde_description').val();


                var newRow = '<tr>' +
                    '<td>' + bde_course +
                    '<input type="hidden" name="bde_course_hid[]" value="' +
                    bde_course + '"></td>' +

                    '<td>' + bde_theo_prac +
                    '<input type="hidden" name="bde_theo_prac_hid[]" value="' +
                    bde_theo_prac + '"></td>' +

                    '<td>' + bde_description +
                    '<input type="hidden" name="bde_description_hid[]" value="' +
                    bde_description + '"></td>' +


                    '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                    counterOtherDocRow + '">Remove</button></td></tr>';
                $('#addExamined').append(newRow);
                countOtherDocRow++;
                counterOtherDocRow++;

            });

            $("#addExamined").on("click", ".remove_field", function(e) {
                // alert('1');
                $(this).parent('td').parent('tr').remove();
                counterOtherDocRow--;
                countOtherDocRow--;
            });


            // End Examined Section


            var countBDE = 1;
            var counterBDERow = 0;

            $('#button_BDE').click(function(e) {
                alert('hi');
                e.preventDefault();
                var bde_year = $('#bde_year').val();
                var bde_exam = $('#bde_exam').val();
                var bde_roll_no = $('#bde_roll_no').val();
                var bde_regd_no = $('#bde_regd_no').val();


                var newRow = '<tr>' +
                    '<td>' + bde_year +
                    '<input type="hidden" name="bde_year_hid[]" value="' +
                    bde_year + '"></td>' +

                    '<td>' + bde_exam +
                    '<input type="hidden" name="bde_exam_hid[]" value="' +
                    bde_exam + '"></td>' +

                    '<td>' + bde_roll_no +
                    '<input type="hidden" name="bde_roll_no_hid[]" value="' +
                    bde_roll_no + '"></td>' +

                    '<td>' + bde_regd_no +
                    '<input type="hidden" name="bde_regd_no_hid[]" value="' +
                    bde_regd_no + '"></td>' +


                    '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                    counterBDERow + '">Remove</button></td></tr>';
                $('#addBDE').append(newRow);
                countBDE++;
                counterBDERow++;

            });

            $("#addBDE").on("click", ".remove_field", function(e) {
                // alert('1');
                $(this).parent('td').parent('tr').remove();
                countBDE--;
                counterBDERow--;
            });





        });
    </script>


    <script>
        $(document).ready(function() {
            $('#submit').on('click', function() {
               
                var _token = $('input[name="_token"]').val();
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                
                var table = $('.dataTable12').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('ugfilter') }}",
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                           
                            _token: _token
                        },
                        type: "POST",
                        dataType: "json"
                    },
                    columns: [{
                            data: 'name'

                        },
                        
                        
                    ]

                });

            });

        });
    </script>
@endsection
