@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Notice</h5>
                    <div class="card-actions float-right">

                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6 offset-md-3">
                        <form method="post" action="{{ url('uuc-create-notice') }}" id="myForm">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group input-cont">
                                        <label class="form-label">Notice Type<span class="text-danger">*</span></label>
                                        <select class="form-select form-control notice-type select2 chk_blank"
                                            aria-label="Default select example" name="notice_type">
                                            <option value="" selected>Select Notice Type</option>
                                            @foreach ($examnotice as $value)
                                                <option value="{{ $value->id }}" class="addmission">
                                                    {{ $value->notice_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="error-msg"></span>

                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group department input-cont">
                                        <label class="form-label">Department<span class="text-danger">*</span></label>
                                        <select class="form-select form-control select2 chk_blank"
                                            aria-label="Default select example" name="department" id="department">
                                            <option value="" selected>Select Department</option>
                                            @foreach ($dept as $item)
                                                <option value="{{ $item->id }}">{{ $item->course_for }}</option>
                                            @endforeach
                                        </select>
                                        <span class="error-msg"></span>

                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group semester input-cont">
                                        <label class="form-label">Semester<span class="text-danger">*</span></label>
                                        <select class="form-select form-control select2" name="semester">
                                            <option value="">select semester</option>
                                            <option value="odd">Odd Semester</option>
                                            <option value="even">Even Semester</option>
                                        </select>
                                        <span class="error-msg"></span>

                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group semester input-cont">
                                        <label class="form-label">Semester<span class="text-danger">*</span></label>
                                        <select class="form-select form-control sem-multiple chk_blank"
                                            aria-label="Default select example" name="semester[]" id="semester" multiple>


                                        </select>
                                        <span class="error-msg"></span>

                                    </div>
                                </div>
                            </div> --}}
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group start_date input-cont">
                                        <label class="form-label">Start date<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control datepicker-1 chk_blank"
                                            placeholder="Enter Department" name="start_date">
                                        <span class="error-msg"></span>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group end_date input-cont">
                                        <label class="form-label">Expiry date<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control datepicker-1 chk_blank"
                                            placeholder="Enter Department" name="exp_date">
                                        <span class="error-msg"></span>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2 d-flex align-items-center justify-content-center input-cont">
                                <div class="col-md-12">
                                    <label class="form-label">Details<span class="text-danger">*</span></label>
                                    <textarea name="details" id="" class="form-control chk_blank"></textarea>
                                    <span class="error-msg"></span>

                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12 text-center mb-4">
                                    <a class="btn btn-danger" href="{{ url('/notices') }}">Cancel</a>
                                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#department').on('change', function() {

            $("#semester").empty();
            var postData = new FormData();
            postData.append('dep_id', this.value);
            var url = "/get-semester";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                async: true,
                type: "post",
                contentType: false,
                url: url,
                data: postData,
                processData: false,
                success: function(response) {
                    for (var i = 1; response >= i; i++) {
                        $("#semester").append('<option value=' + i + '>' + i +
                            '</option>');

                    }
                }
            });
        });

        $("#myForm").on('submit', function(e) {

            e.preventDefault();
            var validation = [];
            validation = $('#myForm').scvalidateform({
                formId: 'myForm'
            });
            console.log($('.department').val());
            console.log(validation);
            if ($.inArray('false', validation) >= '0') {
                return false;
            } else {
                $(this)[0].submit();
            }
        });
    </script>
@endsection
