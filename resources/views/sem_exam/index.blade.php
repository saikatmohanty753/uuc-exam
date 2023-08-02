@extends('layouts.app')
@section('content')
<style>
    .box-body {
        padding: 30px;
    }

    .error {
        color: #fd3995;
    }
    .select2-container{
        z-index: 2051;
    }
    .bd-example{
        position: relative;
        margin: 1rem -0.75rem 0;
        padding: 1rem;
        border: solid #dee2e6;
        border-width: 1px 0 0;
    }
</style>
<div class="row">
    <div class="col-xl-12">
        <div class="panel" id="panel-1">
            <div class="panel-hdr">
                <h2>
                    Semester <span class="fw-300"><i>Mark Entry</i></span>
                </h2>
                <div class="card-actions float-end">

                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Course Type</label>
                                <select class="form-control select2" id="course_type" onchange="getCourseList()">
                                    <option value="">Select</option>
                                    @if(isset($course_type) && $course_type->count() > 0)
                                    @foreach($course_type as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_for }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Course Name</label>
                                <select class="form-control select2" id="course_name" onchange="getCourseSemsList()">
                                    <option value="">Select</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>Batch</label>
                                <select class="form-control select2" id="batch_id">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Semester</label>
                                <select class="form-control select2" id="sems">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-4">
                                <button type="button" onclick="getMarkSemList()" class="btn btn-info btn-sm"><i class="fa fa-search"></i>&nbsp;Search</button>
                                <button type="button" onclick="window.location.reload()" class="btn btn-warning btn-sm"><i class="fa fa-clip"></i> Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myDiv"></div>
@endsection
@section('js')
    <script type="text/javascript">
    function getMarkSemList(){
        var course_id = document.getElementById('course_name').value;
        var batch_id = document.getElementById('batch_id').value;
        var sems = document.getElementById('sems').value;
        var loaders = '<div class="bd-example"><div class="d-flex align-items-center"><strong>Loading...</strong><div class="spinner-border ms-auto" role="status" aria-hidden="true"></div></div></div>';
        if(course_id == '' || batch_id == '' || sems == ''){
            alert('Please Select All Fields');
            return false;
        }
        $.ajax({
            url: "{{ route('getMarkSemListAjax') }}",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "course_id": course_id,
                "batch_id": batch_id,
                "sem_id": sems
            },
            beforeSend: function(){
                $('#myDiv').html(loaders);
            },
            success: function(data){
                $('#myDiv').html(data);
            }
        })
    }
    function getCourseList()
    {
        var course_type = $('#course_type').val();
        if(course_type!='')
        {
            $('#course_name').empty();
            $.ajax({
                url:"{{ route('get-course-list') }}",
                type:"POST",
                data:{"_token":"{{ csrf_token() }}","course_type":course_type},
                dataType:"JSON",
                success:function(res)
                {
                    $('#course_name').html(res.html);
                    $('#batch_id').html(res.batch);
                }
            })
        }
    }
    function getCourseSemsList()
    {
        var course_id = $('#course_name').val();
        if(course_type!='')
        {
            $('#sems').empty();
            $.ajax({
                url:"{{ route('getSems-exam-mark') }}",
                type:"POST",
                data:{"_token":"{{ csrf_token() }}","course_id":course_id},
                dataType:"JSON",
                success:function(res)
                {
                    $('#sems').html(res.html);
                }
            })
        }
    }
    </script>
@endsection
