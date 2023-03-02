@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" id="formData" enctype="multipart/form-data" action="{{ url('student-admission') }}">
                        @csrf
                        <div class="border rounded p-2 mb-2">
                            <h2>Personal Information
                                <span class="badge badge-danger float-right fs-xs d-none seat-div"> Remaining Admission <span
                                        id="remaining"></span></span>
                                <input type="hidden" name="remaining_seat" id="remaining_seat">
                            </h2>

                            <hr>
                            <div class="row">
                                <div class="col-md-6 col-12" style="display:none;">

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label" for="course_name">Course Name<span
                                                    class="text-danger">*</span></label>
                                            <select class="custom-select form-control select2 chk_blank" name="course"
                                                id="course_name">
                                                <option value="">Select Course</option>
                                              
                                                    <option value="as"
                                                        data-id="asd">asd
                                                    </option>
                                               
                                            </select>
                                            <span class="error-msg"></span>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label" for="student_name">Name <span
                                                    class="text-danger">*</span></label>
                                            <input name="name" type="text" class="form-control chk_blank"
                                                id="student_name">
                                            <span class="error-msg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input name="email" type="text" class="form-control chk_blank chk_email"
                                                id="email">
                                            <span class="error-msg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Father's Name <span
                                                    class="text-danger">*</span></label>
                                            <input name="father_name" type="text" class="form-control chk_blank"
                                                id="father_name">
                                            <span class="error-msg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Mother's name <span
                                                    class="text-danger">*</span></label>
                                            <input name="mother_name" type="text" class="form-control chk_blank"
                                                id="mother_name">
                                            <span class="error-msg"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label" for="blog-edit-status">Gender <span
                                                    class="text-danger">*</span></label>
                                            <select class="custom-select form-control chk_blank" name="gender"
                                                id="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <span class="error-msg"></span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">DOB <span class="text-danger">*</span></label>
                                            <input name="dob" type="text" id="dob"
                                                class="form-control datepicker-2 chk_blank chk_date">
                                            <span class="error-msg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label" for="cast_category">Caste Category <span
                                                    class="text-danger">*</span></label>
                                            <select class="custom-select form-control chk_blank" id="cast_category"
                                                name="cast_category" id="cast">
                                                <option value="GEN">GEN</option>
                                                <option value="ST">ST</option>
                                                <option value="SC">SC</option>
                                                <option value="OBC">OBC</option>
                                            </select>
                                            <span class="error-msg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label" for="blog-edit-status">If Specially Abled <span
                                                    class="text-danger">*</span></label>
                                            <select class="custom-select form-control chk_blank" id="specially_abled"
                                                name="specially_abled">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <span class="error-msg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Aadhar No <span class="text-danger">*</span></label>
                                            <input name="aadhar_no" type="text"
                                                class="form-control chk_blank chk_aadhaar" id="aadhar">
                                            <span class="error-msg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Mobile No <span class="text-danger">*</span></label>
                                            <input name="mobile" type="text"
                                                class="form-control chk_blank chk_mobile" id="mobile">
                                            <span class="error-msg"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="border rounded p-2 mb-2">
                            <h2>Address Information</h2>
                            <hr>
                            <div class="row mt-4">
                                <div class="col-md-12 col-12">
                                    <label class="mb-0 flex-1 text-dark fw-500">Present Address Details</label>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-2">
                                                <div class="form-group input-cont">
                                                    <label class="form-label" for="blog-edit-status">State <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select form-control chk_blank"
                                                        name="present_state" id="present_state">
                                                        <option value="ODISHA">Odisha</option>

                                                    </select>
                                                    <span class="error-msg"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-2">
                                                <div class="form-group input-cont">
                                                    <label class="form-label" for="blog-edit-status">District <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select form-control select2 chk_blank"
                                                        name="present_district" id="present_district">
                                                     
                                                            <option value="ggg">ddd
                                                            </option>
                                                        
                                                    </select>
                                                    <span class="error-msg"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-2">
                                                <div class="form-group input-cont">
                                                    <label class="form-label">Pincode <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control chk_blank chk_zip" name="present_pin_code"
                                                        id="present_pin_code">
                                                    <span class="error-msg"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-2">
                                                <div class="form-group input-cont">
                                                    <label class="form-label">Present Address <span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control chk_blank" name="present_address" id="present_address"></textarea>
                                                    <span class="error-msg"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="same">
                                                <label class="custom-control-label color-info-400" for="same">Click if
                                                    same with present address</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="subheader-titlemb-0 flex-1 text-dark fw-500">Permanent Address
                                        Details</label>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-2">
                                                <div class="form-group input-cont">
                                                    <label class="form-label" for="blog-edit-status">State <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select form-control chk_blank"
                                                        name="permanent_state" id="permanent_state">
                                                        <option value="ODISHA">Odisha</option>
                                                    </select>
                                                    <span class="error-msg"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-2">
                                                <div class="form-group input-cont">
                                                    <label class="form-label" for="blog-edit-status">District <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select form-control select2 chk_blank"
                                                        name="permanent_district" id="permanent_district">
                                                        
                                                            <option value="ddd">ddd
                                                            </option>
                                                        

                                                    </select>
                                                    <span class="error-msg"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-2">
                                                <div class="form-group input-cont">
                                                    <label class="form-label">Pincode <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control chk_blank chk_zip"
                                                        name="permanent_pin_code" id="permanent_pin_code">
                                                    <span class="error-msg"></span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-2">
                                                <div class="form-group input-cont">
                                                    <label class="form-label">Permanent Address <span
                                                            class="text-danger">*</span>
                                                        <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><input type="checkbox" id="sameAddress"> Same as present</small>-->
                                                    </label>
                                                    <textarea class="form-control chk_blank" name="permanent_address" id="permanent_address"></textarea>
                                                    <span class="error-msg"></span>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>


                            <div class="border rounded p-2 mb-2">
                                <h2>College Information</h2>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="mb-2">
                                            <div class="form-group input-cont">
                                                <label class="form-label">Last Attended College Name <span
                                                        class="text-danger">*</span></label>
                                                <input name="last_collage_name" type="text"
                                                    class="form-control chk_blank" id="last_collage_name">
                                                <span class="error-msg"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-12">
                                        <div class="mb-2">
                                            <div class="form-group input-cont">
                                                <label class="form-label">Year of Passing Last Exam <span
                                                        class="text-danger">*</span></label>
                                                <input name="last_passing_year" type="text"
                                                    class="form-control chk_blank yearPicker" id="last_passing_year">
                                                <span class="error-msg"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-12">
                                        <div class="mb-2">
                                            <div class="form-group input-cont">
                                                <label class="form-label">Last Purchased Course Name <span
                                                        class="text-danger">*</span></label>
                                                <input name="last_course_name" type="text"
                                                    class="form-control chk_blank" id="last_course_name">
                                                <span class="error-msg"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-12">
                                        <div class="mb-2">
                                            <div class="form-group input-cont">
                                                <label class="form-label" for="is_migration">Migration Certificate is
                                                    availiable <span class="text-danger">*</span></label>
                                                <select class="custom-select form-control chk_blank" id="is_migration"
                                                    name="is_migration">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <span class="error-msg"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border rounded p-2 mb-2">
                                <h2>Qualification Details</h2>
                                <hr>
                                <div class="row">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name of the Examinations
                                                    Passed</th>
                                                <th>University/
                                                    Council / Board</th>
                                                <th>Year of Passing</th>
                                                <th>Divn. and Distn.</th>
                                                <th>Marks secured</th>
                                                <th>Maximum marks</th>
                                                <th>% of Marks</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

                            <div class="border rounded p-2 mb-4">
                                <h2>Document</h2>
                                <hr>
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label class="form-label">Photo<span class="text-danger">*</span></label>
                                            <div class="custom-file  input-cont">
                                                <input type="file"
                                                    class="custom-file-input form-control chk_blank chk_5mb_file_only"
                                                    name="profile" id="photo">
                                                <small
                                                    class="form-text text-secondary">{{ __('common.file_format') }}</small>
                                                <label class="custom-file-label">Choose
                                                    file...</label>
                                                <span class="error-msg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label class="form-label">Aadhaar Card<span
                                                    class="text-danger">*</span></label>
                                            <div class="custom-file input-cont">
                                                <input type="file"
                                                    class="custom-file-input form-control chk_blank chk_5mb_file_only"
                                                    name="aadhaar_card" id="aadhaar_card">
                                                <small
                                                    class="form-text text-secondary">{{ __('common.file_format') }}</small>
                                                <label class="custom-file-label">Choose
                                                    file...</label>
                                                <span class="error-msg"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label class="form-label">HSC Certificate <span
                                                    class="text-danger">*</span></label>
                                            <div class="custom-file input-cont">
                                                <input type="file"
                                                    class="custom-file-input form-control chk_blank chk_5mb_file_only"
                                                    name="hsc_cert" id="hsc_cert">
                                                <small
                                                    class="form-text text-secondary">{{ __('common.file_format') }}</small>
                                                <label class="custom-file-label">Choose
                                                    file...</label>
                                                <span class="error-msg"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label class="form-label">Migration Certificate</label>
                                            <div class="custom-file input-cont">
                                                <input type="file" class="custom-file-input form-control"
                                                    name="migration_cert" id="migration_cert">
                                                <small
                                                    class="form-text text-secondary">{{ __('common.file_format') }}</small>
                                                <label class="custom-file-label">Choose
                                                    file...</label>
                                                <span class="error-msg"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col-12 text-center mt-50">
                                <button type="submit" id="button_preview"
                                    class="btn btn-primary me-1 waves-effect waves-float waves-light">Preview</button>

                            </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#same').click(function() {
            if ($(this).is(':checked')) {
                let present_district = $('#present_district').val();
                let present_pin_code = $('#present_pin_code').val();
                let present_address = $('#present_address').val();
                $('#permanent_address').text(present_address);
                $('#permanent_pin_code').val(present_pin_code);
                $("#permanent_district").val(present_district).change();
            }
        });

        $('#course_name').on('change', function() {
            if (this.value != '') {
                $('.seat-div').removeClass('d-none');
                var seat = $(this).find(':selected').data('id');

                $('#remaining_seat').val(seat)
                $('#remaining').html(seat)

            } else {
                $('.seat-div').addClass('d-none');
            }
        });
    </script>
    <script>
        $("#formData").on('submit', function(e) {

            e.preventDefault();
            var validation = [];
            validation = $('#formData').scvalidateform({
                formId: 'formData'
            });
            if ($.inArray('false', validation) >= '0') {
                return false;

            } else {
                $(this)[0].submit();
            }
        });
    </script>
@endsection
