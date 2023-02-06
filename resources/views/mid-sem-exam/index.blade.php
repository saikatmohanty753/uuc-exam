@extends('layouts.app')
@section('content')
    <p class="brd">Mid Sem Mark Entry-By College</p>
    <div class="container">
        <div id="panel-4" class="panel">

            <div class="panel-container show">
                <div class="panel-content">

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="example-input-square" class="form-label">Section</label>
                                <select class="form-control select2" id="section">
                                    <option>Choose</option>
                                    @foreach ($section as $sections)
                                        <option value="{{ $sections->id }}">{{ $sections->course_for }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="example-input-square" class="form-label">Session</label>
                                <select class="form-control select2" id="example-select">
                                    <option>Choose</option>
                                    <option>2020-2021</option>
                                    <option>2020-2021</option>
                                    <option>2020-2021</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="example-input-square" class="form-label">Course</label>
                                <select class="form-control select2" id="course">
                                   

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="example-input-square" class="form-label">Semester</label>
                                <select class="form-control select2" id="semester">
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3" style="margin-top:10px;">
                            <div class="form-group">
                                <label for="example-input-square" class="form-label">Student</label>
                                <select class="form-control select2" id="example-select">
                                    <option>Choose</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div id="panel-4" class="panel">

            <div class="panel-container show">
                <div class="panel-content">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-3 paper">
                                <p>Paper-1</p>
                            </div>
                            <div class="col-lg-9" style="text-align: center;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>

                                            <th scope="col">Theory</th>
                                            <th scope="col">Practical</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>
                                                <div class="form-row">
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" value="70" readonly>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="Mark ">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-row">
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" value="30" readonly>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="Mark ">
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-3 paper">
                                <p>Paper-2</p>
                            </div>
                            <div class="col-lg-9" style="text-align: center;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>

                                            <th scope="col">Theory</th>
                                            <th scope="col">Practical</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>
                                                <div class="form-row">
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" value="70" readonly>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="Mark ">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-row">
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" value="30" readonly>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="Mark ">
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-3 paper">
                                <p>Paper-3</p>
                            </div>
                            <div class="col-lg-9" style="text-align: center;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>

                                            <th scope="col">Theory</th>
                                            <th scope="col">Practical</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>
                                                <div class="form-row">
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" value="70"
                                                            readonly>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="Mark ">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-row">
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" value="30"
                                                            readonly>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="Mark ">
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div style="    margin-left: 50%;">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#section').on('change', function() {
                var section = this.value;
                $("#semester").html('');
                $.ajax({
                    url: "{{ url('get-semester-by-section') }}",
                    type: "POST",
                    data: {
                        id: section,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                    $('#semester').append('<option value="">Choose Course</option>');

                    for( i=1; i <= result.semester; i++){
                      $("#semester").append('<option value="' + i +
                                '">' + i + '</option>');
                    }
                       




                       
                    }
                });
            });
         
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#section').on('change', function() {
                var section = this.value;
                $("#course").html('');
                $.ajax({
                    url: "{{ url('get-course-by-section') }}",
                    type: "POST",
                    data: {
                        id: section,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                    $('#course').append('<option value="">Choose Course</option>');
                        $.each(result.course, function(key, value) {
                            $("#course").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });


                       
                    }
                });
            });
         
        });
    </script>
@endsection
